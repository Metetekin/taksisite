<?php include 'header.php'; ?>
    <div class="content-page rtl-page">

<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                     <a href="/admin/slider_ekle" class="btn btn-dark mt-2" >
                     Slider ekle
                     </a>
    
<br><br>
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Sliderler</h4>
                     </div>
                  </div>
                  <div class="card-body">

   <table class="table table-striped table-bordered">
      <thead>
         <tr>
            <th>Slider ID</th>  
            <th>Slider Görsel</th>
            <th>Slider</th>
            <th>Slider Sırası</th>
            <th></th>
         </tr>
      </thead>
        <tbody>
          <?php 
          
          foreach( $orders as $order ): 
             
             $id = $order["slider_id"]; ?>
              <tr>
                 <td><?php echo $id; ?></td>
                                                                    <td class="text-center"><img class="rounded img-fluid avatar-40" src="<?php if( $order["slider_image"] ): echo $order["slider_image"]; else: echo "admin/no-image.png"; endif;  ?>"  alt="profile"></td>

                 <td><?php echo $order["slider_name"]; ?></td>
                 <td><?php echo $order["slider_sid"]; ?> </td>       
                 <td>
                     <a href="<?=site_url("admin/slider_detay/$id")?>"><button type="button" class="btn btn-dark"><i class="fas fa-edit"></i>Düzenle</button></a>
                    <a href="<?=site_url("admin/slider_detay/sil/$id")?>"><button type="button" class="btn btn-danger"><i class="fas fa-trash"></i>Sil</button></a>


                 </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
   </table>

</div></div></div></div></div>


<?php include 'footer.php'; ?>
