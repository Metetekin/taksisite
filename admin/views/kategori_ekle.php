<?php include 'header.php'; $id = $category["category_id"]; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title"><i class="fas fa-plus-square"></i> Kategori Ekle</h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action=""  enctype="multipart/form-data">
                      
                           <div class="form-group">
                              <label>Kategori Adı</label>
                              <input type="text" class="form-control" name="category_name" required>
                           </div>
                                          
                           

<hr>

                               <button type="submit" class="btn btn-primary ">Kategori Ekle</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include 'footer.php'; ?>