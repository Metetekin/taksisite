<?php include 'header.php'; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Yönetici Ekle</h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action=""  >
                
                      
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Ad Soyad</label>
                              <input type="text" class="form-control" name="name" required>
                           </div>
                        </div>

                        <div class=" col-md-4">
                           <div class="form-group">
                              <label>E-mail Adresi</label>
                              <input type="email" class="form-control" name="email" required>
                           </div>
                        </div>
                           <div class=" col-md-4">
                           <div class="form-group">
                              <label>Kullanıcı Adı</label>
                              <input type="text" class="form-control" name="username" required>
                           </div>
                        </div>
                     </div>
                        <hr>
                        <div class="form-group">
                              <label>Şifre</label>
                              <input type="password" class="form-control" name="pass" required>
                           </div> 
                         
                           
                       <hr>
                       
            <div class="form-group">
            <label>Yönetici Yetkileri</label>
              <div class="form-group col-md-12">
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[siparisler]" checked value="1"> Siparişler
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[urunler]" checked value="1"> Ürünler
                  </label>
                             <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[kategoriler]" checked value="1"> Kategoriler
                  </label>
                  
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[referanslar]" checked value="1"> Referanslar
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[hizmetler]" checked value="1"> Hizmetler
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[blog]" checked value="1"> Blog
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[sayfalar]" checked value="1"> Sayfalar
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[mesajlar]" checked value="1"> Mesajlar
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[galeri]" checked value="1"> Galeri
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[gorunum]" checked value="1"> Görünüm
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[ayarlar]" checked value="1"> Ayarlar
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[guvenlik]" checked value="1"> Güvenlik
                  </label>
                          <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[admin_access]" checked value="1" hidden> 
                  </label>
                  
              </div>
            </div>
             <hr>
                           <button type="submit" class="btn btn-primary ">Yönetici ekle</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php include 'footer.php'; ?>