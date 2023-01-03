<?php include 'header.php'; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title"><i class="fas fa-cog" aria-hidden="true"></i> SEO Ayarları</h4>
                  </div>
               </div>
               <div class="card-body">

                 <form action="" method="post" enctype="multipart/form-data">

 
   <div class="form-group">
          <label for="" class="control-label">Site Title </label>
          <input type="text" class="form-control" name="site_title" value="<?=$settings["site_title"]?>">
        </div>
  
        <div class="form-group">
          <label for="" class="control-label">Anahtar Kelimeler</label>
          <input type="text" class="form-control" name="site_keywords" value="<?=$settings["site_keywords"]?>">
        </div>
      <div class="form-group">
          <label for="" class="control-label">Site Açıklama</label>
          <textarea class="form-control" name="site_description"><?=$settings["site_description"]?></textarea>
        </div>
        <hr>
      
            <div class="form-group">
              <label for="" class="control-label">Meta Kod Alanı</label>
                    <textarea class="form-control" name="custom_meta" placeholder='<meta ... >'><?=$settings["custom_meta"]?></textarea>

          
        </div>
      <hr>

        <button type="submit" class="btn btn-primary">Ayarları Güncelle</button>
      </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include 'footer.php'; ?>