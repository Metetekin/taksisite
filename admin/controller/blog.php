<?php

  if( $user["access"]["blog"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;

    $orders         = $conn->prepare("SELECT * FROM pages WHERE page_type=:type");
    $orders         -> execute(array("type"=>3));
    $orders         = $orders->fetchAll(PDO::FETCH_ASSOC);

  require admin_view('blog');
  