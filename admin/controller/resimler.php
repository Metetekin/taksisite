<?php

  if( $user["access"]["galeri"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;

    $orders         = $conn->prepare("SELECT * FROM files WHERE file_type='2' ");
    $orders         -> execute(array());
    $orders         = $orders->fetchAll(PDO::FETCH_ASSOC);
    
    if($_POST):

        if ( $_FILES["logo"] && ( $_FILES["logo"]["type"] == "image/jpeg" || $_FILES["logo"]["type"] == "image/jpg" || $_FILES["logo"]["type"] == "image/png" || $_FILES["logo"]["type"] == "image/gif"  ) ):
            $logo_name      = $_FILES["logo"]["name"];
            $uzanti         = substr($logo_name,-4,4);
            $md5            = md5(time());
            $logo_newname   = "assets/cloud/uploads/".$md5.$uzanti;
            $upload_logo    = move_uploaded_file($_FILES["logo"]["tmp_name"],$logo_newname);
          else:
            $logo_newname   = "-";
          endif;


$file_name = $_POST["file_name"];
         
            $insert = $conn->prepare("INSERT files SET file_name=:file_name, file_url=:file_url, file_type=:file_type, file_date=:file_date ");
            $insert->execute(array("file_name"=>$file_name,"file_url"=>$logo_newname,"file_type"=>2,"file_date"=>date("Y.m.d H:i:s") ));
            
            header("Location: ".site_url("admin/resimler"));

          
   elseif($_GET["delete"]):

        $order         = $conn->prepare("SELECT * FROM files WHERE file_id=:id");
        $order         -> execute(array("id"=>$_GET["delete"]));
        $order         = $order->fetch(PDO::FETCH_ASSOC);
        unlink($order["file_url"]);
              
        $delete = $conn->prepare("DELETE FROM files WHERE file_id=:id ");
        $delete->execute(array("id"=>$_GET["delete"]));
        
        header("Location: ".site_url("admin/resimler"));
    endif;    

  require admin_view('resimler');
  