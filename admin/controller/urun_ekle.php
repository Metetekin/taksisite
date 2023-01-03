<?php

    if( $user["access"]["urunler"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;
    
    $categories = $conn->prepare("SELECT * FROM categories");
    $categories->execute(array());
    $categories = $categories->fetchAll(PDO::FETCH_ASSOC);

        if( $_POST ):
            
            foreach ($_POST as $key => $value) {
              $$key = $value;
            }

        if ( $_FILES["logo"] && ( $_FILES["logo"]["type"] == "image/jpeg" || $_FILES["logo"]["type"] == "image/jpg" || $_FILES["logo"]["type"] == "image/png" || $_FILES["logo"]["type"] == "image/gif"  ) ):
            $logo_name      = $_FILES["logo"]["name"];
            $uzanti         = substr($logo_name,-4,4);
            $md5            = md5(time());
            $logo_newname   = "assets/cloud/products/$md5.png";
            $upload_logo    = move_uploaded_file($_FILES["logo"]["tmp_name"],$logo_newname);
          else:
            $logo_newname   = "";
          endif;

            $url = permalink($product_name);


            $insert = $conn->prepare("INSERT INTO products SET product_url=:product_url, product_keyword=:product_keyword, product_desc=:product_desc, product_content=:product_content, product_category=:product_category, product_name=:product_name, product_details=:product_details, product_price=:product_price, product_image=:product_image, product_type=:product_type ");
            $insert->execute(array("product_url"=>$url,"product_keyword"=>$product_keyword,"product_desc"=>$product_desc,"product_content"=>$product_content,"product_category"=>$product_category,"product_name"=>$product_name,"product_details"=>$product_details,"product_price"=>$product_price,"product_image"=>$logo_newname, "product_type"=>$product_type ));
            
            if( $insert ){ 
                $id = $conn->lastInsertId(); 
                header("Location: ".site_url("admin/urun_detay/$id"));
            }

        endif;
       

  require admin_view('urun_ekle');
  