<?php

    if( $user["access"]["gorunum"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
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
            $logo_newname   = "assets/cloud/reference/$md5.jpg";
            $upload_logo    = move_uploaded_file($_FILES["logo"]["tmp_name"],$logo_newname);
          else:
            $logo_newname   = "";
          endif;

            $insert = $conn->prepare("INSERT INTO comments SET comment_name=:comment_name, comment_content=:comment_content, comment_image=:comment_image, comment_date=:date ");
            $insert->execute(array("comment_name"=>$comment_name,"comment_content"=>$comment_content,"comment_image"=>$logo_newname,"date"=>date("Y.m.d H:i:s")  ));
            
            if( $insert ){ 
                $id = $conn->lastInsertId(); 
                header("Location: ".site_url("admin/yorum_detay/$id"));
            }
            
        endif;
       

  require admin_view('yorum_ekle');
  