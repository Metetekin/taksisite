<?php

    if( $user["access"]["urunler"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;
    
    if( !route(2) && !is_numeric(route(2)) ):
        header("Location: ".site_url("admin/urunler"));
        die;
    endif;

    $order = $conn->prepare("SELECT * FROM products LEFT JOIN categories ON products.product_category=categories.category_id WHERE product_id=:id ");
    $order -> execute(array("id"=>route(2)));
    $order = $order->fetch(PDO::FETCH_ASSOC);

  $categories = $conn->prepare("SELECT * FROM categories");
  $categories->execute(array());
  $categories = $categories->fetchAll(PDO::FETCH_ASSOC);

if(!$order && route(2) != "sil" && !route(3) ):
        header("Location: ".site_url("admin/urunler"));
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
            $logo_newname   = "assets/cloud/products/$md5.png";
            $upload_logo    = move_uploaded_file($_FILES["logo"]["tmp_name"],$logo_newname);
          elseif( $order["product_image"] != "" ):
            $logo_newname   = $order["product_image"];
          else:
            $logo_newname   = "";
          endif;

            $url = permalink($product_name);

            $update = $conn->prepare("UPDATE products SET product_url=:product_url, product_keyword=:product_keyword, product_desc=:product_desc, product_content=:product_content,product_category=:product_category, product_name=:product_name, product_details=:product_details, product_price=:product_price, product_image=:product_image, product_type=:product_type WHERE product_id=:id ");
            $update->execute(array("product_url"=>$url,"product_keyword"=>$product_keyword,"product_desc"=>$product_desc,"product_content"=>$product_content,"id"=>$id,"product_category"=>$product_category,"product_name"=>$product_name,"product_details"=>$product_details,"product_price"=>$product_price,"product_image"=>$logo_newname,"product_type"=>$product_type ));
            
            header("Location: ".site_url("admin/urun_detay/$id"));
         elseif( !$_POST && route(2) == "sil" && route(3) ):
            
            $delete = $conn->prepare("DELETE FROM products WHERE product_id=:id ");
            $delete->execute(array("id"=>route(3)));
        
            header("Location: ".site_url("admin/urunler"));
            
        endif;
       

  require admin_view('urun_detay');
  