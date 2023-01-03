<?php

  if( $user["access"]["siparisler"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;


    if( route(2) && is_numeric(route(2)) ):
      $page = route(2);
    else:
      $page = 1;
    endif;

if($_GET["order"]):
    $order= $_GET["order"];
    
            header("Location: ".site_url("admin/siparis_detay/$order"));
        die;

endif;    


      $count          = $conn->prepare("SELECT * FROM orders WHERE orders.payment_status='2' ");
      $count        ->execute(array());
      $count          = $count->rowCount();
      $search         = "WHERE orders.payment_status='2' ";
      
    $to             = 100;
    $pageCount      = ceil($count/$to); if( $page > $pageCount ): $page = 1; endif;
    $where          = ($page*$to)-$to;
    $paginationArr  = ["count"=>$pageCount,"current"=>$page,"next"=>$page+1,"previous"=>$page-1];
    
    $orders         = $conn->prepare("SELECT * FROM orders LEFT JOIN products ON products.product_id=orders.order_product $search ORDER BY orders.order_id DESC LIMIT $where,$to ");
    $orders         -> execute(array());
    $orders         = $orders->fetchAll(PDO::FETCH_ASSOC);


  require admin_view('siparisler');
  