<?php include 'header.php'; ?>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title"><i class="fas fa-history" aria-hidden="true"></i> Sistem Logları</h4>
                  </div>
               </div>
               <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th>Kullanıcı</th>
                           <th>Detay</th>
                           <th>IP Adresi</th>
                           <th>Tarih</th>
                           <th></th>
                        </tr>
                     </thead>
                     <form id="changebulkForm" action="<?php echo site_url("admin/logs/multi-action") ?>" method="post">
                       <tbody>
                         <?php if( !$logs ): ?>
                           <tr>
                             <td colspan="4"><center>Herhangi bir log bulunamadı.</center></td>
                           </tr>
                         <?php endif; ?>
                         <?php foreach($logs as $log): ?>
                          <tr>
                             <td><?php echo $log["username"] ?></td>
                             <td><?php echo $log["action"] ?></td>
                             <td><?php echo $log["report_ip"] ?></td>
                             <td><?php echo $log["report_date"] ?></td>
                             <td> <a href="<?php echo site_url("admin/logs/delete/".$log["id"]) ?>" class="btn btn-dark" stlye="font-size:10px">Sil</a> </td>
                          </tr>
                        <?php endforeach; ?>
                       </tbody>
                     </form>
                  </table>
               </div>
            </div>
         </div>
         <?php if( $paginationArr["count"] > 1 ): ?>
           <div class="row">
              <div class="col-sm-8">
                 <nav>
                    <ul class="pagination">
                      <?php if( $paginationArr["current"] != 1 ): ?>
                       <li class="prev"><a href="<?php echo site_url("admin/logs/1/".$search_link) ?>">&laquo;</a></li>
                       <li class="prev"><a href="<?php echo site_url("admin/logs/".$paginationArr["previous"]."/".$search_link) ?>">&lsaquo;</a></li>
                       <?php
                           endif;
                           for ($page=1; $page<=$pageCount; $page++):
                             if( $page >= ($paginationArr['current']-9) and $page <= ($paginationArr['current']+9) ):
                       ?>
                       <li class="<?php if( $page == $paginationArr["current"] ): echo "active"; endif; ?> "><a href="<?php echo site_url("admin/logs/".$page."/".$status.$search_link) ?>"><?=$page?></a></li>
                       <?php endif; endfor;
                             if( $paginationArr["current"] != $paginationArr["count"] ):
                       ?>
                       <li class="next"><a href="<?php echo site_url("admin/logs/".$paginationArr["next"]."/".$search_link) ?>" data-page="1">&rsaquo;</a></li>
                       <li class="next"><a href="<?php echo site_url("admin/logs/".$paginationArr["count"]."/".$search_link) ?>" data-page="1">&raquo;</a></li>
                       <?php endif; ?>
                    </ul>
                 </nav>
              </div>
           </div>
         <?php endif; ?>
      </div>
   </div>
</div>

<?php include 'footer.php'; ?>
