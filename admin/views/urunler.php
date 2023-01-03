<?php include 'header.php'; ?>
    <div class="content-page rtl-page">

<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Ürünler</h4>
                     </div>
                  </div>
                  <div class="card-body">

   <table class="table table-striped table-bordered">
      <thead>
         <tr>
            <th>Ürün ID</th>
            <th>Görsel</th>
            <th>Ürün Adı</th>
            <th>Kategori</th>
            <th>Fiyat</th>
            <th>Tür</th>
            <th></th>
         </tr>
      </thead>
        <tbody>
          <?php 
          
          foreach( $orders as $order ): 
             
             $id = $order["product_id"];            

              ?>
              <tr>
                 <td><?php echo $order["product_id"] ?></td>
                 <td class="text-center"><img class="rounded img-fluid avatar-40" src="<?php if( $order["product_image"] ): echo $order["product_image"]; else: echo "admin/no-image.png"; endif;  ?>"  alt="profile"></td>
                 <td><?php echo $order["product_name"]; ?> </td>
                 <td><?php echo $order["category_name"]; ?></td>
                 <td><?php echo $order["product_price"];  echo currency($settings["site_currency"]); ?></td>
                 <td><?php echo product_type($order["product_type"]); ?></td>
                 <td>
                     <a href="<?=site_url("admin/urun_detay/$id")?>"><button type="button" class="btn btn-dark"><i class="fas fa-edit"></i>Düzenle</button></a>
                 </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
   </table>
   <?php if( $paginationArr["count"] > 1 ): ?>
     <div class="row">
        <div class="col-sm-8">
           <nav>
              <ul class="pagination">
                <?php if( $paginationArr["current"] != 1 ): ?>
                 <li class="prev"><a href="<?php echo site_url("admin/siparisler/1/".$status.$search_link) ?>">&laquo;</a></li>
                 <li class="prev"><a href="<?php echo site_url("admin/siparisler/".$paginationArr["previous"]."/".$status.$search_link) ?>">&lsaquo;</a></li>
                 <?php
                     endif;
                     for ($page=1; $page<=$pageCount; $page++):
                       if( $page >= ($paginationArr['current']-9) and $page <= ($paginationArr['current']+9) ):
                 ?>
                 <li class="<?php if( $page == $paginationArr["current"] ): echo "active"; endif; ?> "><a href="<?php echo site_url("admin/siparisler/".$page."/".$status.$search_link) ?>"><?=$page?></a></li>
                 <?php endif; endfor;
                       if( $paginationArr["current"] != $paginationArr["count"] ):
                 ?>
                 <li class="next"><a href="<?php echo site_url("admin/siparisler/".$paginationArr["next"]."/".$status.$search_link) ?>" data-page="1">&rsaquo;</a></li>
                 <li class="next"><a href="<?php echo site_url("admin/siparisler/".$paginationArr["count"]."/".$status.$search_link) ?>" data-page="1">&raquo;</a></li>
                 <?php endif; ?>
              </ul>
           </nav>
        </div>
        <div class="col-sm-4 pagination-counters">
          <?php echo $count; ?> sipariş içerisinden <?php echo $where+1 ?>'den <?php if( $where+$to > $count ): echo $count; else: echo $where+$to; endif; ?>'e kadar
         </div>
     </div>
   <?php endif; ?>
</div></div></div></div></div>


<?php include 'footer.php'; ?>
