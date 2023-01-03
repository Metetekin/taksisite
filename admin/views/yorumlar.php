<?php include 'header.php'; ?>
    <div class="content-page rtl-page">

<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
     <a href="/admin/yorum_ekle" class="btn btn-dark mt-2" >
                     Yorum ekle
                     </a>
    
<br><br>
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Müşteri Yorumları</h4>
                     </div>
                  </div>
                  <div class="card-body">

   <table class="table table-striped table-bordered">
      <thead>
         <tr>
            <th>Yorum ID</th>
            <th>Görsel</th>
            <th>Müşteri</th>
            <th>Tarih</th>
            <th></th>
         </tr>
      </thead>
        <tbody>
          <?php 
          
          foreach( $orders as $order ): 
             
             $id = $order["comment_id"];            

              ?>
              <tr>
                 <td><?php echo $id; ?></td>
                                                                                     <td class="text-center"><img class="rounded img-fluid avatar-40" src="<?php if( $order["comment_image"] ): echo $order["comment_image"]; else: echo "admin/no-image.png"; endif;  ?>"  alt="profile"></td>

                 
                 <td><?php echo $order["comment_name"]; ?> </td>
                 <td><?php echo $order["comment_date"]; ?></td>
                 <td>
                     <a href="<?=site_url("admin/yorum_detay/$id")?>"><button type="button" class="btn btn-dark"><i class="fas fa-edit"></i>Düzenle</button></a>
                      <a href="<?=site_url("admin/yorum_detay/sil/$id")?>"><button type="button" class="btn btn-danger"><i class="fas fa-trash"></i>Sil</button></a>

                 </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
   </table>
  
</div></div></div></div></div>


<?php include 'footer.php'; ?>
