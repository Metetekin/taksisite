<?php

    if( $user["access"]["blog"] != 1  ):
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
            $logo_newname   = "assets/cloud/pages/$md5.png";
            $upload_logo    = move_uploaded_file($_FILES["logo"]["tmp_name"],$logo_newname);
          
          else:
            $logo_newname   = "";
          endif;
          
          $permalink = permalink($page_name);

            $insert = $conn->prepare("INSERT pages SET page_name=:page_name, page_keywords=:page_keywords, page_content=:page_content, page_description=:page_description, page_image=:page_image, page_get=:page_get, page_type=:type, page_date=:date ");
            $insert->execute(array("page_name"=>$page_name,"page_keywords"=>$page_keywords,"page_content"=>$page_content,"page_description"=>$page_description,"page_image"=>$logo_newname,"page_get"=>$permalink,"type"=>3,"date"=>date("Y.m.d H:i:s") ));
            
                        
            if( $insert ){ 
                $id = $conn->lastInsertId(); 
                header("Location: ".site_url("admin/blog_detay/$id"));
            }

        endif;
       

  require admin_view('blog_ekle');