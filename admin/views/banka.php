<?php include 'header.php'; ?>
    <div class="content-page rtl-page">

<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    
                    <a href="admin/banka_ekle"> 
                     <button type="button" class="btn btn-dark mt-2">
                         Banka hesabı ekle
                     </button>
                     </a>
<br>
<br>
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Banka Hesapları</h4>
                     </div>
                  </div>
                  <div class="card-body">

   <table class="table table-striped table-bordered">
      <thead>
         <tr>
            <th>Banka ID</th>
            <th>Görsel</th>
            <th>Banka</th>
            <th>IBAN</th>
            <th></th>
         </tr>
      </thead>
        <tbody>
          <?php 
          
          foreach( $orders as $order ): 
             
             $id = $order["id"];            

              ?>
              <tr>
                 <td><?php echo $id; ?></td>
                 <td class="text-center"><img class="rounded img-fluid avatar-40" src="<?=$order["bank_gorsel"]?>" alt="profile"></td>
                 <td><?php echo $order["bank_name"]; ?> </td>
                 <td><?php echo $order["bank_iban"]; ?> </td>
                 <td>
                     <a href="<?=site_url("admin/banka_detay/$id")?>"><button type="button" class="btn btn-dark"><i class="fas fa-edit"></i>Düzenle</button></a>
                 </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
   </table>
  
</div></div></div></div></div>


<?php include 'footer.php'; ?>
