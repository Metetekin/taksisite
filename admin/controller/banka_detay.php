<?php

    if( $user["access"]["gorunum"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;
    
    if( !route(2) && !is_numeric(route(2)) ):
        header("Location: ".site_url("admin/banka"));
        die;
    endif;

    $order = $conn->prepare("SELECT * FROM bank_accounts WHERE id=:id ");
    $order -> execute(array("id"=>route(2)));
    $order = $order->fetch(PDO::FETCH_ASSOC);

if(!$order && route(2) != "sil" && !route(3) ):
        header("Location: ".site_url("admin/banka"));
        die;
endif;    

        if( $_POST ):
            
            $id = route(2);
            
            foreach ($_POST as $key => $value) {
              $$key = $value;
            }

        if ( $_FILES["logo"] && ( $_FILES["logo"]["type"] == "image/jpeg" || $_FILES["logo"]["type"] == "image/jpg" || $_FILES["logo"]["type"] == "image/png" || $_FILES["logo"]["type"] == "image/gif"  ) ):
            $logo_name      = $_FILES["logo"]["name"];
            $uzanti         = substr($logo_name,-4,4);
            $md5            = md5(time());
            $logo_newname   = "assets/cloud/uploads/$md5.jpg";
            $upload_logo    = move_uploaded_file($_FILES["logo"]["tmp_name"],$logo_newname);
          elseif( $order["bank_gorsel"] != "" ):
            $logo_newname   = $order["bank_gorsel"];
          else:
            $logo_newname   = "";
          endif;

            $update = $conn->prepare("UPDATE bank_accounts SET bank_gorsel=:gorsel, bank_name=:name, bank_sube=:sube, bank_hesap=:hesap, bank_iban=:iban, bank_alici=:alici WHERE id=:id ");
            $update = $update->execute(array("gorsel"=>$logo_newname,"name"=>$bank_name,"sube"=>$bank_sube,"hesap"=>$bank_hesap,"iban"=>$bank_iban,"alici"=>$bank_alici,"id"=>$id ));
            
            header("Location: ".site_url("admin/banka_detay/$id"));
         elseif( !$_POST && route(2) == "sil" && route(3) ):
            
            $delete = $conn->prepare("DELETE FROM bank_accounts WHERE id=:id ");
            $delete->execute(array("id"=>route(3)));
        
            header("Location: ".site_url("admin/banka"));
            
        endif;
       

  require admin_view('banka_detay');
  