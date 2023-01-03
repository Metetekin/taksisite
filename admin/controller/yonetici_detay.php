<?php

    if( $user["access"]["guvenlik"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;
    
    if( !route(2) && !is_numeric(route(2)) ):
        header("Location: ".site_url("admin/yonetici"));
        die;
    endif;

    $order = $conn->prepare("SELECT * FROM clients WHERE client_id=:id ");
    $order -> execute(array("id"=>route(2)));
    $order = $order->fetch(PDO::FETCH_ASSOC);
    $access = json_decode($order["access"],true);


if(!$order && route(2) != "sil" && !route(3) ):
        header("Location: ".site_url("admin/yonetici"));
        die;
endif;    

        if( $_POST ):
            
            $id = route(2);
            
            foreach ($_POST as $key => $value) {
              $$key = $value;
            }


        $admin      = $_POST["access"]["admin_access"];

          $update = $conn->prepare("UPDATE clients SET name=:name, username=:username, email=:email, access=:access WHERE client_id=:id ");
          $update = $update-> execute(array("name"=>$name,"username"=>$username,"email"=>$email,'access'=>json_encode($access),"id"=>$id ));
            
            if($pass):
              $update = $conn->prepare("UPDATE clients SET password=:password WHERE client_id=:id ");
              $update = $update-> execute(array("password"=>md5(sha1(md5($pass))),"id"=>$id ));
            endif;    
            
            header("Location: ".site_url("admin/yonetici_detay/$id"));
         elseif( !$_POST && route(2) == "sil" && route(3) ):
            
            $delete = $conn->prepare("DELETE FROM clients WHERE client_id=:id ");
            $delete->execute(array("id"=>route(3)));
        
            header("Location: ".site_url("admin/yonetici"));
            
        endif;
       

  require admin_view('yonetici_detay');
  