<?php
    
  if( $user["access"]["gorunum"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;


    $orders         = $conn->prepare("SELECT * FROM faqs ");
    $orders         -> execute(array());
    $orders         = $orders->fetchAll(PDO::FETCH_ASSOC);

  require admin_view('sorular');
  