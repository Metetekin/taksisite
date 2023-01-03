<?php include 'header.php'; ?>
    <div class="content-page rtl-page">

<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Ödeme Yöntemleri</h4>
                     </div>
                  </div>
                  <div class="card-body">

   <table class="table table-striped table-bordered">
      <thead>
         <tr>
            <th>Method ID</th>
            <th>Ödeme Yöntemi</th>
            <th>Durum</th>
            <th></th>
         </tr>
      </thead>
        <tbody>
          <?php 
          
          foreach( $methodList as $order ): 
             
             $id = $order["method_get"];            

              ?>
              <tr>
                 <td><?php echo $order["id"]; ?></td>
                 <td><?php echo $order["method_name"]; ?> </td>
                 <td><div class="custom-control custom-switch custom-switch-color">
                                 <input type="checkbox" class="custom-control-input bg-primary" id="customSwitch01" <?php if($order["method_type"] == 2): echo 'checked'; endif; ?> disabled>
                                 <label class="custom-control-label" for="customSwitch01"></label>
                              </div>
                 </div>
                 </td>
                 <td>
                                          <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#<?=$id?>">
                     <i class="fas fa-edit"></i>Düzenle
                     </button>

                     
                 </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
   </table>
  
</div></div></div></div></div>


                    <div class="modal fade" id="paytr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">PayTR Düzenle</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
    <?php
    
    $method = $conn->prepare("SELECT * FROM payment_methods WHERE method_get=:id ");
    $method->execute(array("id"=>"paytr"));
    $method = $method->fetch(PDO::FETCH_ASSOC);
    $extra  = json_decode($method["method_extras"],true);
    
    ?>
    
    <form class="form" action="<?php echo site_url("admin/odeme/edit/".$method["method_get"])?>" method="post" data-xhr="true">

          <div class="form-group">
            <label class="form-group">Görünür adı</label>
            <input type="text" class="form-control" name="name" value="<?php echo $extra["name"]?>">
          </div>

            <div class="form-group">
            <label>Görünürlük</label>
              <select class="form-control" name="method_type">
                    <option value="2" <?php if( $method["method_type"] == 2 ): echo 'selected'; endif; ?> >Aktif</option>
                    <option value="1" <?php if( $method["method_type"] == 1 ): echo 'selected'; endif; ?> >Pasif</option>
                </select>
            </div>

          <hr>
            <p>
                   Bildirim URL: <code><?php echo site_url("bildirim/".$method["method_get"]); ?></code>
            </p>
          <hr>

          <div class="form-group">
            <label class="form-group">Merchant id</label>
            <input type="text" class="form-control" name="merchant_id" value="<?php echo $extra["merchant_id"]?>">
          </div>
          <div class="form-group">
            <label class="form-group">Merchant key</label>
            <input type="text" class="form-control" name="merchant_key" value="<?php echo $extra["merchant_key"]?>">
          </div>
          <div class="form-group">
            <label class="form-group">Merchant salt</label>
            <input type="text" class="form-control" name="merchant_salt" value="<?php echo $extra["merchant_salt"]?>">
          </div>
          <div class="form-group">
            <label class="form-group">Komisyon, %</label>
            <input type="text" class="form-control" name="fee" value="<?php echo $extra["fee"]?>">
          </div>


        </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Güncelle</button>
            <button type="button" class="btn btn-dark" data-dismiss="modal">Kapat</button>
          </div>
          </form>

                              </div>
                              
                           </div>
                        </div>
                   
                   
                   <!-- paytr havale -->
                   
                    <div class="modal fade" id="paytr_havale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">PayTR Havale/EFT Düzenle</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
    <?php
    
    $method = $conn->prepare("SELECT * FROM payment_methods WHERE method_get=:id ");
    $method->execute(array("id"=>"paytr_havale"));
    $method = $method->fetch(PDO::FETCH_ASSOC);
    $extra  = json_decode($method["method_extras"],true);
    
    ?>
    
    <form class="form" action="<?php echo site_url("admin/odeme/edit/".$method["method_get"])?>" method="post" data-xhr="true">

          <div class="form-group">
            <label class="form-group">Görünür adı</label>
            <input type="text" class="form-control" name="name" value="<?php echo $extra["name"]?>">
          </div>

            <div class="form-group">
            <label>Görünürlük</label>
              <select class="form-control" name="method_type">
                    <option value="2" <?php if( $method["method_type"] == 2 ): echo 'selected'; endif; ?> >Aktif</option>
                    <option value="1" <?php if( $method["method_type"] == 1 ): echo 'selected'; endif; ?> >Pasif</option>
                </select>
            </div>

          <hr>
            <p>
                   Bildirim URL: <code><?php echo site_url("bildirim/paytr"); ?></code>
            </p>
          <hr>

          <div class="form-group">
            <label class="form-group">Merchant id</label>
            <input type="text" class="form-control" name="merchant_id" value="<?php echo $extra["merchant_id"]?>">
          </div>
          <div class="form-group">
            <label class="form-group">Merchant key</label>
            <input type="text" class="form-control" name="merchant_key" value="<?php echo $extra["merchant_key"]?>">
          </div>
          <div class="form-group">
            <label class="form-group">Merchant salt</label>
            <input type="text" class="form-control" name="merchant_salt" value="<?php echo $extra["merchant_salt"]?>">
          </div>
          <div class="form-group">
            <label class="form-group">Komisyon, %</label>
            <input type="text" class="form-control" name="fee" value="<?php echo $extra["fee"]?>">
          </div>


        </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Güncelle</button>
            <button type="button" class="btn btn-dark" data-dismiss="modal">Kapat</button>
          </div>
          </form>

                              </div>
                              
                           </div>
                        </div>

                   <!-- shopier -->

                 <div class="modal fade" id="shopier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Shopier Düzenle</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
    <?php
    
    $method = $conn->prepare("SELECT * FROM payment_methods WHERE method_get=:id ");
    $method->execute(array("id"=>"shopier"));
    $method = $method->fetch(PDO::FETCH_ASSOC);
    $extra  = json_decode($method["method_extras"],true);
    
    ?>
    
    <form class="form" action="<?php echo site_url("admin/odeme/edit/".$method["method_get"])?>" method="post" data-xhr="true">

          <div class="form-group">
            <label class="form-group">Görünür adı</label>
            <input type="text" class="form-control" name="name" value="<?php echo $extra["name"]?>">
          </div>

            <div class="form-group">
            <label>Görünürlük</label>
              <select class="form-control" name="method_type">
                    <option value="2" <?php if( $method["method_type"] == 2 ): echo 'selected'; endif; ?> >Aktif</option>
                    <option value="1" <?php if( $method["method_type"] == 1 ): echo 'selected'; endif; ?> >Pasif</option>
                </select>
            </div>

          <hr>
            <p>
                   Bildirim URL: <code><?php echo site_url("bildirim/shopier"); ?></code>
            </p>
          <hr>

       
          <div class="form-group">
            <label class="form-group">apiKey</label>
            <input type="text" class="form-control" name="apiKey" value="<?php echo $extra["apiKey"]?>">
          </div>
          <div class="form-group">
            <label class="form-group">apiSecret</label>
            <input type="text" class="form-control" name="apiSecret" value="<?php echo $extra["apiSecret"]?>">
          </div>
          <div class="form-group">
          <label>Geri dönüş</label>
            <select class="form-control" name="website_index">
                  <option value="1" <?php if( $extra["website_index"] == 1 ): echo 'selected'; endif; ?>>Geri dönüş URL (1)</option>
                  <option value="2" <?php if( $extra["website_index"] == 2 ): echo 'selected'; endif; ?>>Geri dönüş URL (2)</option>
                  <option value="3" <?php if( $extra["website_index"] == 3 ): echo 'selected'; endif; ?>>Geri dönüş URL (3)</option>
                  <option value="4" <?php if( $extra["website_index"] == 4 ): echo 'selected'; endif; ?>>Geri dönüş URL (4)</option>
                  <option value="5" <?php if( $extra["website_index"] == 5 ): echo 'selected'; endif; ?>>Geri dönüş URL (5)</option>
              </select>
          </div>
          <div class="form-group">
          <label>İşlem ücreti (0,49 TL)</label>
            <select class="form-control" name="processing_fee">
                  <option value="1" <?php if( $extra["processing_fee"] == 1 ): echo 'selected'; endif; ?>>Yansıt</option>
                  <option value="0" <?php if( $extra["processing_fee"] == 0 ): echo 'selected'; endif; ?>>Yansıtma</option>
              </select>
          </div>
          <div class="form-group">
            <label class="form-group">Komisyon, %</label>
            <input type="text" class="form-control" name="fee" value="<?php echo $extra["fee"]?>">
          </div>


        </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Güncelle</button>
            <button type="button" class="btn btn-dark" data-dismiss="modal">Kapat</button>
          </div>
          </form>

                              </div>
                              
                           </div>
                        </div>

