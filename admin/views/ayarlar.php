<?php include 'header.php'; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title"><i class="fas fa-cog" aria-hidden="true"></i> Genel Ayarlar</h4>
                  </div>
               </div>
               <div class="card-body">

                 <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <div class="row">
            <div class="col-md-10">
              <label for="preferenceLogo" class="control-label">Site Logo</label>
              <input type="file" name="logo" id="preferenceLogo">
            </div>
            <div class="col-md-2">
              <?php if( $settings["site_logo"] ):  ?>
                <div class="setting-block__image">
                      <img class="img-thumbnail" src="<?=$settings["site_logo"]?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-11">
              <label for="preferenceFavicon" class="control-label">Site Favicon</label>
              <input type="file" name="favicon" id="preferenceFavicon">
            </div>
            <div class="col-md-1">
              <?php if( $settings["favicon"] ):  ?>
                <div class="setting-block__image">
                    <img class="img-thumbnail" src="<?=$settings["favicon"]?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
          <hr>
 <div class="row">
     
     
 
 <div class="col-md-6 form-group">
          <label class="control-label">Panel Modu</label>
          <select class="form-control" name="site_maintenance">
            <option value="2" <?= $settings["site_maintenance"] == 2 ? "selected" : null; ?> >Manuel</option>
            <option value="1" <?= $settings["site_maintenance"] == 1 ? "selected" : null; ?>>Otomatik</option>
          </select>
        </div>
        
         <div class="col-md-6 form-group">
          <label class="control-label">Para Birimi</label>
              <select class="form-control" name="site_currency">
            <option value="TRY" <?= $settings["site_currency"] == "TRY" ? "selected" : null; ?>>Türk Lirası (TRY)</option>
            <option value="USD" <?= $settings["site_currency"] == "USD" ? "selected" : null; ?> >Dolar (USD)</option>
            <option value="EUR" <?= $settings["site_currency"] == "EUR" ? "selected" : null; ?> >Euro (EUR)</option>
          </select>
        </div>

        
 </div>
   <div class="form-group">
          <label for="" class="control-label">Copyright Yazısı </label>
          <input type="text" class="form-control" name="name" value="<?=$settings["site_name"]?>">
        </div>
 <hr>
        <div class="form-group">
          <label class="control-label">Robot kontrol <small>(Recaptcha)</small> </label>
          <select class="form-control" name="recaptcha">
            <option value="2" <?= $settings["recaptcha"] == 2 ? "selected" : null; ?> >Aktif</option>
            <option value="1" <?= $settings["recaptcha"] == 1 ? "selected" : null; ?>>Pasif</option>
          </select>
        </div>
        <div class="form-group">
          <label for="" class="control-label">Recaptcha site key</label>
          <input type="text" class="form-control" name="recaptcha_key" value="<?=$settings["recaptcha_key"]?>">
        </div>
        <div class="form-group">
          <label for="" class="control-label">Recaptcha secret key</label>
          <input type="text" class="form-control" name="recaptcha_secret" value="<?=$settings["recaptcha_secret"]?>">
        </div>
        <hr>
        <div class="row">
          <div class="col-md-6 form-group">
            <label for="" class="control-label">Mail Adresi</label>
            <input type="text" class="form-control" name="site_mail" value="<?=$settings["site_mail"]?>">
          </div>
          <div class="col-md-6 form-group">
            <label for="" class="control-label">Telefon Numarası</label>
            <input type="text" class="form-control" name="site_telephone" value="<?=$settings["site_telephone"]?>">
          </div>
        </div>
  
        <div class="row">
          <div class="col-md-6 form-group">
            <label for="" class="control-label">Firma Adres</label>
            <input type="text" class="form-control" name="site_address" value="<?=$settings["site_address"]?>">
          </div>
          <div class="col-md-6 form-group">
            <label for="" class="control-label">Google Maps Linki</label>
            <input type="text" class="form-control" name="site_maps" value="<?=$settings["site_maps"]?>">
          </div>
        </div>
<hr>


         
        <div class="row">
          <div class="col-md-3 form-group">
            <label for="" class="control-label">Instagram URL</label>
            <input type="text" class="form-control" name="instagram" value="<?=$settings["instagram"]?>">
          </div>
          <div class="col-md-3 form-group">
            <label for="" class="control-label">Facebook URL</label>
            <input type="text" class="form-control" name="facebook" value="<?=$settings["facebook"]?>">
          </div>
                 <div class="col-md-3 form-group">
            <label for="" class="control-label">Twitter URL</label>
            <input type="text" class="form-control" name="twitter" value="<?=$settings["twitter"]?>">
          </div>
                 <div class="col-md-3 form-group">
            <label for="" class="control-label">Linkedin URL</label>
            <input type="text" class="form-control" name="linkedin" value="<?=$settings["linkedin"]?>">
          </div>
        </div>
        <hr />
        <div class="form-group">
          <label class="control-label">Header kodları</label>
          <textarea class="form-control" name="custom_header" placeholder='<style type="text/css">...</style>'><?=$settings["custom_header"]?></textarea>
        </div>
        <div class="form-group">
          <label>Footer kodları</label>
          <textarea class="form-control" name="custom_footer" placeholder='<script>...</script>'><?=$settings["custom_footer"]?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Ayarları Güncelle</button>
      </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include 'footer.php'; ?>