<?php

    if( $user["access"]["referanslar"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;

        if( $_POST ):
            
            $id = route(2);
            
            foreach ($_POST as $key => $value) {
              $$key = $value;
            }

        if ( $_FILES["logo"] && ( $_FILES["logo"]["type"] == "image/jpeg" || $_FILES["logo"]["type"] == "image/jpg" || $_FILES["logo"]["type"] == "image/png" || $_FILES["logo"]["type"] == "image/gif"  ) ):
            $logo_name      = $_FILES["logo"]["name"];
            $uzanti         = substr($logo_name,-4,4);
            $md5            = md5(time());
            $logo_newname   = "assets/cloud/reference/$md5.jpg";
            $upload_logo    = move_uploaded_file($_FILES["logo"]["tmp_name"],$logo_newname);
          else:
            $logo_newname   = "";
          endif;

            $insert = $conn->prepare("INSERT INTO reference SET reference_name=:reference_name, reference_url=:reference_url, reference_image=:reference_image ");
            $insert->execute(array("reference_name"=>$reference_name,"reference_url"=>$reference_url,"reference_image"=>$logo_newname ));
            
            if( $insert ){ 
                $id = $conn->lastInsertId(); 
                header("Location: ".site_url("admin/referans_detay/$id"));
            }
            
        endif;
       

  require admin_view('referans_ekle');
  