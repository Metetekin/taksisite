<?php include 'header.php'; ?>
    <div class="content-page rtl-page">

<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
      
                   <form action="/admin/siparisler" method="GET" >
                      <input type="text" class="form-control" name="order" placeholder="Sipariş ara..." style="    border: 1px solid #10becb;">
                    </form>
                    <br>
                <div class="card">
                  
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Siparişler</h4>
                     </div>
                  </div>
                  <div class="card-body">

   <table class="table table-striped table-bordered">
      <thead>
         <tr>
            <th>Sipariş No</th>
            <th>Ürün</th>
            <th>Ad Soyad</th>
            <th>Telefon</th>
            <th>Ödenen</th>
            <th>Ödeme</th>
            <th>Durum</th>
            <th>Tarih</th>
            <th></th>
         </tr>
      </thead>
        <tbody>
          <?php 
          
          foreach( $orders as $order ): 
             
             $id = $order["payment_privatecode"];            
             $customer = json_decode($order["order_customer"], true);
              
              ?>
              <tr>
                 <td><?php echo $order["payment_privatecode"] ?></td>
                 <td class="text-center"><img class="rounded img-fluid avatar-40" src="<?php if( $order["product_image"] ): echo $order["product_image"]; else: echo "admin/no-image.png"; endif;  ?>"  alt="profile"></td>
                 <td><?php echo $customer["ad_soyad"]; ?> </td>
                 <td><?php echo $customer["telefon"]; ?></td>
                 <td><?php echo $order["order_amount"];  echo currency($settings["site_currency"]); ?></td>
                 <td><button type="button" class="btn btn-outline-success rounded-pill btn-xs">Ödendi</button></td>
                 <td><button type="button" class="btn btn-outline-info rounded-pill mt-2"><?php echo status($order["order_status"])?></button></td>
                 <td><?php echo $order["order_date"]; ?></td>
                 <td>
                     <a href="<?=site_url("admin/siparis_detay/$id")?>"><button type="button" class="btn btn-dark"><i class="fas fa-edit"></i>Düzenle</button></a>
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
