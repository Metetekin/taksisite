<?php include 'header.php'; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Yönetici detayı</h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action=""  >
                
                      
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Ad Soyad</label>
                                  <input type="text" class="form-control" name="name" value="<?php echo $order["name"]?>" required>
                           </div>
                        </div>

                        <div class=" col-md-4">
                           <div class="form-group">
                              <label>E-mail Adresi</label>
                              <input type="email" class="form-control" name="email"  value="<?php echo $order["email"]?>" required>
                           </div>
                        </div>
                           <div class=" col-md-4">
                           <div class="form-group">
                              <label>Kullanıcı Adı</label>
                              <input type="text" class="form-control" name="username"  value="<?php echo $order["username"]?>" required>
                           </div>
                        </div>
                     </div>
                        <hr>
                        <div class="form-group">
                              <label>Şifre <small>[Değiştirmek istemiyorsanız boş bırakın]</small></label>
                              <input type="password" class="form-control" name="pass"  value="<?php echo $order["pass"]?>" autocomplete="off">
                           </div> 
                         
                           
                       <hr>
                       
            <div class="form-group">
            <label>Yönetici Yetkileri</label>
              <div class="form-group col-md-12">
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[siparisler]" <?php if( $access["siparisler"] == 1 ): echo 'checked'; endif; ?> value="1"> Siparişler
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[urunler]" <?php if( $access["urunler"] == 1 ): echo 'checked'; endif; ?> value="1"> Ürünler
                  </label>
                           <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[kategoriler]" <?php if( $access["kategoriler"] == 1 ): echo 'checked'; endif; ?> value="1"> Kategoriler
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[referanslar]" <?php if( $access["referanslar"] == 1 ): echo 'checked'; endif; ?> value="1"> Referanslar
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[hizmetler]" <?php if( $access["hizmetler"] == 1 ): echo 'checked'; endif; ?> value="1"> Hizmetler
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[blog]" <?php if( $access["blog"] == 1 ): echo 'checked'; endif; ?> value="1"> Blog
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[sayfalar]" <?php if( $access["sayfalar"] == 1 ): echo 'checked'; endif; ?> value="1"> Sayfalar
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[mesajlar]" <?php if( $access["mesajlar"] == 1 ): echo 'checked'; endif; ?> value="1"> Mesajlar
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[galeri]" <?php if( $access["galeri"] == 1 ): echo 'checked'; endif; ?> value="1"> Galeri
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[gorunum]" <?php if( $access["gorunum"] == 1 ): echo 'checked'; endif; ?> value="1"> Görünüm
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[ayarlar]" <?php if( $access["ayarlar"] == 1 ): echo 'checked'; endif; ?> value="1"> Ayarlar
                  </label>
                  <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[guvenlik]" <?php if( $access["guvenlik"] == 1 ): echo 'checked'; endif; ?> value="1"> Güvenlik
                  </label>
                         <label class="checkbox-inline col-md-2">
                    <input type="checkbox" class="access" name="access[admin_access]" checked value="1" hidden> 
                  </label>
                  
              </div>
            </div>
             <hr>
                           <button type="submit" class="btn btn-primary ">Yöneticiyi güncelle</button>
                           <?php $id = $order["client_id"] ?>
                                                      <a href="<?=site_url("admin/yonetici_detay/sil/$id")?>" class="btn btn-danger">Yöneticiyi Sil</a>

                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php include 'footer.php'; ?>