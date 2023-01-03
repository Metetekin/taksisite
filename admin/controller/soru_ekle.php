<?php

    if( $user["access"]["gorunum"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;

        if( $_POST ):
            

            foreach ($_POST as $key => $value) {
              $$key = $value;
            }

            $insert = $conn->prepare("INSERT INTO faqs SET faq_name=:faq_name, faq_content=:faq_content, faq_date=:faq_date ");
            $insert->execute(array("faq_name"=>$faq_name,"faq_content"=>$faq_content,"faq_date"=>date("Y-m-d H:i:s") ));
            
                 
            if( $insert ){ 
                $id = $conn->lastInsertId(); 
                header("Location: ".site_url("admin/soru_detay/$id"));
            }
            
        endif;
       

  require admin_view('soru_ekle');
  