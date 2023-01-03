<?php include 'header.php'; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title"><i class="fa fa-bell" aria-hidden="true"></i> Bildirim Ayarları</h4>
                  </div>
               </div>
               <div class="card-body">

             <form action="" method="post" enctype="multipart/form-data">

        <div class="row">
          <div class="col-md-6 form-group">
            <label class="control-label">Yeni sipariş bildirimi</label>
            <select class="form-control" name="alert_newmanuelservice">
              <option value="2" <?= $settings["alert_newmanuelservice"] == 2 ? "selected" : null; ?> >Aktif</option>
              <option value="1" <?= $settings["alert_newmanuelservice"] == 1 ? "selected" : null; ?>>Pasif</option>
            </select>
          </div>

          <div class="col-md-6 form-group">
            <label class="control-label">Yeni iletişim formu bildirimi</label>
            <select class="form-control" name="alert_newticket">
              <option value="2" <?= $settings["alert_newticket"] == 2 ? "selected" : null; ?> >Aktif</option>
              <option value="1" <?= $settings["alert_newticket"] == 1 ? "selected" : null; ?>>Pasif</option>
            </select>
          </div>
         
        </div>
        <hr>
        <div class="row">
          <div class="col-md-4 form-group">
            <label class="control-label">Bildirim Şekli</label>
            <select class="form-control" name="alert_type">
              <option value="3" <?= $settings["alert_type"] == 3 ? "selected" : null; ?> >Mail ve SMS</option>
              <option value="2" <?= $settings["alert_type"] == 2 ? "selected" : null; ?>>Mail</option>
              <option value="1" <?= $settings["alert_type"] == 1 ? "selected" : null; ?>>SMS</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label class="control-label">Yönetici e-mail</label>
            <input type="text" class="form-control" name="admin_mail" value="<?=$settings["admin_mail"]?>">
          </div>
          <div class="form-group col-md-4">
            <label class="control-label">Yönetici telefonu numarası</label>
            <input type="text" class="form-control" name="admin_telephone" value="<?=$settings["admin_telephone"]?>">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-3 form-group">
            <label class="control-label">SMS Sağlayıcı</label>
            <select class="form-control" name="sms_provider">
              <option value="bizimsms" <?= $settings["sms_provider"] == "bizimsms" ? "selected" : null; ?> >Bizimsms</option>
              <option value="netgsm" <?= $settings["sms_provider"] == "netgsm" ? "selected" : null; ?> >NetGSM</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">SMS Başlığı</label>
            <input type="text" class="form-control" name="sms_title" value="<?=$settings["sms_title"]?>">
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Kullanıcı adı</label>
            <input type="text" class="form-control" name="sms_user" value="<?=$settings["sms_user"]?>">
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Kullanıcı parola</label>
            <input type="text" class="form-control" name="sms_pass" value="<?=$settings["sms_pass"]?>">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="form-group col-md-4">
            <label class="control-label">E-Posta</label>
            <input type="text" class="form-control" name="smtp_user" value="<?=$settings["smtp_user"]?>">
          </div>
          <div class="form-group col-md-4">
            <label class="control-label">E-Posta Şifre</label>
            <input type="text" class="form-control" name="smtp_pass" value="<?=$settings["smtp_pass"]?>">
          </div>
          <div class="form-group col-md-4">
            <label class="control-label">SMTP Server</label>
            <input type="text" class="form-control" name="smtp_server" value="<?=$settings["smtp_server"]?>">
          </div>

          
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