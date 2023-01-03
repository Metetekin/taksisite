<?php

  if( $user["access"]["mesajlar"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;

    $orders         = $conn->prepare("SELECT * FROM tickets ORDER BY ticket_date DESC");
    $orders         -> execute(array());
    $orders         = $orders->fetchAll(PDO::FETCH_ASSOC);
    
    if($_POST):
        
        $id = $_POST["ticket_id"];
        
        $ticket         = $conn->prepare("SELECT * FROM tickets WHERE ticket_id=:id");
        $ticket         -> execute(array("id"=>$id));
        $ticket         = $ticket->fetch(PDO::FETCH_ASSOC);
        
        $reply = $_POST["reply"];
        
        if($ticket):
                $update = $conn->prepare("UPDATE tickets SET reply_message=:reply WHERE ticket_id=:id ");
                $update->execute(array("id"=>$id,"reply"=>$reply ));
                
                $title = $ticket["ticket_subject"];
                
                sendMail(["subject"=>"$titlte Başlıklı mesajınız cevaplandı.","body"=>$reply,"mail"=>$ticket["customer_email"]]);
                
                header("Location: ".site_url("admin/mesajlar"));
                
        endif;    
        
    endif;    
    
    
    if($_GET["delete"]):
        
        
                    $delete = $conn->prepare("DELETE FROM tickets WHERE ticket_id=:id ");
            $delete->execute(array("id"=>$_GET["delete"] ) );

        
         header("Location: ".site_url("admin/mesajlar"));
    endif;    

  require admin_view('mesajlar');
  