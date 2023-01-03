<?php

  if( $user["access"]["ayarlar"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;


    $methodList = $conn->prepare("SELECT * FROM payment_methods ");
    $methodList->execute(array());
    $methodList = $methodList->fetchAll(PDO::FETCH_ASSOC);

    if( route(2) == "edit" && $_POST  ):
          $id = route(3);
          
          foreach ($_POST as $key => $value) {
            $$key = $value;
          }
          
        $update = $conn->prepare("UPDATE payment_methods SET method_type=:type, method_extras=:extras WHERE method_get=:id ");
        $update->execute(array("id"=>$id,"type"=>$method_type,"extras"=>json_encode($_POST) ));
        
        header("Location: ".site_url("admin/odeme"));
    endif;
    
    require admin_view('odeme');
