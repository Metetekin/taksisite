<?php

function permalink($deger) { 

$turkce=array("ş","Ş","ı","(",")","","ü","Ü","ö","Ö","ç","Ç"," ","/","*","?","ş","Ş","ı","ğ","Ğ","İ","ö","Ö","Ç","ç","ü","Ü"); 
$duzgun=array("s","S","i","","","","u","U","o","O","c","C","-","-","-","","s","S","i","g","G","I","o","O","C","c","u","U"); 
$deger=str_replace($turkce,$duzgun,$deger);
$deger = preg_replace("@[^A-Za-z0-9-_]+@i","",$deger);
$deger = mb_strtolower($deger);

return $deger; } 

function currency($value){
  switch ($value) {
      case 'TRY':
        return '₺';
        break;
      case 'USD':
        return '$';
        break;
      case 'EUR':
        return '€';
        break;
   }
}

function product_type($value){
  switch ($value) {
      case '1':
        return 'Fiziksel Ürün';
        break;
      case '2':
        return 'Dijital Ürün';
        break;
   }    
}

function status($value){
  switch ($value) {
      case '1':
        return 'Sipariş Alındı';
        break;
      case '2':
        return 'Sipariş Hazırlanıyor';
        break;
      case '3':
        return 'Üretimde';
        break;
      case '4':
        return 'Kargoya Verildi';
        break;
      case '5':
        return 'Teslim Edildi';
        break;
      case '6':
        return 'İptal/İade Edildi';
        break;        
   }
}

function generate_shopier_form($data){
 $api_key  = $data->apikey;
 $secret  = $data->apisecret;
 $user_registered = date("Y.m.d");
 $time_elapsed = time() - strtotime($user_registered);
 $buyer_account_age = (int)($time_elapsed/86400);
 $currency = 0;
 $dataArray = $data;

 $productinfo = $data->item_name;
 $producttype = 1;


 $productinfo = str_replace('"','',$productinfo);
 $productinfo = str_replace('"','',$productinfo);
 $current_language=0;
 $current_lan=0;
 $modul_version=('1.0.4');
 srand(time(NULL));
 $random_number=rand(1000000,9999999);
 $args = array(
   'API_key' => $api_key,
   'website_index' => $data->website_index,
   'platform_order_id' => $data->order_id,
   'product_name' => $productinfo,
   'product_type' => $producttype,
   'buyer_name' => $data->buyer_name,
   'buyer_surname' => $data->buyer_surname,
   'buyer_email' => $data->buyer_email,
   'buyer_account_age' => $buyer_account_age,
   'buyer_id_nr' => 0,
   'buyer_phone' => $data->buyer_phone,
   'billing_address' => $data->billing_address,
   'billing_city' => $data->city,
   'billing_country' => "TR",
   'billing_postcode' => "",
   'shipping_address' => $data->billing_address,
   'shipping_city' => $data->city,
   'shipping_country' => "TR",
   'shipping_postcode' => "",
   'total_order_value' => $data->ucret,
   'currency' => $currency,
   'platform' => 0,
   'is_in_frame' => 1,
   'current_language'=>$current_lan,
   'modul_version'=>$modul_version,
   'random_nr' => $random_number
 );

 $data = $args["random_nr"].$args["platform_order_id"].$args["total_order_value"].$args["currency"];
 $signature = hash_hmac("SHA256",$data,$secret,true);
 $signature = base64_encode($signature);
 $args['signature'] = $signature;

   $args_array = array();
   foreach($args as $key => $value){
     $args_array[] = "<input type='hidden' name='$key' value='$value'/>";
   }
   if( !empty($dataArray->apikey) && !empty($dataArray->apisecret) && !empty($dataArray->website_index) ){
     $_SESSION["data"]["payment_shopier"]  = true;

     return '<html> <!doctype html><head> <meta charset="UTF-8"> <meta content="True" name="HandheldFriendly"> <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="robots" content="noindex, nofollow, noarchive" />
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0" /> <title lang="tr">Güvenli Ödeme Sayfası</title><body><head>
      <form action="https://www.shopier.com/ShowProduct/api_pay4.php" method="post" id="shopier_payment_form" style="display: none">' . implode('', $args_array) .
      '<script>setInterval(function(){document.getElementById("shopier_payment_form").submit();},2000)</script></form></body></html>';
   }

}


function username_check($username){
  if (preg_match('/^[a-z\d_]{4,32}$/i', $username)){
    $validate = true;
  }else{
    $validate = false;
  }
  return $validate;
}

function email_check($email){
  if( filter_var($email,FILTER_VALIDATE_EMAIL) ){
    $validate = true;
  }else{
    $validate = false;
  }
  return $validate;
}

function userdata_check($where,$data){
  global $conn;
  $row  = $conn->prepare("SELECT * FROM clients WHERE $where=:data ");
  $row-> execute(array("data"=>$data));
  if( $row->rowCount() ){
    $validate = true;
  }else{
    $validate = false;
  }
  return $validate;
}

function userlogin_check($username,$pass){
  global $conn;
  $row  = $conn->prepare("SELECT * FROM clients WHERE username=:username && password=:password ");
  $row-> execute(array("username"=>$username,"password"=>md5(sha1(md5($pass))) ));
  if( $row->rowCount() ){
    $validate = true;
  }else{
    $validate = false;
  }
  return $validate;
}

function countRow($data){
  global $conn;
    $where    = "";
    if( $data["where"] ):
      $where    = "WHERE ";
        foreach ($data["where"] as $key => $value) {
          $where.=" $key=:$key && ";
          $execute[$key]=$value;
        }
        $where    = substr($where,0,-3);
    else:
      $execute[]= "";
    endif;
  $row  = $conn->prepare("SELECT * FROM {$data['table']} $where ");
  $row-> execute($execute);
  $validate = $row->rowCount();
  return $validate;
}

function getRows($data){
  global $conn;
    $where    = "";
    $order    = "";
    $order    = "";
    $limit    = "";
    $execute[]= "";
    if( $data["where"] ):
      $where    = "WHERE ";
        foreach ($data["where"] as $key => $value) {
          $where.=" $key=:$key && ";
          $execute[$key]=$value;
        }
        $where    = substr($where,0,-3);
    endif;

    if( $data["order"] ): $order  = "ORDER BY ".$data["order"]." ".$data["order_type"]; endif;
    if( $data["limit"] ): $limit  = "LIMIT ".$data["limit"]; endif;
  $row  = $conn->prepare("SELECT * FROM {$data['table']} $where $order $limit ");
  $row-> execute($execute);
    if( $row->rowCount() ):
      $rows = $row->fetchAll(PDO::FETCH_ASSOC);
    else:
      $rows = [];
    endif;
  return $rows;
}

function getRow($data){
  global $conn;
    $where    = "WHERE ";
      foreach ($data["where"] as $key => $value) {
        $where.=" $key=:$key && ";
        $execute[$key]=$value;
      }
    $where    = substr($where,0,-3);
  $row  = $conn->prepare("SELECT * FROM {$data['table']} $where ");
  $row-> execute($execute);
    if( $row->rowCount() ):
      $row = $row->fetch(PDO::FETCH_ASSOC);
    else:
      $row = [];
    endif;
  return $row;
}