<!-- paywant -->


                 <div class="modal fade" id="paywant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Paywant Düzenle</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
    <?php
    
    $method = $conn->prepare("SELECT * FROM payment_methods WHERE method_get=:id ");
    $method->execute(array("id"=>"paywant"));
    $method = $method->fetch(PDO::FETCH_ASSOC);
    $extra  = json_decode($method["method_extras"],true);
    
    ?>
    
    <form class="form" action="<?php echo site_url("admin/odeme/edit/".$method["method_get"])?>" method="post" data-xhr="true">

          <div class="form-group">
            <label class="form-group">Görünür adı</label>
            <input type="text" class="form-control" name="name" value="<?php echo $extra["name"]?>">
          </div>

            <div class="form-group">
            <label>Görünürlük</label>
              <select class="form-control" name="method_type">
                    <option value="2" <?php if( $method["method_type"] == 2 ): echo 'selected'; endif; ?> >Aktif</option>
                    <option value="1" <?php if( $method["method_type"] == 1 ): echo 'selected'; endif; ?> >Pasif</option>
                </select>
            </div>

          <hr>
            <p>
                   Bildirim URL: <code><?php echo site_url("bildirim/paywant"); ?></code>
            </p>
          <hr>

       
         <div class="form-group">
            <label class="form-group">apiKey</label>
            <input type="text" class="form-control" name="apiKey" value="<?php echo $extra["apiKey"] ?>">
          </div>
          <div class="form-group">
            <label class="form-group">apiSecret</label>
            <input type="text" class="form-control" name="apiSecret" value="<?php echo $extra["apiSecret"]?>">
          </div>
          <div class="form-group">
            <label class="form-group">Komisyon, %</label>
            <input type="text" class="form-control" name="fee" value="<?php echo $extra["fee"] ?>">
          </div>

          <div class="service-mode__block">
            <div class="form-group">
            <label>Paywant Komison</label>
              <select class="form-control" name="commissionType">
                    <option value="2" <?php if( $extra["commissionType"] == 2 ): echo 'selected'; endif; ?>>Kullanıcıya yansıt</option>
                    <option value="1" <?php if( $extra["commissionType"] == 1 ): echo 'selected'; endif; ?>>Kullanıcıya yansıtma</option>
                </select>
            </div>
          </div>

          <div class="form-group">
            <label>Ödeme Yöntemleri</label>
              <div class="form-group col-md-12">
                  <div class="row">
                    <label class="checkbox-inline col-md-4">
                      <input type="checkbox" class="access" name="payment_type[]" value="1" <?php if( in_array(1,$extra["payment_type"]) ): echo 'checked'; endif; ?>> Mobil Ödeme
                    </label>
                    <label class="checkbox-inline col-md-4">
                      <input type="checkbox" class="access" name="payment_type[]" value="2" <?php if( in_array(2,$extra["payment_type"]) ): echo 'checked'; endif; ?>> Kredi/Banka Kartı
                    </label>
                    <label class="checkbox-inline col-md-4">
                      <input type="checkbox" class="access" name="payment_type[]" value="3" <?php if( in_array(3,$extra["payment_type"]) ): echo 'checked'; endif; ?>> Havale/EFT
                    </label>
                  </div>
              </div>
            </div>



        </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Güncelle</button>
            <button type="button" class="btn btn-dark" data-dismiss="modal">Kapat</button>
          </div>
          </form>

                              </div>
                              
                           </div>
                        </div>



<?php include 'footer.php'; ?>
