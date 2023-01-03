<?php

  if( $user["access"]["urunler"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;

    if( route(2) && is_numeric(route(2)) ):
      $page = route(2);
    else:
      $page = 1;
    endif;

      $count          = $conn->prepare("SELECT * FROM products ");
      $count        ->execute(array());
      $count          = $count->rowCount();

    $to             = 100;
    $pageCount      = ceil($count/$to); if( $page > $pageCount ): $page = 1; endif;
    $where          = ($page*$to)-$to;
    $paginationArr  = ["count"=>$pageCount,"current"=>$page,"next"=>$page+1,"previous"=>$page-1];
    
    $orders         = $conn->prepare("SELECT * FROM products LEFT JOIN categories ON products.product_category=categories.category_id ORDER BY products.product_id DESC LIMIT $where,$to ");
    $orders         -> execute(array());
    $orders         = $orders->fetchAll(PDO::FETCH_ASSOC);


  require admin_view('urunler');
  