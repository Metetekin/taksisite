<?php

    if( $user["access"]["gorunum"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;
    
    if( !route(2) && !is_numeric(route(2)) ):
        header("Location: ".site_url("admin/sorular"));
        die;
    endif;

    $order = $conn->prepare("SELECT * FROM faqs WHERE faq_id=:id ");
    $order -> execute(array("id"=>route(2)));
    $order = $order->fetch(PDO::FETCH_ASSOC);

if(!$order && route(2) != "sil" && !route(3) ):
        header("Location: ".site_url("admin/sorular"));
        die;
endif;    

        if( $_POST ):
            
            $id = route(2);
            
            foreach ($_POST as $key => $value) {
              $$key = $value;
            }

            $update = $conn->prepare("UPDATE faqs SET faq_name=:faq_name, faq_content=:faq_content, faq_date=:faq_date WHERE faq_id=:id ");
            $update->execute(array("id"=>$id,"faq_name"=>$faq_name,"faq_content"=>$faq_content,"faq_date"=>date("Y-m-d H:i:s") ));
            
            header("Location: ".site_url("admin/soru_detay/$id"));
         elseif( !$_POST && route(2) == "sil" && route(3) ):
            
            $delete = $conn->prepare("DELETE FROM faqs WHERE faq_id=:id ");
            $delete->execute(array("id"=>route(3)));
        
            header("Location: ".site_url("admin/sorular"));
            
        endif;
       

  require admin_view('soru_detay');
  