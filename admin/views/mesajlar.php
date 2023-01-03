<?php include 'header.php'; ?>

<div class="content-page rtl-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-body chat-page p-0">
                     <div class="chat-data-block">
                        <div class="row">
                           <div class="col-lg-3 chat-data-left">
                              <div class="chat-search pt-3 pl-3 rtl-pr-3">
                                 <div class="d-flex align-items-center">
                                    <div class="chat-profile mr-3 rtl-mr-0 rtl-ml-3">
                                       <img src="../assets/images/user/1.jpg" alt="chat-user" class="avatar-60 ">
                                    </div>
                                    <div class="chat-caption mr-3 rtl-mr-0">
                                       <h5 class="mb-0"><?php echo $user["name"];?></h5>
                                       <p class="m-0">Yanıtlayan</p>
                                    </div>
                                    <button type="submit" class="close-btn-res p-3"><i class="ri-close-fill"></i></button>
                                 </div>

                              </div>
                              
                              <div class="chat-sidebar-channel scroller mt-4 pl-3 rtl-pr-3">
                                 <h5 class="mt-3">Gelen Mesajlar</h5>
                                 <ul class="iq-chat-ui nav flex-column nav-pills">
                                     
                                     <!-- for start -->
                                     
                                     <?php foreach ($orders as $order): ?>
                                     
                                    <li>
                                       <a data-toggle="pill" href="#chatbox<?php echo $order["ticket_id"]; ?>" class="">
                                          <div class="d-flex align-items-center">
                                             <div class="avatar mr-2 rtl-ml-2 rtl-mr-0">
                                                <img src="../assets/images/user/1000613.png" alt="chatuserimage" class="avatar-50 ">
                                                <span class="avatar-status"><i class="ri-checkbox-blank-circle-fill text-info"></i></span>
                                             </div>
                                             <div class="chat-sidebar-name">
                                                <h6 class="mb-0"><?php echo $order["customer_name"]; ?></h6>
                                                <span><?php echo $order["ticket_date"]; ?> </span>
                                             </div>
                                          </div>
                                       </a>
                                    </li>
                                    
                                    <?php endforeach; ?>
                                    
                            <!-- for bitis -->
                                
                            
                                 </ul>
                              </div>
                           </div>
                           <div class="col-lg-9 chat-data p-0 chat-data-right">
                              <div class="tab-content h-100"> 


