<?php include 'header.php'; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">            

        
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Sipariş Detayı <small>(<?php echo $order["payment_privatecode"]; ?>)</small></h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action="">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Ad Soyad</label>
                              <input type="text" class="form-control" value="<?php echo $customer["ad_soyad"]; ?>" name="ad_soyad">
                           </div>
                        </div>
                        <div class="col-md-4 ">
                           <div class="form-group">
                              <label>Telefon Numarası</label>
                              <input type="text" class="form-control" value="<?php echo $customer["telefon"]; ?>" name="telefon">
                           </div>
                        </div>
                        <div class=" col-md-4 ">
                           <div class="form-group">
                              <label>E-mail</label>
                              <input type="text" class="form-control" value="<?php echo $customer["email"]; ?>" name="email">
                           </div>
                        </div>
                     </div>

                   <div class="form-group">
                      <label>Adres</label>
                      <textarea type="text" class="form-control" name="adres"><?php echo $customer["adres"]; ?></textarea>
                   </div>
                <hr>
                 <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Ürün</label>
                              <input class="form-control" value="<?php echo $order["product_name"]; ?>" disabled>
                           </div>
                        </div>
                        <div class="col-md-4 ">
                           <div class="form-group">
                              <label>Ödenen</label>
                              <input type="text" class="form-control" value="<?php echo $order["order_amount"]; echo currency($settings["site_currency"]); ?>" disabled>
                           </div>
                        </div>
                        <div class=" col-md-4 ">
                           <div class="form-group">
                              <label>Ödeme Yöntemi</label>
                              <input type="text" class="form-control" value="<?php echo $order["method_name"]; ?>" disabled>
                           </div>
                        </div>
                     </div>
                        <hr>
                         <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Sipariş Durumu</label>
                              <select class="form-control" name="order_status">
                                  <option value="1" <?php if($order["order_status"] == 1): echo "selected"; endif; ?>>Sipariş Alındı</option>
                                  <option value="2" <?php if($order["order_status"] == 2): echo "selected"; endif; ?>>Sipariş Hazırlanıyor</option>
                                  <option value="3" <?php if($order["order_status"] == 3): echo "selected"; endif; ?>>Üretimde</option>
                                  <option value="4" <?php if($order["order_status"] == 4): echo "selected"; endif; ?>>Kargoya Verildi</option>
                                  <option value="5" <?php if($order["order_status"] == 5): echo "selected"; endif; ?>>Teslim Edildi</option>
                                  <option value="6" <?php if($order["order_status"] == 6): echo "selected"; endif; ?>>İptal/İade Edildi</option>
                               </select>
                           </div>
                        </div>
                        <div class="col-md-4 ">
                           <div class="form-group">
                              <label>Kargo Firması</label>
                              <select class="form-control" name="cargo_company">
                                  <option value="yurticikargo" <?php if($order["cargo_company"] == "yurticikargo"): echo "selected"; endif; ?>>Yurtiçi Kargo</option>
                                  <option value="araskargo" <?php if($order["cargo_company"] == "araskargo"): echo "selected"; endif; ?>>Aras Kargo</option>            
                                  <option value="suratkargo" <?php if($order["cargo_company"] == "suratkargo"): echo "selected"; endif; ?>>Sürat Kargo</option>
                                  <option value="mngkargo" <?php if($order["cargo_company"] == "mngkargo"): echo "selected"; endif; ?>>MNG Kargo</option>
                                  <option value="fedex" <?php if($order["cargo_company"] == "fedex"): echo "selected"; endif; ?>>FedEx</option>
                              </select>
                           </div>
                        </div>
                        <div class=" col-md-4 ">
                           <div class="form-group">
                              <label>Kargo Takip No</label>
                              <input type="text" class="form-control" value="<?php echo $order["cargo_no"]; ?>" name="cargo_no">
                           </div>
                        </div>
                     </div>
                        <hr>
                           <div class="form-group">
                              <label>Sipariş Notu <small style="color:grey;">(Sadece yöneticiler görebilir)</small></label>
                              <textarea type="text" class="form-control"  name="order_note"><?php echo $order["order_note"]; ?></textarea>
                           </div>
                           
                           <button type="submit" class="btn btn-primary ">Siparişi Güncelle</button>
                           <a href="<?php $id = $order["payment_privatecode"]; echo site_url("admin/siparis_detay/bildir/$id"); ?>"  class="btn btn-success" <?php if(!$order["cargo_no"]): echo "disabled"; endif; ?> style="color:#fff">Kargoya Verildi Bildirimi Gönder</a>

                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include 'footer.php'; ?>