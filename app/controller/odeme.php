<?php

if($settings["site_maintenance"] != 1):
    header("Location: /");
    die;
endif;    

  $product = $conn->prepare("SELECT * FROM products WHERE product_id=:id ");
  $product-> execute(array("id"=>route(1) ));
  $product = $product->fetch(PDO::FETCH_ASSOC);
  
  $title       = $product["product_name"];
  $keywords    = $product["product_keyword"];
  $description = $product["product_desc"];

  if( !$product ){
    header("Location: /");
    die;
  }
  
  $paymentsList = $conn->prepare("SELECT * FROM payment_methods WHERE method_type=:type  ");
  $paymentsList-> execute(array("type"=>2 ));
  $paymentsList = $paymentsList->fetchAll(PDO::FETCH_ASSOC);


if( $_POST && $_POST["payment_type"] ):

  $method_id= htmlspecialchars($_POST["payment_type"]);
  $amount   = $product["product_price"];
  $extras   = json_encode($_POST);
  
  $method   = $conn->prepare("SELECT * FROM payment_methods WHERE id=:id ");
  $method -> execute(array("id"=>$method_id));
  $method   = $method->fetch(PDO::FETCH_ASSOC);
  
  $extra    = json_decode($method["method_extras"],true);
  $paymentCode  = time();
  $amount_fee   = ($amount+($amount*$extra["fee"]/100)); // Komisyonlu tutar
  
  $user["name"]      = htmlspecialchars($_POST["name"]);
  $user["telephone"] = htmlspecialchars($_POST["telephone"]);
  $user["email"]     = htmlspecialchars($_POST["email"]);
  $user["address"]   = htmlspecialchars($_POST["address"]);
  $order_note        = htmlspecialchars($_POST["order_note"]);
  
  $client_data = array("ad_soyad"=>$user["name"],
                       "telefon"=>$user["telephone"],
                       "email"=>$user["email"],
                       "adres"=>$user["address"]);
  
     $client_data = json_encode($client_data);
     
    if( empty($method_id) ){
      $error    = 1;
      $errorText= "Geçersiz ödeme yöntemi.";
    }elseif( !is_numeric($amount) ){
      $error    = 1;
      $errorText= "Geçersiz ödeme tutarı.";
    }else{
      if( $method_id == 2 ):
        $merchant_id      = $extra["merchant_id"];
        $merchant_key     = $extra["merchant_key"];
        $merchant_salt    = $extra["merchant_salt"];
        $email            = $user["email"];
        $payment_amount   = $amount_fee * 100;
        $merchant_oid     = $paymentCode;
        $user_name        = $user["name"];
        $user_address     = $user["address"];
        $user_phone       = $user["telephone"];
        $payment_type     = "eft";
        $user_ip          = GetIP();
        $timeout_limit    = "360";
        $debug_on         = 1;
        $test_mode        = 0;
        $no_installment   = 0;
        $max_installment  = 0;
        $hash_str         = $merchant_id.$user_ip.$merchant_oid.$email.$payment_amount.$payment_type.$test_mode;
        $paytr_token      = base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));
        $post_vals=array(
            'merchant_id'=>$merchant_id,
            'user_ip'=>$user_ip,
            'merchant_oid'=>$merchant_oid,
            'email'=>$email,
            'payment_amount'=>$payment_amount,
            'payment_type'=>$payment_type,
            'paytr_token'=>$paytr_token,
            'debug_on'=>$debug_on,
            'timeout_limit'=>$timeout_limit,
            'test_mode'=>$test_mode
          );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1) ;
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $result = @curl_exec($ch);
        if(curl_errno($ch))
          die("PAYTR IFRAME connection error. err:".curl_error($ch));
        curl_close($ch);
        $result  = json_decode($result,1);

          if( $result['status']=='success' ):
              $token  = $result['token'];

            $insert = $conn->prepare("INSERT INTO orders SET order_customer=:c_data, order_product=:order_product, order_amount=:order_amount, order_note=:order_note, payment_method=:payment_method, payment_privatecode=:payment_privatecode,order_date=:date, customer_ip=:ip ");
            $insert-> execute(array("c_data"=>$client_data,"order_product"=>$product["product_id"],"order_amount"=>$product["product_price"],"order_note"=>$order_note,"payment_method"=>$method_id,"payment_privatecode"=>$paymentCode,"date"=>date("Y.m.d H:i:s"),"ip"=>GetIP() ));

              $success    = 1;
              $successText= "İşlem başlatıldı, ödeme sayfasına yönlendiriliyorsunuz...";
              $payment_url= "https://www.paytr.com/odeme/api/".$token;
          else:
            $error    = 1;
            $errorText= "Ödeme işlemi başlatılamadı.";
          endif;
      elseif( $method_id == 1 ):
        $merchant_id      = $extra["merchant_id"];
        $merchant_key     = $extra["merchant_key"];
        $merchant_salt    = $extra["merchant_salt"];
        $email            = $user["email"];
        $payment_amount   = $amount_fee * 100;
        $merchant_oid     = $paymentCode;
        $user_name        = $user["name"];
        $user_address     = $user["address"];
        $user_phone       = $user["telephone"];
        $currency         = "TL";
        $merchant_ok_url  = URL;
        $merchant_fail_url= URL;
        $user_basket      = base64_encode(json_encode(array( array($amount." ".$currency." Bakiye", $amount_fee, 1)   )));
        $user_ip          = GetIP();
        $timeout_limit    = "360";
        $debug_on         = 1;
        $test_mode        = 0;
        $no_installment   = 0;
        $max_installment  = 0;
        $hash_str         = $merchant_id .$user_ip .$merchant_oid .$email .$payment_amount .$user_basket.$no_installment.$max_installment.$currency.$test_mode;
        $paytr_token      = base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));
        $post_vals=array(
            'merchant_id'=>$merchant_id,
            'user_ip'=>$user_ip,
            'merchant_oid'=>$merchant_oid,
            'email'=>$email,
            'payment_amount'=>$payment_amount,
            'paytr_token'=>$paytr_token,
            'user_basket'=>$user_basket,
            'debug_on'=>$debug_on,
            'no_installment'=>$no_installment,
            'max_installment'=>$max_installment,
            'user_name'=>$user_name,
            'user_address'=>$user_address,
            'user_phone'=>$user_phone,
            'merchant_ok_url'=>$merchant_ok_url,
            'merchant_fail_url'=>$merchant_fail_url,
            'timeout_limit'=>$timeout_limit,
            'currency'=>$currency,
            'test_mode'=>$test_mode
          );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1) ;
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $result = @curl_exec($ch);
        if(curl_errno($ch))
          die("PAYTR IFRAME connection error. err:".curl_error($ch));
        curl_close($ch);
        $result  = json_decode($result,1);

          if( $result['status']=='success' ):
              $token  = $result['token'];

            $insert = $conn->prepare("INSERT INTO orders SET order_customer=:c_data, order_product=:order_product, order_amount=:order_amount, order_note=:order_note, payment_method=:payment_method, payment_privatecode=:payment_privatecode,order_date=:date, customer_ip=:ip ");
            $insert-> execute(array("c_data"=>$client_data,"order_product"=>$product["product_id"],"order_amount"=>$product["product_price"],"order_note"=>$order_note,"payment_method"=>$method_id,"payment_privatecode"=>$paymentCode,"date"=>date("Y.m.d H:i:s"),"ip"=>GetIP() ));

              $success    = 1;
              $successText= "İşlem başlatıldı, ödeme sayfasına yönlendiriliyorsunuz...";
              $payment_url= "https://www.paytr.com/odeme/guvenli/".$token;
          else:
            $error    = 1;
            $errorText= "Ödeme işlemi başlatılamadı.";
          endif;
      elseif( $method_id == 4 ):

        $payment_types  = ""; foreach ($extra["payment_type"] as $i => $v ) { $payment_types .= $v.",";  } $payment_types = substr($payment_types,0,-1);
        $hashOlustur = base64_encode(hash_hmac('sha256',$user["email"]."|".$user["email"]."|".$user['client_id'].$extra['apiKey'],$extra['apiSecret'],true));
        $postData = array(
        'apiKey' => $extra['apiKey'],
        'hash' => $hashOlustur,
        'returnData'=> $user["email"],
        'userEmail' => $user["email"],
        'userIPAddress' => GetIP(),
        'userID' => $user["client_id"],
        'proApi' => TRUE,
         'productData' => [
             "name" =>  $amount." TL Tutarında Bakiye (".$paymentCode.")",
             "amount" => $amount_fee * 100,
             "extraData" => $paymentCode,
             "paymentChannel" => $payment_types, // 1 Mobil Ödeme, 2 Kredi Kartı,3 Banka Havale/Eft/Atm,4 Türk Telekom Ödeme (TTNET),5 Mikrocard,6 CashU
             "commissionType" => $extra["commissionType"] // 1 seçilirse komisyonu bizden al, 2 olursa komisyonu müşteri ödesin
         ]
        );
        $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paywant.com/gateway.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($postData),
          ));
        $response = curl_exec($curl); $err = curl_error($curl);
          if( !$err ):
            $jsonDecode = json_decode($response,false);
            $jsonDecode->Message = str_replace("https://", "",str_replace("http://", "", $jsonDecode->Message));
            $jsonDecode->Message = "https://".$jsonDecode->Message;
            if($jsonDecode->Status == 100):

            $insert = $conn->prepare("INSERT INTO orders SET order_customer=:c_data, order_product=:order_product, order_amount=:order_amount, order_note=:order_note, payment_method=:payment_method, payment_privatecode=:payment_privatecode,order_date=:date, customer_ip=:ip ");
            $insert-> execute(array("c_data"=>$client_data,"order_product"=>$product["product_id"],"order_amount"=>$product["product_price"],"order_note"=>$order_note,"payment_method"=>$method_id,"payment_privatecode"=>$paymentCode,"date"=>date("Y.m.d H:i:s"),"ip"=>GetIP() ));

              $success    = 1;
              $successText= "İşlem başlatıldı, ödeme sayfasına yönlendiriliyorsunuz...";
              $payment_url= $jsonDecode->Message;
            else:
              //echo $response; // Dönen hatanın ne olduğunu bastır
              $error    = 1;
              $errorText= "Ödeme işlemi başlatılamadı. $response";
            endif;
          else:
            $error    = 1;
            $errorText= "Ödeme işlemi başlatılamadı.";
          endif;
      elseif( $method_id == 3 ):
          if( $extra["processing_fee"] ):
            $amount_fee = $amount_fee + "0.49";
          endif;
          $form_data = [
              "website_index"   =>	$extra["website_index"],
              "apikey"	        =>	$extra["apiKey"],
              "apisecret"	    =>	$extra["apiSecret"],
              "item_name"       =>  $product["product_name"],
              "order_id"        =>  $paymentCode,
              "buyer_name"      =>  $user["name"],
              "buyer_surname"   =>  $user["name"],
              "buyer_email"     =>  $user["email"],
              "buyer_phone"     =>  $user["telephone"],
              "city"            =>  "NA",
              "billing_address" =>  $user["address"],
              "ucret"           =>  $amount_fee
          ];
          print_r(generate_shopier_form(json_decode(json_encode($form_data))));
          if( $_SESSION["data"]["payment_shopier"] == true ):
       
            $insert = $conn->prepare("INSERT INTO orders SET order_customer=:c_data, order_product=:order_product, order_amount=:order_amount, order_note=:order_note, payment_method=:payment_method, payment_privatecode=:payment_privatecode,order_date=:date, customer_ip=:ip ");
            $insert-> execute(array("c_data"=>$client_data,"order_product"=>$product["product_id"],"order_amount"=>$product["product_price"],"order_note"=>$order_note,"payment_method"=>$method_id,"payment_privatecode"=>$paymentCode,"date"=>date("Y.m.d H:i:s"),"ip"=>GetIP() ));
         
            $success    = 1;
            $successText= "İşlem başlatıldı, ödeme sayfasına yönlendiriliyorsunuz...";
            $payment_url  = $response;
          else:
            $error    = 1;
            $errorText= "Ödeme işlemi başlatılamadı.";
          endif;
      endif;
    }

endif;

if( $payment_url ):
  echo '<script>setInterval(function(){window.location="'.$payment_url.'"},2000)</script>';
endif;