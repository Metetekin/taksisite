<?php

if( !route(1) ){

  $title       = "Blog Yazılarımız";
  $keywords    = $settings["site_keywords"];
  $description = $settings["site_description"];


}elseif( route(1) ){
    
  $templateDir = "yazi_detay";

  $page = $conn->prepare("SELECT * FROM pages WHERE page_get=:get && page_type=:type ");
  $page-> execute(array("get"=>route(1),"type"=>3));
  $page = $page->fetch(PDO::FETCH_ASSOC);
  
  $title       = $page["page_name"];
  $keywords    = $page["page_keywords"];
  $description = $page["page_description"];
}

