<?php

    if( $user["access"]["ayarlar"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;
    
        if( $_POST ):
            
          foreach ($_POST as $key => $value) {
            $$key = $value;
          }
          
          $update = $conn->prepare("UPDATE settings SET admin_mail=:mail, admin_telephone=:telephone, alert_type=:alert_type, alert_newticket=:alert_newticket, alert_newmanuelservice=:alert_newmanuelservice, sms_provider=:sms_provider, sms_title=:sms_title, sms_user=:sms_user, sms_pass=:sms_pass, smtp_user=:smtp_user, smtp_pass=:smtp_pass, smtp_server=:smtp_server WHERE id=:id ");
          $update = $update->execute(array("id"=>1,"mail"=>$admin_mail,"telephone"=>$admin_telephone,"alert_type"=>$alert_type,"alert_newticket"=>$alert_newticket,"alert_newmanuelservice"=>$alert_newmanuelservice,"sms_provider"=>$sms_provider,"sms_title"=>$sms_title,"sms_user"=>$sms_user,"sms_pass"=>$sms_pass,"smtp_user"=>$smtp_user,"smtp_pass"=>$smtp_pass,"smtp_server"=>$smtp_server ));
            
        header("Location:".site_url("admin/bildirim"));
            
        endif;
       

  require admin_view('bildirim');
  