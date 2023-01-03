<?php include 'header.php'; $id = $category["category_id"]; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title"><i class="fas fa-box" aria-hidden="true"></i> Kategori Detayı <small>(<?php echo $category["category_id"]; ?>)</small></h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action=""  enctype="multipart/form-data">
                      
                           <div class="form-group">
                              <label>Kategori Adı</label>
                              <input type="text" class="form-control" value="<?php echo $category["category_name"]; ?>" name="category_name">
                           </div>
                                              <div class="form-group">
                              <label>Permalink</label>
                              <input type="text" class="form-control" value="<?php echo $category["category_url"]; ?>" disabled>
                           </div>
                           

<hr>

                               <button type="submit" class="btn btn-primary ">Kategoriyi Güncelle</button>
                           <a href="<?=site_url("admin/kategori_detay/sil/$id")?>" class="btn btn-danger">Kategoriyi Sil</a>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include 'footer.php'; ?>