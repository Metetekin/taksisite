<?php

  if( $user["access"]["guvenlik"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;


if( route(2) && is_numeric(route(2)) ):
  $page = route(2);
else:
  $page = 1;
endif;


  $count          = $conn->prepare("SELECT * FROM client_report INNER JOIN clients ON clients.client_id=client_report.client_id ");
  $count        ->execute(array());
  $count          = $count->rowCount();
  $search         = "";

  $to             = 50;
  $pageCount      = ceil($count/$to); if( $page > $pageCount ): $page = 1; endif;
  $where          = ($page*$to)-$to;
  $paginationArr  = ["count"=>$pageCount,"current"=>$page,"next"=>$page+1,"previous"=>$page-1];
  $logs = $conn->prepare("SELECT * FROM client_report INNER JOIN clients ON clients.client_id=client_report.client_id $search ORDER BY client_report.id DESC LIMIT $where,$to ");
  $logs->execute(array());
  $logs = $logs->fetchAll(PDO::FETCH_ASSOC);

  if( route(2) == "delete" ):
    $id     = route(3);
    $delete = $conn->prepare("DELETE FROM client_report WHERE id=:id ");
    $delete->execute(array("id"=>$id));
    header("Location:".site_url("admin/logs"));
  endif;

require admin_view('logs');
