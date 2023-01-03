<?php include 'header.php'; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title"><i class="fas fa-box" aria-hidden="true"></i> Ürün Detayı <small>(<?php echo $order["reference_id"]; ?>)</small></h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action=""  enctype="multipart/form-data">
                
                      
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Referans Adı</label>
                              <input type="text" class="form-control" value="<?php echo $order["reference_name"]; ?>" name="reference_name">
                           </div>
                        </div>

                        <div class=" col-md-8">
                           <div class="form-group">
                              <label>Referans Linki</label>
                              <input type="text" class="form-control" value="<?php echo $order["reference_url"]; ?>" name="reference_url">
                           </div>
                        </div>
                     </div>
                        <hr>
                        
                        <div class="row">
       
                   <div class="col-md-12">
                 <label>Referans Görsel</label><br>             
                 <input type="file" name="logo" id="preferenceLogo">
<hr>
              <?php if( $order["reference_image"] ):  ?>
          
                <div class="setting-block__image">
                      <img class="img-thumbnail" src="<?=$order["reference_image"]?>" style="height: 150px;">
                </div>
                <hr>
              <?php endif; 
              
              $id = $order["reference_id"];
              
              ?>
      

   
                   </div>
</div>
                           <button type="submit" class="btn btn-primary ">Referansı Güncelle</button>
                           <a href="<?=site_url("admin/referans_detay/sil/$id")?>" class="btn btn-danger">Referansı Sil</a>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php include 'footer.php'; ?>