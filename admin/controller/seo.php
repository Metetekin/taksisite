<?php

    if( $user["access"]["ayarlar"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;
       
      if( $_POST ):
          
          foreach ($_POST as $key => $value) {
            $$key = $value;
          }
          
            $update = $conn->prepare("UPDATE settings SET site_title=:site_title, site_keywords=:site_keywords, site_description=:site_description, custom_meta=:custom_meta WHERE id=:id ");
            $update->execute(array("id"=>1,"site_title"=>$site_title, "site_keywords"=>$site_keywords, "site_description"=>$site_description,"custom_meta"=>$custom_meta));

            header("Location:".site_url("admin/seo"));
            
        endif;
       

  require admin_view('seo');
  