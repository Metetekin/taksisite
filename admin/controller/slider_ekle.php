<?php

    if( $user["access"]["gorunum"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;

        if( $_POST ):
            
            foreach ($_POST as $key => $value) {
              $$key = $value;
            }

          if ( $_FILES["logo2"] && ( $_FILES["logo2"]["type"] == "image/jpeg" || $_FILES["logo2"]["type"] == "image/jpg" || $_FILES["logo2"]["type"] == "image/png" || $_FILES["logo2"]["type"] == "image/gif"  ) ):
            $logo_name      = $_FILES["logo"]["name"];
            $uzanti         = substr($logo_name,-4,4);
            $md5            = md5(time());
            $logo_newname   = "assets/cloud/slider/$md5.png";
            $upload_logo    = move_uploaded_file($_FILES["logo2"]["tmp_name"],$logo_newname);
          else:
            $logo_newname   = "";
          endif;
          
           if ( $_FILES["logo"] && ( $_FILES["logo"]["type"] == "image/jpeg" || $_FILES["logo"]["type"] == "image/jpg" || $_FILES["logo"]["type"] == "image/png" || $_FILES["logo"]["type"] == "image/gif"  ) ):
            $logo_name      = $_FILES["logo"]["name"];
            $uzanti         = substr($logo_name,-4,4);
            $md5            = md5(time());
            $logo_newname2   = "assets/cloud/slider/$md5.jpg";
            $upload_logo    = move_uploaded_file($_FILES["logo"]["tmp_name"],$logo_newname2);
          else:
            $logo_newname2   = "";
          endif;

            $insert = $conn->prepare("INSERT INTO slider SET slider_sid=:slider_sid, slider_name=:slider_name, slider_content=:slider_content, slider_button=:slider_button, slider_url=:slider_url, slider_image=:slider_image, slider_bg=:slider_bg ");
                $insert->execute(array("slider_sid"=>$slider_sid,"slider_name"=>$slider_name,"slider_content"=>$slider_content,"slider_button"=>$slider_button,"slider_url"=>$slider_url,"slider_image"=>$logo_newname,"slider_bg"=>$logo_newname2 ));
            
            if( $insert ){ 
                $id = $conn->lastInsertId(); 
                header("Location: ".site_url("admin/slider_detay/$id"));
            }
            
        endif;
       

  require admin_view('slider_ekle');
  