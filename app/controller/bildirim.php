<?php

$method_name  = route(1);

if( !countRow(["table"=>"payment_methods","where"=>["method_get"=>$method_name] ]) ):
  header("Location:".site_url());
  exit();
endif;

$method       = $conn->prepare("SELECT * FROM payment_methods WHERE method_get=:get ");
$method       ->execute(array("get"=>$method_name ));
$method       = $method->fetch(PDO::FETCH_ASSOC);
$extras       = json_decode($method["method_extras"],true);

  if( $method_name == "shopier" ):
    ## Shopier başla ##
    $post           = $_POST;
    $order_id       = $post['platform_order_id'];
    $status         = $post['status'];
    $payment_id     = $post['payment_id'];
    $installment    = $post['installment'];
    $random_nr      = $post['random_nr'];
    $signature      = base64_decode($_POST["signature"]);
    $expected       = hash_hmac('SHA256', $random_nr.$order_id, $extras["apiSecret"], true);
    if( $signature != $expected ):
      header("Location:".site_url());
    endif;
    if( $status == 'success' ):
      if( countRow(["table"=>"orders","where"=>["payment_privatecode"=>$order_id,"order_status"=>1 ] ]) ):
       
        $payment = $conn->prepare("SELECT * FROM orders WHERE payment_privatecode=:orderid ");
        $payment->execute(array("orderid"=>$order_id));
        $payment = $payment->fetch(PDO::FETCH_ASSOC);
        $amount  = $payment["product_price"];
        
          $extra    = ($_POST);
          $extra    = json_encode($extra);
          $conn->beginTransaction();

          $update   = $conn->prepare("UPDATE orders SET order_status=:status, payment_extra=:extra WHERE order_id=:id ");
          $update   = $update->execute(array("status"=>2,"extra"=>$extra,"id"=>$payment["order_id"]));

        $user  = json_decode($payment["order_customer"], true);   
        $name  = $user["ad_soyad"];
        $email = $user["email"];
        $product_details = $payment["product_details"];

          sendMail(["subject"=>"Siparişiniz için teşekkür ederiz.","body"=>"Sn. $name, $amount Tutarındaki siparişiniz başarıyla alınmıştır. <br> $product_details","mail"=>$email]);

           if($settings["alert_newmanuelservice"] == 2):
                if( $settings["alert_type"] == 3 ):   $sendmail = 1; $sendsms  = 1; elseif( $settings["alert_type"] == 2 ): $sendmail = 1; $sendsms=0; elseif( $settings["alert_type"] == 1 ): $sendmail=0; $sendsms  = 1; endif;
                  if( $sendsms ):
                    SMSUser($settings["admin_telephone"],$amount."Tutarında ".$method["method_name"]." aracılığı ile yeni bir sipariş alındı.");
                  endif;
                  if( $sendmail ):
                    sendMail(["subject"=>"Yeni ödeme alındı.","body"=>$amount." Tutarında ".$method["method_name"]." aracılığı ile yeni bir sipariş alındı.","mail"=>$settings["admin_mail"]]);
                 endif;
            endif;      

          if( $update ):
            $conn->commit();
          else:
            $conn->rollBack();
          endif;
      endif;
    endif;
    ## shopier bitti ##
    header("Location:".site_url());
  elseif( $method_name == "paytr" ):
    ## paytr başla ##
    $post           = $_POST;
    $order_id       = $post['merchant_oid'];
    $payment        = $conn->prepare("SELECT * FROM payments INNER JOIN clients ON clients.client_id=payments.client_id WHERE payments.payment_privatecode=:orderid ");
    $payment      ->execute(array("orderid"=>$order_id));
    $payment        = $payment->fetch(PDO::FETCH_ASSOC);
    $method       = $conn->prepare("SELECT * FROM payment_methods WHERE id=:id ");
    $method       ->execute(array("id"=>$payment["payment_method"] ));
    $method       = $method->fetch(PDO::FETCH_ASSOC);
    $extras       = json_decode($method["method_extras"],true);
    $merchant_key   = $extras["merchant_key"];
    $merchant_salt  = $extras["merchant_salt"];
    $hash           = base64_encode( hash_hmac('sha256', $post['merchant_oid'].$merchant_salt.$post['status'].$post['total_amount'], $merchant_key, true) );
    if( $hash != $post['hash'] ):
      die('OK');
      exit();
    endif;
    if( $post['status'] == 'success' ):
    if( countRow(["table"=>"orders","where"=>["payment_privatecode"=>$order_id,"order_status"=>1 ] ]) ):
       
        $payment = $conn->prepare("SELECT * FROM orders WHERE payment_privatecode=:orderid ");
        $payment->execute(array("orderid"=>$order_id));
        $payment = $payment->fetch(PDO::FETCH_ASSOC);
        $amount  = $payment["product_price"];
        
          $extra    = ($_POST);
          $extra    = json_encode($extra);
          $conn->beginTransaction();

          $update   = $conn->prepare("UPDATE orders SET order_status=:status, payment_extra=:extra WHERE order_id=:id ");
          $update   = $update->execute(array("status"=>2,"extra"=>$extra,"id"=>$payment["order_id"]));

        $user  = json_decode($payment["order_customer"], true);   
        $name  = $user["ad_soyad"];
        $email = $user["email"];
        $product_details = $payment["product_details"];

          sendMail(["subject"=>"Siparişiniz için teşekkür ederiz.","body"=>"Sn. $name, $amount Tutarındaki siparişiniz başarıyla alınmıştır. <br> $product_details","mail"=>$email]);

           if($settings["alert_newmanuelservice"] == 2):
                if( $settings["alert_type"] == 3 ):   $sendmail = 1; $sendsms  = 1; elseif( $settings["alert_type"] == 2 ): $sendmail = 1; $sendsms=0; elseif( $settings["alert_type"] == 1 ): $sendmail=0; $sendsms  = 1; endif;
                  if( $sendsms ):
                    SMSUser($settings["admin_telephone"],$amount."Tutarında ".$method["method_name"]." aracılığı ile yeni bir sipariş alındı.");
                  endif;
                  if( $sendmail ):
                    sendMail(["subject"=>"Yeni ödeme alındı.","body"=>$amount." Tutarında ".$method["method_name"]." aracılığı ile yeni bir sipariş alındı.","mail"=>$settings["admin_mail"]]);
                 endif;
            endif;      

          if( $update ):
            $conn->commit();
            die("OK");
          else:
            $conn->rollBack();
             die("OK");
          endif;
      endif;
    endif;
    echo "OK";
    ## paytr bitti ##
  elseif( $method_name == "paywant" ):
    ## paytr başla ##
    $apiSecret    = $extras["apiSecret"];
    $SiparisID    = $_POST["SiparisID"];
    $ExtraData    = $_POST["ExtraData"];
    $UserID       = $_POST["UserID"];
    $ReturnData   = $_POST["ReturnData"];
    $Status       = $_POST["Status"];
    $OdemeKanali  = $_POST["OdemeKanali"];
    $OdemeTutari  = $_POST["OdemeTutari"];
    $NetKazanc    = $_POST["NetKazanc"];
    $Hash         = $_POST["Hash"];
    $order_id     = $_POST["ExtraData"];
    $hashKontrol = base64_encode(hash_hmac('sha256',"$SiparisID|$ExtraData|$UserID|$ReturnData|$Status|$OdemeKanali|$OdemeTutari|$NetKazanc" . $apiKey, $apiSecret, true));
    if( $Status == 100 ):
      if( countRow(["table"=>"orders","where"=>["payment_privatecode"=>$order_id,"order_status"=>1 ] ]) ):
       
        $payment = $conn->prepare("SELECT * FROM orders WHERE payment_privatecode=:orderid ");
        $payment->execute(array("orderid"=>$order_id));
        $payment = $payment->fetch(PDO::FETCH_ASSOC);
        $amount  = $payment["product_price"];
        
          $extra    = ($_POST);
          $extra    = json_encode($extra);
          $conn->beginTransaction();

          $update   = $conn->prepare("UPDATE orders SET order_status=:status, payment_extra=:extra WHERE order_id=:id ");
          $update   = $update->execute(array("status"=>2,"extra"=>$extra,"id"=>$payment["order_id"]));
 
        $user  = json_decode($payment["order_customer"], true);   
        $name  = $user["ad_soyad"];
        $email = $user["email"];
        $product_details = $payment["product_details"];

          sendMail(["subject"=>"Siparişiniz için teşekkür ederiz.","body"=>"Sn. $name, $amount Tutarındaki siparişiniz başarıyla alınmıştır. <br> $product_details","mail"=>$email]);

           if($settings["alert_newmanuelservice"] == 2):
                if( $settings["alert_type"] == 3 ):   $sendmail = 1; $sendsms  = 1; elseif( $settings["alert_type"] == 2 ): $sendmail = 1; $sendsms=0; elseif( $settings["alert_type"] == 1 ): $sendmail=0; $sendsms  = 1; endif;
                  if( $sendsms ):
                    SMSUser($settings["admin_telephone"],$amount."Tutarında ".$method["method_name"]." aracılığı ile yeni bir sipariş alındı.");
                  endif;
                  if( $sendmail ):
                    sendMail(["subject"=>"Yeni ödeme alındı.","body"=>$amount." Tutarında ".$method["method_name"]." aracılığı ile yeni bir sipariş alındı.","mail"=>$settings["admin_mail"]]);
                 endif;
            endif;      

          if( $update ):
            $conn->commit();
            echo "OK";
          else:
            $conn->rollBack();
            echo "NO";
          endif;
      endif;
    else:
        
        die("OK");
    endif;
    ## paywant bitti ##
  endif;
