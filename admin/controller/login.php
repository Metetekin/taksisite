<?php

if( $_POST ){

  $username       = $_POST["username"];
  $pass           = $_POST["password"];
  $captcha        = $_POST['g-recaptcha-response'];
  $remember       = $_POST["remember"];
  $googlesecret   = $settings["recaptcha_secret"];
  $captcha_control= cURL("https://www.google.com/recaptcha/api/siteverify?secret=$googlesecret&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
  $captcha_control= json_decode($captcha_control);

  if(  $settings["recaptcha"] == 2 && $captcha_control->success == false && $_SESSION["recaptcha"]  ){
    $error      = 1;
    $errorText  = "Lütfen robot olmadığınızı doğrulayın.";
       $_SESSION["recaptcha"]  = true; 
  }elseif( !userdata_check("username",$username) ){
    $error      = 1;
    $errorText  = "Girdiğiniz kullanıcı adı sistemde bulunamadı.";
       $_SESSION["recaptcha"]  = true; 
  }elseif( !userlogin_check($username,$pass) ){
    $error      = 1;
    $errorText  = "Bilgileriniz eşleşmiyor.";
       $_SESSION["recaptcha"]  = true; 
  }else{
    $row    = $conn->prepare("SELECT * FROM clients WHERE username=:username && password=:password ");
    $row  -> execute(array("username"=>$username,"password"=>md5(sha1(md5($pass))) ));
    $row    = $row->fetch(PDO::FETCH_ASSOC);
    
    $_SESSION["softyr_adminlogin"] = 1;
    $_SESSION["softyr_userlogin"]  = 1;
    $_SESSION["softyr_userid"]     = $row["client_id"];
    $_SESSION["softyr_userpass"]   = md5(sha1(md5($pass)));
    $_SESSION["recaptcha"]             = false;
    	 
    setcookie("a_login", 'ok', time()+(60*60*24*7), '/', null, null, true );
    setcookie("u_id", $row["client_id"], time()+(60*60*24*7), '/', null, null, true );
    setcookie("u_password", $row["password"], time()+(60*60*24*7), '/', null, null, true );
    setcookie("u_login", 'ok', time()+(60*60*24*7), '/', null, null, true );
    
    header('Location:'.site_url('admin'));
    
    $insert = $conn->prepare("INSERT INTO client_report SET client_id=:c_id, action=:action, report_ip=:ip, report_date=:date ");
    $insert->execute(array("c_id"=>$row["client_id"],"action"=>"Yönetici girişi yapıldı.","ip"=>GetIP(),"date"=>date("Y-m-d H:i:s") ));
    
    $update = $conn->prepare("UPDATE clients SET login_date=:date, login_ip=:ip WHERE client_id=:c_id ");
    $update->execute(array("c_id"=>$row["client_id"],"date"=>date("Y.m.d H:i:s"),"ip"=>GetIP() ));
      
  }


}

if( $user["access"]["admin_access"]  && $_SESSION["softyr_adminlogin"] && $user["client_type"] == 2  ):
	header("Location:".site_url("admin"));
	exit();
else:
	require admin_view('login');
endif;

