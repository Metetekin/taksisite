<?php

if( !route(1) ){
  header("Location: /");
  die;
}elseif( route(1) ){
  $page = $conn->prepare("SELECT * FROM pages WHERE page_get=:get && page_type=:type ");
  $page-> execute(array("get"=>route(1),"type"=>2));
  $page = $page->fetch(PDO::FETCH_ASSOC);
  
  $title       = $page["page_name"];
  $keywords    = $page["page_keywords"];
  $description = $page["page_description"];
}

