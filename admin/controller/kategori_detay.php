<?php

    if( $user["access"]["kategoriler"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;
    
    if( !route(2) && !is_numeric(route(2)) ):
        header("Location: ".site_url("admin/kategoriler"));
        die;
    endif;

    $category = $conn->prepare("SELECT * FROM categories WHERE category_id=:id ");
    $category -> execute(array("id"=>route(2)));
    $category = $category->fetch(PDO::FETCH_ASSOC);

if(!$category && route(2) != "sil" && !route(3) ):
        header("Location: ".site_url("admin/kategoriler"));
        die;
endif;    

        if( $_POST ):
            
            $id = route(2);
            
            foreach ($_POST as $key => $value) {
              $$key = $value;
            }
            
            $url = permalink($category_name);

            $insert = $conn->prepare("UPDATE categories SET category_name=:category_name, category_url=:category_url WHERE category_id=:id");
            $insert->execute(array("category_name"=>$category_name, "category_url"=>$url, "id"=>route(2)));

            
            header("Location: ".site_url("admin/kategori_detay/$id"));
         elseif( !$_POST && route(2) == "sil" && route(3) ):
            
            $delete = $conn->prepare("DELETE FROM reference WHERE reference_id=:id ");
            $delete->execute(array("id"=>route(3)));
        
            header("Location: ".site_url("admin/kategoriler"));
            
        endif;
       

  require admin_view('kategori_detay');
  