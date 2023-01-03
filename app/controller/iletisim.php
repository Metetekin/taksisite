<?php

  $title       = "Bize Ulaşın";
  $keywords    = $settings["site_keywords"];
  $description = $settings["site_description"];


  if( $_POST ){

    $name     = htmlspecialchars($_POST["name"]);
    $email    = htmlspecialchars($_POST["email"]);
    $telephone= htmlspecialchars($_POST["telephone"]);
    $subject  = htmlspecialchars($_POST["subject"]);
    $message  = htmlspecialchars($_POST["message"]);
  $captcha        = $_POST['g-recaptcha-response'];

      $googlesecret   = $settings["recaptcha_secret"];

    $captcha_control= cURL("https://www.google.com/recaptcha/api/siteverify?secret=$googlesecret&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
    $captcha_control= json_decode($captcha_control);

      if($settings["recaptcha"] == 2 && $captcha_control->success == false){
         $errorText= "Lütfen robot olmadığınızı doğrulayın.";
      }elseif(  empty($name) ||  empty($email) || empty($telephone) || empty($message)  || empty($subject) ){
        $error    = 1;
        $errorText= "Lütfen boş alan bırakmayınız";
      }elseif( strlen(str_replace(' ','',$message)) < 10 ){
        $error    = 1;
        $errorText= "Mesaj içeriği minimum 10 karakter olabilir.";
      }else{

        $insert = $conn->prepare("INSERT INTO tickets SET customer_name=:customer_name, customer_email=:customer_email, customer_telephone=:customer_telephone, ticket_subject=:ticket_subject, ticket_message=:ticket_message, ticket_date=:date ");
        $insert = $insert->execute(array("customer_name"=>$name,"customer_email"=>$email,"customer_telephone"=>$telephone,"ticket_subject"=>$subject,"ticket_message"=>$message,"date"=>date("Y.m.d H:i:s") ));
       
        if( $insert ){ $ticket_id = $conn->lastInsertId(); }
        
        if( $insert ):

        $successText= "Mesajınız alınmıştır, size en kısa sürede dönüş yapacağız.";


          if( $settings["alert_newticket"] == 2 ):
            if( $settings["alert_type"] == 3 ):   $sendmail = 1; $sendsms  = 1; elseif( $settings["alert_type"] == 2 ): $sendmail = 1; $sendsms=0; elseif( $settings["alert_type"] == 1 ): $sendmail=0; $sendsms  = 1; endif;
            if( $sendsms ):
              SMSUser($settings["admin_telephone"],"Websitenizde #".$ticket_id." idli yeni bir iletişim mesajı mevcut.");
            endif;
            if( $sendmail ):
              sendMail(["subject"=>"Yeni destek talebi mevcut.","body"=>"Websitenizde #".$ticket_id." idli yeni bir iletişim mesajı mevcut.","mail"=>$settings["admin_mail"]]);
            endif;
          endif;

        endif;
      }
  }
