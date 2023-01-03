<?php

  if( $user["access"]["gorunum"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;

    $orders         = $conn->prepare("SELECT * FROM team ");
    $orders         -> execute(array());
    $orders         = $orders->fetchAll(PDO::FETCH_ASSOC);
    
    if($_POST):
        
                
            foreach ($_POST as $key => $value) {
              $$key = $value;
            }

        if ( $_FILES["logo"] && ( $_FILES["logo"]["type"] == "image/jpeg" || $_FILES["logo"]["type"] == "image/jpg" || $_FILES["logo"]["type"] == "image/png" || $_FILES["logo"]["type"] == "application/pdf"  ) ):
            $logo_name      = $_FILES["logo"]["name"];
            $uzanti         = substr($logo_name,-4,4);
            $md5            = md5(time());
            $logo_newname   = "assets/cloud/uploads/$md5.jpg";
            $upload_logo    = move_uploaded_file($_FILES["logo"]["tmp_name"],$logo_newname);
          else:
            $logo_newname   = "-";
          endif;
          
            $insert = $conn->prepare("INSERT team SET team_name=:team_name, team_statu=:team_statu, team_image=:team_image ");
            $insert->execute(array("team_name"=>$team_name,"team_statu"=>$team_statu,"team_image"=>$logo_newname ));
            
            header("Location: ".site_url("admin/ekip"));
            
       elseif($_GET["delete"]):
            $delete = $conn->prepare("DELETE FROM team WHERE team_id=:id ");
            $delete->execute(array("id"=>$_GET["delete"]));
        
            header("Location: ".site_url("admin/ekip"));
    endif;    

  require admin_view('ekip');
  