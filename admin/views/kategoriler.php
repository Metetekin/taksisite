<?php include 'header.php'; ?>
    <div class="content-page rtl-page">

<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Kategoriler</h4>
                     </div>
                  </div>
                  <div class="card-body">

   <table class="table table-striped table-bordered">
      <thead>
         <tr>
            <th>Kategori ID</th>
            <th>Kategori Adı</th>
            <th>Permalink</th>
            <th>Bağlı Ürün</th>
            <th></th>
         </tr>
      </thead>
        <tbody>
          <?php 
          
          foreach( $orders as $order ): 
             
             $id = $order["category_id"];            

              ?>
              <tr>
                 <td><?php echo $order["category_id"] ?></td>
                 <td><?php echo $order["category_name"]; ?> </td>
                 <td><?php echo $order["category_url"]; ?></td>
                 <td><?php echo countRow(["table"=>"products","where"=>["product_category"=>$id]]); ?></td>
                 <td>
                     <a href="<?=site_url("admin/kategori_detay/$id")?>"><button type="button" class="btn btn-dark"><i class="fas fa-edit"></i>Düzenle</button></a>
                                      <a href="<?=site_url("admin/kategori_detay/sil/$id")?>"><button type="button" class="btn btn-danger"><i class="fas fa-trash"></i>Sil</button></a>
                 </td>
                 
              </tr>
            <?php endforeach; ?>
        </tbody>
   </table>
   
</div></div></div></div></div>


<?php include 'footer.php'; ?>
