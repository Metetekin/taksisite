<?php include 'header.php'; ?>

 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title"><i class="fas fa-swatchbook" aria-hidden="true"></i> Hizmet Detayı <small>(<?php echo $order["page_id"]; ?>)</small></h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action=""  enctype="multipart/form-data">
                
                      
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Hizmet Adı</label>
                              <input type="text" class="form-control" value="<?php echo $order["page_name"]; ?>" name="page_name">
                           </div>
                        </div>
          
                        <div class=" col-md-4 ">
                           <div class="form-group">
                              <label>Meta Keywords</label>
                              <input type="text" class="form-control" value="<?php echo $order["page_keywords"]; ?>" name="page_keywords">
                           </div>
                        </div>
                        <div class="col-md-4 ">
                          <div class="form-group">
                              <label>Hizmet URL</label>
                              <input type="text" class="form-control" value="<?php echo $order["page_get"]; ?>" disabled>
                           </div>
                        </div>
                     </div>
                                                <div class="form-group">
                              <label>Meta Açıklama</label>

                                           <textarea name="page_description" class="form-control"><?php echo $order["page_description"]; ?></textarea>
</div>

                        <hr>
                        
                        <div class="row">
                        <div class="col-md-8">
  
           <div class="form-group">
                      <label>Hizmet Açıklama</label>
                      <textarea name="page_content" id="summernote"><?php echo $order["page_content"]; ?></textarea>
                   </div>
                   </div>
                   <div class="col-md-4">
                 <label>Hizmet Görseli</label><br>             
                 <input type="file" name="logo" id="preferenceLogo">
<hr>
              <?php if( $order["page_image"] ):  ?>
          
                <div class="setting-block__image">
                      <img class="img-thumbnail" src="<?=$order["page_image"]?>" style="height: 150px;">
                </div>
              <?php endif; 
              
              $id = $order["page_id"];
              
              ?>
      

   
                   </div>
</div>
                           <button type="submit" class="btn btn-primary ">Hizmeti Güncelle</button>
                           <a href="<?=site_url("admin/hizmet_detay/sil/$id")?>" class="btn btn-danger">Hizmeti Sil</a>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

 <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
        ]
      });
    </script>

<?php include 'footer.php'; ?>