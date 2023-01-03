<?php

    if( $user["access"]["siparisler"] != 1  ):
        header("Location:".site_url("admin"));
        exit();
    endif;
    
    if( !route(2) && !is_numeric(route(2)) ):
        header("Location: ".site_url("admin/siparisler"));
        die;
    endif;

    $order = $conn->prepare("SELECT * FROM orders LEFT JOIN products ON products.product_id=orders.order_product LEFT JOIN payment_methods ON payment_methods.id=orders.payment_method WHERE orders.payment_privatecode=:id && orders.payment_status=:status ");
    $order -> execute(array("id"=>route(2), "status"=>2));
    $order = $order->fetch(PDO::FETCH_ASSOC);

if(!$order && route(2) != "bildir" && !route(3) ):
        header("Location: ".site_url("admin/siparisler"));
        die;
endif;    

    $customer = json_decode($order["order_customer"], true);
   echo route(4);
   
        if( $_POST ):
            
            $id = route(2);
            
            foreach ($_POST as $key => $value) {
              $$key = $value;
            }

            $json = array("ad_soyad"=>$ad_soyad, "telefon"=>$telefon, "email"=>$email, "adres"=>$adres);

            $json = json_encode($json);

            $update = $conn->prepare("UPDATE orders SET order_customer=:order_customer, order_status=:order_status, cargo_company=:cargo_company, cargo_no=:cargo_no, order_note=:order_note WHERE payment_privatecode=:id ");
            $update->execute(array("id"=>$id,"order_customer"=>$json,"order_status"=>$order_status,"cargo_company"=>$cargo_company,"cargo_no"=>$cargo_no,"order_note"=>$order_note ));
            
            header("Location: ".site_url("admin/siparis_detay/$id"));
            
        elseif( !$_POST && route(2) == "bildir" && route(3) ):
            
            $order = $conn->prepare("SELECT * FROM orders LEFT JOIN products ON products.products_id=orders.order_product LEFT JOIN payment_methods ON payment_methods.id=orders.payment_method WHERE orders.payment_privatecode=:id && orders.payment_status=:status ");
            $order -> execute(array("id"=>route(3), "status"=>2));
            $order = $order->fetch(PDO::FETCH_ASSOC);
                    
            $customer = json_decode($order["order_customer"], true);
                    
            if( $settings["alert_type"] == 3 ):   $sendmail = 1; $sendsms  = 1; elseif( $settings["alert_type"] == 2 ): $sendmail = 1; $sendsms=0; elseif( $settings["alert_type"] == 1 ): $sendmail=0; $sendsms  = 1; endif;
            
            $takip = $order["cargo_no"];
            $id = route(3);

            
            if( $sendsms ):
              SMSUser($customer["telefon"],"$id Nolu siparişiniz kargoya verilmiştir. Takip no: $takip");
            endif;
            
            if( $sendmail ):
              sendMail(["subject"=>"Siparişiniz kargoya verildi.","body"=>"$id Nolu siparişiniz kargoya verilmiştir. Takip no: $takip.","mail"=>$customer["email"]]);
            endif;
            
            header("Location: ".site_url("admin/siparis_detay/$id"));

            
        endif;
       

  require admin_view('siparis_detay');
  