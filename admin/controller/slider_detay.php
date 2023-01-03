<?php

    if( $user["access"]["gorunum"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;

    if( !route(2) && !is_numeric(route(2)) ):
        header("Location: ".site_url("admin/slider"));
        die;
    endif;

    $order = $conn->prepare("SELECT * FROM slider WHERE slider_id=:id ");
    $order -> execute(array("id"=>route(2)));
    $order = $order->fetch(PDO::FETCH_ASSOC);

if(!$order && route(2) != "sil" && !route(3) ):
        header("Location: ".site_url("admin/slider"));
        die;
endif;    


        if( $_POST ):
            
            $id = route(2);
            
            foreach ($_POST as $key => $value) {
              $$key = $value;
            }

          if ( $_FILES["logo2"] && ( $_FILES["logo2"]["type"] == "image/jpeg" || $_FILES["logo2"]["type"] == "image/jpg" || $_FILES["logo2"]["type"] == "image/png" || $_FILES["logo2"]["type"] == "image/gif"  ) ):
            $logo_name      = $_FILES["logo"]["name"];
            $uzanti         = substr($logo_name,-4,4);
            $md5            = md5(time());
            $logo_newname   = "assets/cloud/slider/$md5.png";
            $upload_logo    = move_uploaded_file($_FILES["logo2"]["tmp_name"],$logo_newname);
          elseif( $order["slider_image"] != "" ):
            $logo_newname   = $order["slider_image"];
          else:
            $logo_newname   = "";
          endif;
          
          
           if ( $_FILES["logo"] && ( $_FILES["logo"]["type"] == "image/jpeg" || $_FILES["logo"]["type"] == "image/jpg" || $_FILES["logo"]["type"] == "image/png" || $_FILES["logo"]["type"] == "image/gif"  ) ):
            $logo_name      = $_FILES["logo"]["name"];
            $uzanti         = substr($logo_name,-4,4);
            $md5            = md5(time());
            $logo_newname2   = "assets/cloud/slider/$md5.jpg";
            $upload_logo    = move_uploaded_file($_FILES["logo"]["tmp_name"],$logo_newname2);
          elseif( $order["slider_bg"] != "" ):
            $logo_newname2   = $order["slider_bg"];
          else:
            $logo_newname2   = "";
          endif;

            $insert = $conn->prepare("UPDATE slider SET slider_sid=:slider_sid, slider_name=:slider_name, slider_content=:slider_content, slider_button=:slider_button, slider_url=:slider_url, slider_image=:slider_image, slider_bg=:slider_bg WHERE slider_id=:id");
            $insert->execute(array("id"=>$id,"slider_sid"=>$slider_sid,"slider_name"=>$slider_name,"slider_content"=>$slider_content,"slider_button"=>$slider_button,"slider_url"=>$slider_url,"slider_image"=>$logo_newname,"slider_bg"=>$logo_newname2 ));

            header("Location: ".site_url("admin/slider_detay/$id"));
         elseif( !$_POST && route(2) == "sil" && route(3) ):
            
            $delete = $conn->prepare("DELETE FROM slider WHERE slider_id=:id ");
            $delete->execute(array("id"=>route(3)));
        
            header("Location: ".site_url("admin/slider"));


            
        endif;
       

  require admin_view('slider_detay');
  