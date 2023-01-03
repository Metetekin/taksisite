<?php



if( !route(1) ){
    header("Location: /");
    die;
}elseif( route(1) ){
    
  $category = $conn->prepare("SELECT * FROM categories WHERE category_url=:get ");
  $category-> execute(array("get"=>route(1)));
  $category = $category->fetch(PDO::FETCH_ASSOC);
  
  $productList = $conn->prepare("SELECT * FROM products WHERE product_category=:id ");
  $productList-> execute(array("id"=>$category["category_id"] ));
  $productList = $productList->fetchAll(PDO::FETCH_ASSOC);
  
  
  $title       = $category["category_name"];
  $keywords    = $settings["site_keywords"];
  $description = $settings["site_description"];
}

