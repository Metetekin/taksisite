<?php

  if( $user["access"]["guvenlik"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;

    $orders         = $conn->prepare("SELECT * FROM clients ");
    $orders         -> execute(array());
    $orders         = $orders->fetchAll(PDO::FETCH_ASSOC);

  require admin_view('yonetici');
  