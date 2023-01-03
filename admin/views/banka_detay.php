<?php include 'header.php'; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title"><i class="fas  fa-university" aria-hidden="true"></i> Banka Detayı <small>(<?php echo $order["id"]; ?>)</small></h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action=""  enctype="multipart/form-data">
                
                      
                     
          <div class="form-group">
            <label class="form-group">Banka adı</label>
            <input type="text" name="bank_name" class="form-control" value="<?php echo $order["bank_name"]; ?>">
          </div>

          <div class="form-group">
            <label class="form-group">Alıcı adı</label>
            <input type="text" name="bank_alici" class="form-control" value="<?php echo $order["bank_alici"]; ?>">
          </div>

          <div class="form-group">
            <label class="form-group">Şube no</label>
            <input type="text" name="bank_sube" class="form-control" value="<?php echo $order["bank_sube"]; ?>">
          </div>

          <div class="form-group">
            <label class="form-group">Hesap no</label>
            <input type="text" name="bank_hesap" class="form-control" value="<?php echo $order["bank_hesap"]; ?>">
          </div>

          <div class="form-group">
            <label class="form-group">IBAN</label>
            <input type="text" name="bank_iban" class="form-control" value="<?php echo $order["bank_iban"]; ?>">
          </div>


                        <hr>
                        
                        <div class="row">
       
                   <div class="col-md-12">
                 <label>Banka Görsel</label><br>             
                 <input type="file" name="logo" id="preferenceLogo">
<hr>
              <?php if( $order["bank_gorsel"] ):  ?>
          
                <div class="setting-block__image">
                      <img class="img-thumbnail" src="<?=$order["bank_gorsel"]?>" style="height: 150px;">
                </div>
                <hr>
              <?php endif; 
              
              $id = $order["id"];
              
              ?>
      

   
                   </div>
</div>
                           <button type="submit" class="btn btn-primary ">Banka hesabını Güncelle</button>
                           <a href="<?=site_url("admin/banka_detay/sil/$id")?>" class="btn btn-danger">Banka hesabını Sil</a>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php include 'footer.php'; ?>