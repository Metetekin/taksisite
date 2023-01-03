<?php include 'header.php'; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title"><i class="fas fa-plus" aria-hidden="true"></i> Banka Hesabı Ekle</h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action=""  enctype="multipart/form-data">
                
                      
                     
          <div class="form-group">
            <label class="form-group">Banka adı</label>
            <input type="text" name="bank_name" class="form-control">
          </div>

          <div class="form-group">
            <label class="form-group">Alıcı adı</label>
            <input type="text" name="bank_alici" class="form-control">
          </div>

          <div class="form-group">
            <label class="form-group">Şube no</label>
            <input type="text" name="bank_sube" class="form-control">
          </div>

          <div class="form-group">
            <label class="form-group">Hesap no</label>
            <input type="text" name="bank_hesap" class="form-control">
          </div>

          <div class="form-group">
            <label class="form-group">IBAN</label>
            <input type="text" name="bank_iban" class="form-control">
          </div>


                        <hr>
                        
                        <div class="row">
       
                   <div class="col-md-12">
                 <label>Banka Görsel</label><br>             
                 <input type="file" name="logo" id="preferenceLogo">
<hr>
   
                   </div>
</div>
                           <button type="submit" class="btn btn-primary ">Banka hesabı ekle</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php include 'footer.php'; ?>