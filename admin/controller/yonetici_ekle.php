<?php

    if( $user["access"]["guvenlik"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;

        if( $_POST ):
            
            $id = route(2);
            
            foreach ($_POST as $key => $value) {
              $$key = $value;
            }

        $admin      = $_POST["access"]["admin_access"];

          $insert = $conn->prepare("INSERT INTO clients SET name=:name, username=:username, email=:email, password=:pass, login_date=:date, access=:access ");
          $insert = $insert-> execute(array("name"=>$name,"username"=>$username,"email"=>$email,"pass"=>md5(sha1(md5($pass))),"date"=>date("Y.m.d H:i:s"),'access'=>json_encode($access) ));
            
            if( $insert ){ 
                $id = $conn->lastInsertId(); 
                header("Location: ".site_url("admin/yonetici_detay/$id"));
            }
            
        endif;
       

  require admin_view('yonetici_ekle');
  