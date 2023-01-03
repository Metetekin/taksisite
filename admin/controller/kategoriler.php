<?php

  if( $user["access"]["kategoriler"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;

    
    $orders         = $conn->prepare("SELECT * FROM categories ORDER BY category_id DESC ");
    $orders         -> execute(array());
    $orders         = $orders->fetchAll(PDO::FETCH_ASSOC);


  require admin_view('kategoriler');
  