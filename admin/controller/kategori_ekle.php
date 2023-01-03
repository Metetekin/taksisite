<?php

    if( $user["access"]["galeri"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;

        if( $_POST ):
            
            $id = route(2);
            
            foreach ($_POST as $key => $value) {
              $$key = $value;
            }
            
            $url = permalink($category_name);

            $insert = $conn->prepare("INSERT categories SET category_name=:category_name, category_url=:category_url ");
            $insert->execute(array("category_name"=>$category_name, "category_url"=>$url));
            
            if( $insert ){ 
                $id = $conn->lastInsertId(); 
                header("Location: ".site_url("admin/kategori_detay/$id"));
            }


        endif;
       

  require admin_view('kategori_ekle');
  