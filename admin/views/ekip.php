<?php include 'header.php'; ?>
    <div class="content-page rtl-page">

<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    
     <button type="button" class="btn btn-dark mt-2" data-toggle="modal" data-target="#exampleModal">
                     Çalışan ekle
                     </button>
                     <!-- Modal -->
                     
                     
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Çalışan ekle</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">

                                <form method="POST" action="" enctype="multipart/form-data">
                
                           <div class="form-group">
                              <label>Çalışan adı</label>
                              <input type="text" class="form-control" name="team_name" required="">
                            </div>
                               <div class="form-group">
                              <label>Çalışan statü</label>
                              <input type="text" class="form-control" name="team_statu" placeholder="CEO" required="">
                            </div>
                        
                 <label>Çalışan görseli</label><br>             
                 <input type="file" name="logo" id="preferenceLogo">
                                 
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                 <button type="submit" class="btn btn-primary">Ekle</button>                  </form>
                              </div>
                           </div>
                        </div>
                     </div>
    
<br><br>
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Ekibimiz</h4>
                     </div>
                  </div>
                  <div class="card-body">

   <table class="table table-striped table-bordered">
      <thead>
         <tr>
            <th>Çalışan ID</th>
            <th>Görsel</th>
            <th>Çalışan</th>
            <th>Statü</th>
            <th></th>
         </tr>
      </thead>
        <tbody>
          <?php 
          
          foreach( $orders as $order ): 
             
             $id = $order["team_id"];            

              ?>
              <tr>
                 <td><?php echo $id; ?></td>

               <td class="text-center"><img class="rounded img-fluid avatar-40" src="<?php if( $order["team_image"] ): echo $order["team_image"]; else: echo "admin/no-image.png"; endif;  ?>"  alt="profile"></td>

                 
                 <td><?php echo $order["team_name"]; ?> </td>
                                  <td><?php echo $order["team_statu"]; ?> </td>

                 <td>
                     <a href="<?=site_url("admin/ekip?delete=$id")?>"><button type="button" class="btn btn-danger"><i class="fas fa-trash"></i>Sil</button></a>
                 </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
   </table>
  
</div></div></div></div></div>


<?php include 'footer.php'; ?>
