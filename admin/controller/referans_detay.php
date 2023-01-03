<?php

    if( $user["access"]["referanslar"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;
    
    if( !route(2) && !is_numeric(route(2)) ):
        header("Location: ".site_url("admin/referanslar"));
        die;
    endif;

    $order = $conn->prepare("SELECT * FROM reference WHERE reference_id=:id ");
    $order -> execute(array("id"=>route(2)));
    $order = $order->fetch(PDO::FETCH_ASSOC);

if(!$order && route(2) != "sil" && !route(3) ):
        header("Location: ".site_url("admin/referanslar"));
        die;
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
          elseif( $order["reference_image"] != "" ):
            $logo_newname   = $order["reference_image"];
          else:
            $logo_newname   = "";
          endif;

            $update = $conn->prepare("UPDATE reference SET reference_name=:reference_name, reference_url=:reference_url, reference_image=:reference_image WHERE reference_id=:id ");
            $update->execute(array("id"=>$id,"reference_name"=>$reference_name,"reference_url"=>$reference_url,"reference_image"=>$logo_newname ));
            
            header("Location: ".site_url("admin/referans_detay/$id"));
         elseif( !$_POST && route(2) == "sil" && route(3) ):
            
            $delete = $conn->prepare("DELETE FROM reference WHERE reference_id=:id ");
            $delete->execute(array("id"=>route(3)));
        
            header("Location: ".site_url("admin/referanslar"));
            
        endif;
       

  require admin_view('referans_detay');
  