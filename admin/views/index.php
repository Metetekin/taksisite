<?php include 'header.php'; ?>

    <div class="content-page rtl-page">

<div class="container-fluid">
            <div class="row">
              
               <div class="col-md-6 col-lg-3">
                  <div class="card card-block card-stretch card-height">
                     <div class="card-body bg-primary-light rounded">
                        <div class="d-flex align-items-center justify-content-between">
                           <div class="rounded iq-card-icon bg-primary"><i class="fas fa-cogs"></i>
                           </div>
                           <div class="text-right">
                              <h2 class="mb-0"><span class="counter" style="visibility: visible;"><?php if($settings["site_maintenance"] == 1): echo "Otomatik"; else: echo "Manuel"; endif; ?> </span></h2>
                              <h5 class="">Panel Modu</h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-3">
                  <div class="card card-block card-stretch card-height">
                     <div class="card-body bg-warning-light rounded">
                        <div class="d-flex align-items-center justify-content-between">
                           <div class="rounded iq-card-icon bg-warning"><i class="fas fa-box"></i>
                           </div>
                           <div class="text-right">
                              <h2 class="mb-0"><span class="counter" style="visibility: visible;"><?=$product?></span></h2>
                              <h5 class="">Ürün</h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-3">
                  <div class="card card-block card-stretch card-height">
                     <div class="card-body bg-danger-light rounded">
                        <div class="d-flex align-items-center justify-content-between">
                           <div class="rounded iq-card-icon bg-danger"><i class="ri-shopping-bag-fill"></i>
                           </div>
                           <div class="text-right">
                              <h2 class="mb-0"><span class="counter" style="visibility: visible;"><?php if(!$order): echo 0; else: echo $order; endif;  ?></span></h2>
                              <h5 class="">Sipariş</h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-3">
                  <div class="card card-block card-stretch card-height">
                     <div class="card-body bg-info-light rounded">
                        <div class="d-flex align-items-center justify-content-between">
                           <div class="rounded iq-card-icon bg-info"><i class="fas fa-university"></i>
                           </div>
                           <div class="text-right">
                              <h2 class="mb-0"><span class="counter" style="visibility: visible;"><?=$total_payment?></span><span><?php echo currency($settings["site_currency"]); ?></span></h2>
                              <h5 class="">Toplam Ödeme</h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
             
               <div class="col-md-6 col-lg-3">
                  <div class="card card-block card-stretch card-height iq-border-box iq-border-box-1 text-primary">
                     <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                           <h6>Son Girişiniz</h6>
                           <h5><?=$user["login_date"]?></h5>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-3">
                  <div class="card card-block card-stretch card-height iq-border-box iq-border-box-2 text-warning">
                     <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                           <h6>Son Giriş Yapan IP</h6>
                           <h5><?=$user["login_ip"]?></h5>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-3">
                  <div class="card card-block card-stretch card-height iq-border-box iq-border-box-3 text-danger">
                     <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                           <h6>Son Sipariş</h6>
                           <h5><?php 
                           
                           if(!$ordersX[0]["order_date"]): echo "🤔"; else: echo $ordersX[0]["order_date"]; endif;  ?></h5>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-3">
                  <div class="card card-block card-stretch card-height iq-border-box iq-border-box-4 text-info">
                     <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                           <h6>Son Mesaj</h6>
                           <h5><?php if(!$ticket[0]["ticket_date"]): echo "🤔"; else: echo $ticket[0]["ticket_date"]; endif;  ?></h5>
                        </div>
                     </div>
                  </div>
               </div>
              <div class="col-sm-12">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Son 10 Sipariş</h4>
                        </div>
                     </div>
                        <div class="table-responsive">
                           <table id="user-list-table" class="table table-striped table-bordered" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                                 <tr>
                                    <th>Ürün</th>
                                    <th>Sipariş No</th>
                                    <th>Ad Soyad</th>
                                    <th>Telefon</th>
                                    <th>Email</th>
                                    <th>Ödenen</th>
                                    <th>Tarih</th>
                                 </tr>
                           </thead>
                           <tbody>
                            <?php foreach($orders as $row):
                            $user = json_decode($row["order_customer"], true); ?>   
                            
                                 <tr>
                                    <td class="text-center"><img class="rounded img-fluid avatar-40" src="<?php if( $order["product_image"] ): echo $order["product_image"]; else: echo "admin/no-image.png"; endif;  ?>"  alt="profile"></td>
                                    <td><?=$row["payment_privatecode"]?></td>
                                    <td><?=$user["ad_soyad"]?></td>
                                    <td><?=$user["telefon"]?></td>
                                    <td><?=$user["email"]?></td>
                                    <td><?=$row["order_amount"]?></td>
                                    <td><?=$row["order_date"]?></td>
                                 </tr>
                            <?php endforeach; ?>
                           </tbody>
                           </table>
                        </div>
                         
                  </div>
            </div>
            </div>
         </div>
      </div>

<?php include 'footer.php'; ?>
