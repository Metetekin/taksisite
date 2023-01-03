<?php

  if( $user["access"]["referanslar"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;

  if( $_SESSION["client"]["data"] ):
    $data = $_SESSION["client"]["data"];
    foreach ($data as $key => $value) {
      $$key = $value;
    }
    unset($_SESSION["client"]);
  endif;

    $orders         = $conn->prepare("SELECT * FROM reference ");
    $orders         -> execute(array());
    $orders         = $orders->fetchAll(PDO::FETCH_ASSOC);

  require admin_view('referanslar');
  