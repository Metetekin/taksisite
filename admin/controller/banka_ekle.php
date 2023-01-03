<?php

    if( $user["access"]["gorunum"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;

        if( $_POST ):

            foreach ($_POST as $key => $value) {
              $$key = $value;
            }

        if ( $_FILES["logo"] && ( $_FILES["logo"]["type"] == "image/jpeg" || $_FILES["logo"]["type"] == "image/jpg" || $_FILES["logo"]["type"] == "image/png" || $_FILES["logo"]["type"] == "image/gif"  ) ):
            $logo_name      = $_FILES["logo"]["name"];
            $uzanti         = substr($logo_name,-4,4);
            $md5            = md5(time());
            $logo_newname   = "assets/cloud/uploads/$md5.jpg";
            $upload_logo    = move_uploaded_file($_FILES["logo"]["tmp_name"],$logo_newname);
          else:
            $logo_newname   = "";
          endif;

            $insert = $conn->prepare("INSERT INTO bank_accounts SET bank_gorsel=:gorsel, bank_name=:name, bank_sube=:sube, bank_hesap=:hesap, bank_iban=:iban, bank_alici=:alici ");
            $insert = $insert->execute(array("gorsel"=>$logo_newname,"name"=>$bank_name,"sube"=>$bank_sube,"hesap"=>$bank_hesap,"iban"=>$bank_iban,"alici"=>$bank_alici ));
            
            header("Location: ".site_url("admin/banka_detay/$id"));
        endif;
       

  require admin_view('banka_ekle');
  