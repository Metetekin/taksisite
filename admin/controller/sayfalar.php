<?php

  if( $user["access"]["sayfalar"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;

    $orders         = $conn->prepare("SELECT * FROM pages WHERE page_type=:type");
    $orders         -> execute(array("type"=>2));
    $orders         = $orders->fetchAll(PDO::FETCH_ASSOC);

  require admin_view('sayfalar');
  