<?php include 'header.php'; ?>
    <div class="content-page rtl-page">

<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                     <button type="button" class="btn btn-dark mt-2" data-toggle="modal" data-target="#exampleModal">
                     Resim yükle
                     </button>
                     <!-- Modal -->
                     
                     
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Resim yükle</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">

                                <form method="POST" action="" enctype="multipart/form-data">
                
                           <div class="form-group">
                              <label>Resim adı</label>
                              <input type="text" class="form-control" name="file_name" required="">
                            </div>
                        
                 <label>Resim dosyası</label><br>             
                 <input type="file" name="logo" id="preferenceLogo">
                                 
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                 <button type="submit" class="btn btn-primary">Yükle</button>                  </form>
                              </div>
                           </div>
                        </div>
                     </div>
<br><br>
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Resimler</h4>
                     </div>
                  </div>
                  <div class="card-body">

   <table class="table table-striped table-bordered">
      <thead>
         <tr>
            <th>Resim ID</th>
            <th>Resim</th>
            <th>Resim URL</th>
            <th></th>
         </tr>
      </thead>
        <tbody>
          <?php 
          
          foreach( $orders as $order ): 
             
             $id = $order["file_id"];            

              ?>
              <tr>
                 <td><?php echo $order["file_id"] ?></td>
                 <td><?php echo $order["file_name"]; ?> </td>       
                 <td><?php echo $order["file_url"]; ?></td>
                 <td>
                     <a href="<?=site_url("admin/resimler?delete=$id")?>"><button type="button" class="btn btn-danger"><i class="fas fa-trash"></i>Sil</button></a>
                         <!-- Button trigger modal -->

                 </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
   </table>

</div></div></div></div></div>


<?php include 'footer.php'; ?>
