<?php

    if( $user["access"]["ayarlar"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;
       
      if( $_POST ):
          
          foreach ($_POST as $key => $value) {
            $$key = $value;
          }
          
          if ( $_FILES["logo"] && ( $_FILES["logo"]["type"] == "image/jpeg" || $_FILES["logo"]["type"] == "image/jpg" || $_FILES["logo"]["type"] == "image/png" || $_FILES["logo"]["type"] == "image/gif"  ) ):
            $logo_name      = $_FILES["logo"]["name"];
            $uzanti         = substr($logo_name,-4,4);
            $md5            = md5(rand(1,999999));
            $logo_newname   = "assets/cloud/uploads/$md5.png";
            $upload_logo    = move_uploaded_file($_FILES["logo"]["tmp_name"],$logo_newname);
          elseif( $settings["site_logo"] != "" ):
            $logo_newname   = $settings["site_logo"];
          else:
            $logo_newname   = "";
          endif;
          
          if ( $_FILES["favicon"] && ( $_FILES["favicon"]["type"] == "image/jpeg" || $_FILES["favicon"]["type"] == "image/jpg" || $_FILES["favicon"]["type"] == "image/png" || $_FILES["favicon"]["type"] == "image/gif"  ) ):
            $favicon_name   = $_FILES["favicon"]["name"];
            $uzanti         = substr($logo_name,-4,4);
            $md5            = md5(rand(123,999999));
            $fv_newname   = "assets/cloud/uploads/$md5.png";
            $upload_logo    = move_uploaded_file($_FILES["favicon"]["tmp_name"],$fv_newname);
          elseif( $settings["favicon"] != "" ):
            $fv_newname     = $settings["favicon"];
          else:
            $fv_newname     = "";
          endif;
          
            $update = $conn->prepare("UPDATE settings SET instagram=:instagram, facebook=:facebook, twitter=:twitter, linkedin=:linkedin, site_currency=:site_currency, site_mail=:site_mail, site_telephone=:site_telephone, site_address=:site_address, site_maps=:site_maps, site_maintenance=:site_maintenance, site_name=:name, site_logo=:logo, favicon=:fv, recaptcha=:recaptcha, recaptcha_key=:recaptcha_key, recaptcha_secret=:recaptcha_secret, custom_header=:custom_header, custom_footer=:custom_footer WHERE id=:id ");
            $update->execute(array("id"=>1,"instagram"=>$instagram,"facebook"=>$facebook,"twitter"=>$twitter,"linkedin"=>$linkedin,"site_currency"=>$site_currency,"site_mail"=>$site_mail,"site_telephone"=>$site_telephone,"site_address"=>$site_address,"site_maps"=>$site_maps,"site_maintenance"=>$site_maintenance,"name"=>$name,"logo"=>$logo_newname,"fv"=>$fv_newname,"recaptcha"=>$recaptcha,"recaptcha_secret"=>$recaptcha_secret,"recaptcha_key"=>$recaptcha_key,"custom_footer"=>$custom_footer,"custom_header"=>$custom_header ));

            header("Location:".site_url("admin/ayarlar"));
            
        endif;
       

  require admin_view('ayarlar');
  