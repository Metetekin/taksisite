<?php include 'header.php'; ?>
    <div class="content-page rtl-page">

<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                <a href="/admin/soru_ekle"> 
                     <button type="button" class="btn btn-dark mt-2" >
                         Soru ekle
                     </button>
                     </a>
                     <br><br>
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Sıkça Sorulan Sorular</h4>
                     </div>
                  </div>
                  <div class="card-body">

   <table class="table table-striped table-bordered">
      <thead>
         <tr>
            <th>Soru ID</th>
            <th>Soru</th>
            <th>Son Güncelleme</th>
            <th></th>
         </tr>
      </thead>
        <tbody>
          <?php 
          
          foreach( $orders as $order ): 
             
             $id = $order["faq_id"];            

              ?>
              <tr>
                 <td><?php echo $id; ?></td>
                 <td><?php echo $order["faq_name"]; ?> </td>
                 <td><?php echo $order["faq_date"]; ?></td>
                 <td>
                     <a href="<?=site_url("admin/soru_detay/$id")?>"><button type="button" class="btn btn-dark"><i class="fas fa-edit"></i>Düzenle</button></a>
                                                           <a href="<?=site_url("admin/soru_detay/sil/$id")?>"><button type="button" class="btn btn-danger"><i class="fas fa-trash"></i>Sil</button></a>

                 </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
   </table>
  
</div></div></div></div></div>


<?php include 'footer.php'; ?>
