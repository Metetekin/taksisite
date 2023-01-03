<?php include 'header.php'; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Slider Detayı (<?php echo $order["slider_id"]; ?>)</h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action=""  enctype="multipart/form-data">
                
                      
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Slider başlık</label>
                              <input type="text" class="form-control" name="slider_name" value="<?php echo $order["slider_name"]; ?>" required>
                           </div>
                        </div>

                        <div class=" col-md-8">
                           <div class="form-group">
                              <label>Slider içeriği</label>
                              <input type="text" class="form-control" name="slider_content" value="<?php echo $order["slider_content"]; ?>" required>
                           </div>
                        </div>
                     </div>
                     
                           <div class="row">
                               
                        <div class="col-md-2">
                                         <div class="form-group">
                              <label>Slider sıralama</label>
                                  <input type="text" class="form-control" name="slider_sid" value="<?php echo $order["slider_sid"]; ?>" required>
                           </div>
                        </div>       
                               
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Slider buton yazısı</label>
                              <input type="text" class="form-control" name="slider_button" value="<?php echo $order["slider_button"]; ?>" required>
                           </div>
                        </div>

                        <div class=" col-md-6">
                           <div class="form-group">
                              <label>Slider buton linki</label>
                              <input type="text" class="form-control" value="<?php echo $order["slider_url"]; ?>"  name="slider_url">
                           </div>
                        </div>
                     </div>
                     
                        <hr>
                        
                        <div class="row">
       
                   <div class="col-md-6">
                 <label>Slider arkaplan</label><br>             
                 <input type="file" name="logo" id="preferenceLogo" >
                 <hr>
              <?php if( $order["slider_bg"] ):  ?>
          
                <div class="setting-block__image">
                      <img class="img-thumbnail" src="<?=$order["slider_bg"]?>" style="height: 150px;">
                </div>
                <hr>
              <?php endif; ?>


   
                   </div>

            <div class="col-md-6">
                 <label>Slider görsel</label><br>             
                 <input type="file" name="logo2" id="preferenceLogo">
                 
                 <hr>
              <?php if( $order["slider_image"] ):  ?>
          
                <div class="setting-block__image">
                      <img class="img-thumbnail" src="<?=$order["slider_image"]?>" style="height: 150px;">
                </div>
                <hr>
              <?php endif; 
              
              $id = $order["slider_id"];
              
              ?>

                   </div>
</div>
                           <button type="submit" class="btn btn-primary ">Slideri güncelle</button>
                           <a href="<?=site_url("admin/slider_detay/sil/$id")?>" class="btn btn-danger">Slideri Sil</a>

                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php include 'footer.php'; ?>