<?php include 'header.php'; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Yorum Ekle</h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action=""  enctype="multipart/form-data">
                
                      
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Müşteri adı</label>
                              <input type="text" class="form-control" name="comment_name">
                           </div>
                        </div>

                        <div class=" col-md-8">
                           <div class="form-group">
                              <label>Müşteri yorumu</label>
                              <input type="text" class="form-control" name="comment_content">
                           </div>
                        </div>
                     </div>
                        <hr>
                        
                        <div class="row">
       
                   <div class="col-md-12">
                 <label>Müşteri görseli</label><br>             
                 <input type="file" name="logo" id="preferenceLogo">
<hr>
   
                   </div>
</div>
                           <button type="submit" class="btn btn-primary ">Yorum ekle</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php include 'footer.php'; ?>