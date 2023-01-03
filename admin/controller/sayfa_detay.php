<?php

    if( $user["access"]["sayfalar"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;
    
    if( !route(2) && !is_numeric(route(2)) ):
        header("Location: ".site_url("admin/sayfalar"));
        die;
    endif;

    $order = $conn->prepare("SELECT * FROM pages WHERE page_type=:type && page_id=:id ");
    $order -> execute(array("id"=>route(2),"type"=>2));
    $order = $order->fetch(PDO::FETCH_ASSOC);

if(!$order && route(2) != "sil" && !route(3) ):
        header("Location: ".site_url("admin/sayfalar"));
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
            $logo_newname   = "assets/cloud/pages/$md5.png";
            $upload_logo    = move_uploaded_file($_FILES["logo"]["tmp_name"],$logo_newname);
          elseif( $order["page_image"] != "" ):
            $logo_newname   = $order["page_image"];
          else:
            $logo_newname   = "";
          endif;
          
          $permalink = permalink($page_name);

            $update = $conn->prepare("UPDATE pages SET page_name=:page_name, page_keywords=:page_keywords, page_content=:page_content, page_description=:page_description, page_image=:page_image, page_get=:page_get, page_date=:date WHERE page_id=:id ");
            $update->execute(array("id"=>$id,"page_name"=>$page_name,"page_keywords"=>$page_keywords,"page_content"=>$page_content,"page_description"=>$page_description,"page_image"=>$logo_newname,"page_get"=>$permalink,"date"=>date("Y.m.d H:i:s")  ));
            
            header("Location: ".site_url("admin/sayfa_detay/$id"));
         elseif( !$_POST && route(2) == "sil" && route(3) ):
            
            $delete = $conn->prepare("DELETE FROM pages WHERE page_id=:id ");
            $delete->execute(array("id"=>route(3)));
        
            header("Location: ".site_url("admin/sayfalar"));
            
        endif;
       

  require admin_view('sayfa_detay');