<div class="tab-pane fade active show h-100" id="default-block" role="tabpanel">
                                    <div class="chat-start">
                                       <span class="iq-start-icon text-primary"><i class="ri-message-3-line"></i></span>
                                       <button id="chat-start" class="btn chat-button mt-3">Mesajları görüntülemek için tıkla!</button>
                                    </div>
                                 </div>

                         <!-- chat box start -->
                         
                         <?php foreach($orders as $order): ?>
                                 <div class="tab-pane fade" id="chatbox<?php echo $order["ticket_id"]; ?>" role="tabpanel">
                                    <div class="chat-head">
                                       <header class="d-flex justify-content-between align-items-center bg-white pt-3 pr-3 pb-3" >
                                          <div class="d-flex align-items-center">
                                             <div class="sidebar-toggle">
                                                <i class="ri-menu-3-line"></i>
                                             </div>
                                             <div class="avatar chat-user-profile m-0 mr-3 rtl-mr-0 rtl-ml-3">
                                                <img src="../assets/images/user/1000613.png" alt="avatar" class="avatar-50 ">
                                                    <span class="avatar-status"> <i class="fas fa-eye text-info"></i></span>
                                             </div>
                                             <h5 class="mb-0 mr-3 rtl-ml-3 rtl-mr-0" ><?php echo $order["ticket_subject"]; ?></h5>
                                          </div>
                                          <div class="chat-user-detail-popup scroller">
                                             <div class="user-profile text-center">
                                                <button type="submit" class="close-popup p-3"><i class="ri-close-fill"></i></button>
                                                <div class="user mb-4">
                                                   <a class="avatar m-0">
                                                      <img src="../assets/images/user/1000613.png" class="avatar-100" alt="avatar">
                                                   </a>
                                                   <div class="user-name mt-4">
                                                      <h4 style="color: #000000 !important;"><?php echo $order["customer_name"]; ?></h4>
                                                   </div>
                                                  
                                                </div>
                                                <hr>
                                                <div class="chatuser-detail text-left mt-4" style="color: #000000 !important;">
                                                   <div class="row">
                                                      <div class="col-6 col-md-6 title">Mail:</div>
                                                      <div class="col-6 col-md-6 text-right"><?php echo $order["customer_email"]; ?></div>
                                                   </div>
                                                   <hr>
                                                   <div class="row">
                                                      <div class="col-6 col-md-6 title">Telefon:</div>
                                                      <div class="col-6 col-md-6 text-right"><?php echo $order["customer_telephone"]; ?></div>
                                                   </div>
                                                   <hr>
                                                   <div class="row">
                                                      <div class="col-6 col-md-6 title">Tarih:</div>
                                                      <div class="col-6 col-md-6 text-right"><?php echo $order["ticket_date"]; ?></div>
                                                   </div>
                                            
                                                </div>
                                             </div>
                                          </div>
                                          <div class="chat-header-icons d-flex">
                                             <a href="tel:<?php echo $order["customer_telephone"];?>" class="chat-icon-phone iq-bg-primary">
                                                <i class="ri-phone-line"></i>
                                             </a>
                                             <a href="mailto:<?php echo $order["customer_email"];?>" class="chat-icon-video iq-bg-primary">
                                                <i class="ri-mail-line"></i>
                                             </a>
                                             <a href="<?php $id = $order["ticket_id"]; echo site_url("admin/mesajlar?delete=$id"); ?>" class="chat-icon-delete iq-bg-primary">
                                                <i class="ri-delete-bin-line"></i>
                                             </a>
                                            
                                          </div>
                                       </header>
                                    </div>
                                    <div class="chat-content scroller">
                                        
                                           <div class="chat chat-left">
                                          <div class="chat-user">
                                             <a class="avatar m-0">
                                                <img src="../assets/images/user/1000613.png" alt="avatar" class="avatar-35 ">
                                             </a>
                                          </div>
                                          <div class="chat-detail">
                                             <div class="chat-message">
                                                <p><?php echo $order["ticket_message"]; ?></p>
                                             </div>
                                          </div>
                                       </div>
                                        
                                        <?php if($order["reply_message"]): ?>
                                       <div class="chat">
                                          <div class="chat-user">
                                             <a class="avatar m-0">
                                                <img src="../assets/images/user/1.jpg" alt="avatar" class="avatar-35 ">
                                             </a>
                                             <span class="chat-time mt-1"><i class="ri-check-double-line" style="font-size: 18px"></i></span>
                                          </div>
                                          <div class="chat-detail">
                                             <div class="chat-message">
                                                <p><?php echo $order["reply_message"]; ?></p>
                                             </div>
                                          </div>
                                       </div>
                                       
                                       <?php endif; ?>
                                      
                                    </div>
                                    <div class="chat-footer p-3 bg-white">
                                        
                                        <?php if($order["reply_message"]): ?>
                                        
                                        <center><i class="fa fa-lock"></i> Talep yanıtlandı ve kapatıldı.</center>
                                        
                                        <?php else: ?>
                                        
                                       <form class="d-flex align-items-center" action="" method="POST">
                                           <input type="hidden" name="ticket_id" value="<?=$order["ticket_id"]?>">
                                          <input type="text" class="form-control mr-3 rtl-mr-0 rtl-ml-3" name="reply" placeholder="Cevabınızı buraya yazınız" required>
                                          <button type="submit" class="btn btn-primary d-flex align-items-center p-2 mr-3 rtl-mr-0 rtl-ml-3"><i class="far fa-paper-plane mr-0" aria-hidden="true"></i><span class="d-none d-lg-block ml-1 mr-1 ">Gönder</span></button>
                                       </form>
<?php endif; ?>
                                       
                                    </div>
                                 </div>
                                 
                          <?php endforeach; ?>     
                          
                          <!-- chat box bitis -->         
                          
                          
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>

<?php include 'footer.php'; ?>
