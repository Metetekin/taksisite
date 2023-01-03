<?php include 'header.php'; ?>
    <div class="content-page rtl-page">

<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Yöneticiler</h4>
                     </div>
                  </div>
                  <div class="card-body">

   <table class="table table-striped table-bordered">
      <thead>
         <tr>
            <th>Yönetici ID</th>
            <th>Ad Soyad</th>
            <th>E-mail</th>
            <th>Son Giriş</th>
            <th></th>
         </tr>
      </thead>
        <tbody>
          <?php 
          
          foreach( $orders as $order ): 
             
             $id = $order["client_id"];            

              ?>
              <tr>
                 <td><?php echo $id; ?></td>
                 <td><?php echo $order["name"]; ?> </td>
                 <td><?php echo $order["email"]; ?></td>
                 <td><?php echo $order["login_date"]; ?></td>
                 <td>
                     <a href="<?=site_url("admin/yonetici_detay/$id")?>"><button type="button" class="btn btn-dark"><i class="fas fa-edit"></i>Düzenle</button></a>
                 </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
   </table>
  
</div></div></div></div></div>


<?php include 'footer.php'; ?>
