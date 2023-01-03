<?php include 'header.php'; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Yorum Detayı (<?php echo $order["comment_id"]; ?>)</h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action=""  enctype="multipart/form-data">
                
                      
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Müşteri adı</label>
                              <input type="text" class="form-control" value="<?php echo $order["comment_name"]; ?>"  name="comment_name">
                           </div>
                        </div>

                        <div class=" col-md-8">
                           <div class="form-group">
                              <label>Müşteri yorumu</label>
                              <input type="text" class="form-control" value="<?php echo $order["comment_content"]; ?>"  name="comment_content">
                           </div>
                        </div>
                     </div>
                        <hr>
                        
                        <div class="row">
       
                   <div class="col-md-12">
                 <label>Müşteri görseli</label><br>             
                 <input type="file" name="logo" id="preferenceLogo">
<hr>
              <?php if( $order["comment_image"] ):  ?>
          
                <div class="setting-block__image">
                      <img class="img-thumbnail" src="<?=$order["comment_image"]?>" style="height: 150px;">
                </div>
                <hr>
              <?php endif; 
              
              $id = $order["comment_id"];
              
              ?>

   
                   </div>
</div>
                           <button type="submit" class="btn btn-primary ">Yorumu güncelle</button>
                          <a href="<?=site_url("admin/yorum_detay/sil/$id")?>" class="btn btn-danger">Yorumu Sil</a>

                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php include 'footer.php'; ?>