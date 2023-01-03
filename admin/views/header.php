<!DOCTYPE html>
<html lang="tr" dir="">
<head>
      <base href="<?php echo URL; ?>">
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Yönetim Paneli</title>
      
      <!-- Favicon -->
      <link rel="stylesheet" href="../assets/css/backend-plugin.min28b5.css?v=2.0.0">
      <link rel="stylesheet" href="../assets/css/backend28b5.css?v=2.0.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
      <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">
      <link rel="stylesheet" href="../assets/vendor/%40icon/dripicons/dripicons.css">
      <link rel='stylesheet' href='../assets/vendor/fullcalendar/core/main.css' />
      <link rel='stylesheet' href='../assets/vendor/fullcalendar/daygrid/main.css' />
      <link rel='stylesheet' href='../assets/vendor/fullcalendar/timegrid/main.css' />
      <link rel='stylesheet' href='../assets/vendor/fullcalendar/list/main.css' />
  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
      
      <div class="iq-sidebar  rtl-iq-sidebar sidebar-default ">
          <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
              <a href="/admin" class="header-logo">
                  <font size="5">Yönetim Paneli</font>
              </a>
              <div class="iq-menu-bt-sidebar">
                  <i class="las la-bars wrapper-menu"></i>
              </div>
          </div>
          <div class="data-scrollbar" data-scroll="1">
              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                       <li class="<?php if( route(1) == "index" ): echo 'active'; endif; ?>">
                          <a href="<?=site_url("admin")?>" class="collapsed">
                              <i class="fas fa-home"></i><span>Ana Sayfa</span>
                          </a>
                       </li>
                       <li class="<?php if( route(1) == "siparisler" ||  route(1) == "siparis_detay" ): echo 'active'; endif; ?>">
                          <a href="<?=site_url("admin/siparisler")?>" class="collapsed" >
                              <i class="fas fa-shopping-bag"></i><span>Siparişler</span>
                          </a>
                       </li>
                       
  
                           <li class="<?php if( route(1) == "urunler" || route(1) == "urun_detay" || route(1) == "urun_ekle" ): echo 'active'; endif; ?>">
                          <a href="#urunler" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <i class="fas fa-store"></i><span>Ürünler</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="urunler" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="<?php if( route(1) == "urunler" || route(1) == "urun_detay" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/urunler")?>">
                                              <i class="fas fa-angle-right"></i><span>Ürünler</span>
                                          </a>
                                  </li>
                                  
                                 <li class="<?php if( route(1) == "urun_ekle" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/urun_ekle")?>">
                                              <i class="fas fa-angle-right"></i><span>Ürün Ekle</span>
                                          </a>
                                  </li>
                          </ul>
                       </li>
                       
                        <li class="<?php if( route(1) == "kategoriler" || route(1) == "kategori_detay" || route(1) == "kategori_ekle" ): echo 'active'; endif; ?>">
                          <a href="#kategoriler" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <i class="fas fa-tag"></i><span>Kategoriler</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="kategoriler" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="<?php if( route(1) == "kategoriler" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/kategoriler")?>">
                                              <i class="fas fa-angle-right"></i><span>Kategoriler</span>
                                          </a>
                                  </li>
                                  
                                 <li class="<?php if( route(1) == "kategori_ekle" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/kategori_ekle")?>">
                                              <i class="fas fa-angle-right"></i><span>Kategori Ekle</span>
                                          </a>
                                  </li>
                          </ul>
                       </li>
                       
                        <li class="<?php if( route(1) == "referanslar" || route(1) == "referans_detay" || route(1) == "referans_ekle" ): echo 'active'; endif; ?>">
                          <a href="#referanslar" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <i class="fas fa-user-plus"></i><span>Referanslar</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="referanslar" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="<?php if( route(1) == "referanslar" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/referanslar")?>">
                                              <i class="fas fa-angle-right"></i><span>Referanslar</span>
                                          </a>
                                  </li>
                                  
                                 <li class="<?php if( route(1) == "referans_ekle" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/referans_ekle")?>">
                                              <i class="fas fa-angle-right"></i><span>Referans Ekle</span>
                                          </a>
                                  </li>
                          </ul>
                        </li>
                       
                        <li class="<?php if( route(1) == "hizmetler" || route(1) == "hizmet_detay" || route(1) == "hizmet_ekle" ): echo 'active'; endif; ?>">
                          <a href="#hizmetler" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <i class="fas fa-swatchbook"></i><span>Hizmetler</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="hizmetler" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="<?php if( route(1) == "hizmetler" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/hizmetler")?>">
                                              <i class="fas fa-angle-right"></i><span>Hizmetler</span>
                                          </a>
                                  </li>
                                  
                                 <li class="<?php if( route(1) == "hizmet_ekle" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/hizmet_ekle")?>">
                                              <i class="fas fa-angle-right"></i><span>Hizmet Ekle</span>
                                          </a>
                                  </li>
                          </ul>
                        </li>
                      
                       
                         <li class="<?php if( route(1) == "blog" || route(1) == "blog_detay" || route(1) == "blog_ekle" ): echo 'active'; endif; ?>">
                          <a href="#blog" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <i class="fas fa-blog"></i><span>Blog</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="blog" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="<?php if( route(1) == "blog" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/blog")?>">
                                              <i class="fas fa-angle-right"></i><span>Bloglar</span>
                                          </a>
                                  </li>
                                  
                                 <li class="<?php if( route(1) == "blog_ekle" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/blog_ekle")?>">
                                              <i class="fas fa-angle-right"></i><span>Blog Ekle</span>
                                          </a>
                                  </li>
                          </ul>
                        </li>
                      
                       
                        <li class="<?php if( route(1) == "sayfalar" || route(1) == "sayfa_detay" || route(1) == "sayfa_ekle" ): echo 'active'; endif; ?>">
                          <a href="#sayfalar" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <i class="fas fa-file-alt"></i><span>Sayfalar</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="sayfalar" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="<?php if( route(1) == "sayfalar" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/sayfalar")?>">
                                              <i class="fas fa-angle-right"></i><span>Sayfalar</span>
                                          </a>
                                  </li>
                                  
                                 <li class="<?php if( route(1) == "sayfa_ekle" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/sayfa_ekle")?>">
                                              <i class="fas fa-angle-right"></i><span>Sayfa Ekle</span>
                                          </a>
                                  </li>
                          </ul>
                        </li>
                       
                        
                                     <li class="<?php if( route(1) == "mesajlar" ): echo 'active'; endif; ?>">
                          <a href="<?=site_url("admin/mesajlar")?>" class="collapsed">
                              <i class="fas fa-inbox"></i><span>Mesajlar</span>
    
                          </a>
              
                       </li>   
                       
        
                                          
                                                  <li class=" ">
                          <a href="#galeri" class="collapsed" data-toggle="collapse" aria-expanded="false">
<i class="fas fa-folder-open"></i><span>Galeri</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="galeri" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
         
                                  <li class="<?php if( route(1) == "katalog" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/katalog")?>">
                                              <i class="fas fa-angle-right"></i><span>Katalog</span>
                                          </a>
                                  </li>
                                  <li class="<?php if( route(1) == "resimler" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/resimler")?>">
                                              <i class="fas fa-angle-right"></i><span>Resimler</span>
                                          </a>
                                  </li>
                                       
                          </ul>
                       </li>
                                          
                                          
                       <li class=" ">
                          <a href="#gorunum" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <i class="fas fa-eye"></i><span>Görünüm</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="gorunum" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                 <li class="<?php if( route(1) == "banka" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/banka")?>">
                                              <i class="fas fa-angle-right"></i><span> Banka Hesapları</span>
                                          </a>
                                  </li>
                                  <li class="<?php if( route(1) == "sorular" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/sorular")?>">
                                              <i class="fas fa-angle-right"></i><span> Sıkça Sorulan</span>
                                          </a>
                                  </li>
                                  <li class="<?php if( route(1) == "slider" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/slider")?>">
                                              <i class="fas fa-angle-right"></i><span>Slider</span>
                                          </a>
                                  </li>
                                        <li class="<?php if( route(1) == "yorumlar" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/yorumlar")?>">
                                              <i class="fas fa-angle-right"></i><span>Yorumlar</span>
                                          </a>
                                  </li>
                                        <li class="<?php if( route(1) == "ekip" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/ekip")?>">
                                              <i class="fas fa-angle-right"></i><span>Ekibimiz</span>
                                          </a>
                                  </li>
                          </ul>
                       </li>
                    
                                           <li class=" ">
                          <a href="#ayarlar" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <i class="fas fa-cogs"></i><span>Ayarlar</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="ayarlar" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="<?php if( route(1) == "ayarlar" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/ayarlar")?>">
                                              <i class="fas fa-angle-right"></i><span>Genel Ayarlar</span>
                                          </a>
                                  </li>
                                  
                                 <li class="<?php if( route(1) == "seo" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/seo")?>">
                                              <i class="fas fa-angle-right"></i><span>SEO Ayarları</span>
                                          </a>
                                  </li>

                                  <li class="<?php if( route(1) == "odeme" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/odeme")?>">
                                             <i class="fas fa-angle-right"></i><span>Ödeme Ayarları</span>
                                          </a>
                                  </li>
                                  <li class="<?php if( route(1) == "bildirim" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/bildirim")?>">
                                              <i class="fas fa-angle-right"></i><span>Bildirim Ayarları</span>
                                          </a>
                                  </li>
                          </ul>
                       </li>
                       
                       
                                           <li class=" ">
                          <a href="#guvenlik" class="collapsed" data-toggle="collapse" aria-expanded="false">
                             <i class="fas fa-shield-alt"></i><span> Güvenlik</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="guvenlik" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="<?php if( route(1) == "logs" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/logs")?>">
                                              <i class="fas fa-angle-right"></i><span>Sistem Logları</span>
                                          </a>
                                  </li>
                                  
                                 <li class="<?php if( route(1) == "yonetici" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/yonetici")?>">
                                              <i class="fas fa-angle-right"></i><span>Yöneticiler</span>
                                          </a>
                                  </li>

                                  <li class="<?php if( route(1) == "yonetici_ekle" ): echo 'active'; endif; ?>">
                                          <a href="<?=site_url("admin/yonetici_ekle")?>">
                                             <i class="fas fa-angle-right"></i><span>Yönetici Ekle</span>
                                          </a>
                                  </li>
                 
                          </ul>
                       </li>
                       
                    
                  </ul>
              </nav>
             
              <div class="p-3"></div>
          </div>
          </div>       <div class="iq-top-navbar rtl-iq-top-navbar ">
          <div class="iq-navbar-custom">
              <nav class="navbar navbar-expand-lg navbar-light p-0">
              <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                  <i class="ri-menu-line wrapper-menu"></i>
                  <a href="/admin" class="header-logo">
                      Merhaba, <?php echo $user["name"]; ?> &#128075;
                      
                  </a>
              </div>
                  <div class="iq-search-bar device-search">
                    <form action="/admin/siparisler" method="GET" class="searchbox">
                      <a class="search-link" href="/admin/siparisler"><i class="ri-search-line"></i></a>
                      <input type="text" class="text search-input" name="order" placeholder="Sipariş ara...">
                    </form>
                  </div>
                  <div class="d-flex align-items-center">
                      <div class="change-mode">
                          <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                              <div class="custom-switch-inner">
                                  <p class="mb-0"> </p>
                                  <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                                  <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                      <span class="switch-icon-left"><i class="a-left ri-moon-clear-line"></i></span>
                                      <span class="switch-icon-right"><i class="a-right ri-sun-line"></i></span>
                                  </label>
                              </div>
                          </div>
                      </div>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                      <i class="ri-menu-3-line"></i>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto navbar-list align-items-center">
                          <li class="nav-item nav-icon search-content">
                              <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="ri-search-line"></i>
                              </a>
                              <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                  <form action="#" class="searchbox p-2">
                                      <div class="form-group mb-0 position-relative">
                                      <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                      <a href="#" class="search-link"><i class="las la-search"></i></a> 
                                      </div>
                                  </form>
                              </div>
                          </li>                
                          <li class="nav-item nav-icon dropdown">
                              <a href="admin/mesajlar" class="search-toggle dropdown-toggle" >
                              <i class="ri-mail-line  bg-orange p-2 rounded-small"></i>
                              <span class="bg-primary"></span>
                              </a>
                           
                          </li>
                          <li class="nav-item nav-icon dropdown"> 
                              <a href="admin/cikis-yap" class="search-toggle dropdown-toggle" >
                              <i class="fas fa-sign-out-alt bg-info p-2 rounded-small" aria-hidden="true"></i>

                              <span class="bg-primary "></span>
                              </a>
                          </li>                  
                          <li class="nav-item iq-full-screen"><a class="" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a></li>
                          <li class="caption-content">
                              <a class="iq-user-toggle">
                                  <img src="../assets/images/user/1.jpg" class="img-fluid rounded" alt="user">
                              </a>
                              <div class="iq-user-dropdown">
                                  <div class="card">
                                      <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                      <div class="header-title">
                                          <h4 class="card-title mb-0">Profilim</h4>
                                      </div>
                                      <div class="close-data text-right badge badge-primary cursor-pointer"><i class="ri-close-fill"></i></div>
                                      </div>
                                      <div class="data-scrollbar" data-scroll="2">
                                      <div class="card-body">
                                          <div class="profile-header">
                                              <div class="cover-container ">
                                                  <div class="media align-items-center mb-4">
                                                      <img src="../assets/images/user/1.jpg" alt="profile-bg" class="rounded img-fluid avatar-80">
                                                      <div class="media-body profile-detail ml-3 rtl-mr-3 rtl-ml-0">
                                                          <h3><?php echo $user["name"]?></h3>
                                                          <div class="d-flex flex-wrap">
                                                              <p class="mb-1">Aktif </p><a href="/admin/cikis-yap" class=" ml-3 rtl-mr-3 rtl-ml-0">Çıkış Yap</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  
                                              </div>
                                              <div class="row">
                                                  <div class="col-lg-6 col-md-6  col-6 pr-0">
                                                      <div class="profile-details text-center">
                                                          <a href="admin/yonetici_detay/<?php echo $user['client_id']?>" class="iq-sub-card bg-primary-light rounded-small p-2"> 
                                                              <div class="rounded iq-card-icon-small">
                                                                  <i class="ri-file-user-line"></i>
                                                              </div>
                                                              <h6 class="mb-0 ">Profilim</h6>
                                                          </a>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-6  col-md-6 col-6">
                                                      <div class="profile-details text-center">
                                                          <a href="admin/yonetici_detay/<?php echo $user['client_id']?>" class="iq-sub-card bg-danger-light rounded-small p-2">
                                                              <div class="rounded iq-card-icon-small">
                                                                  <i class="ri-profile-line"></i>
                                                              </div>
                                                              <h6 class="mb-0 ">Profilimi Düzenle</h6>
                                                          </a>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-6 col-md-6  col-6 pr-0">
                                                      <div class="profile-details text-center">
                                                      <a href="admin/yonetici" class="iq-sub-card bg-success-light rounded-small p-2">
                                                              <div class="rounded iq-card-icon-small">
                                                                  <i class="ri-account-box-line"></i>
                                                              </div>
                                                              <h6 class="mb-0 ">Yöneticiler</h6>
                                                          </a>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-6 col-md-6  col-6">
                                                      <div class="profile-details text-center">
                                                          <a href="admin/yonetici_ekle" class="iq-sub-card bg-info-light rounded-small p-2">
                                                              <div class="rounded iq-card-icon-small">
                                                              <i class="ri-lock-line"></i>
                                                              </div>
                                                              <h6 class="mb-0 ">Yönetici Ekle</h6>
                                                          </a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="p-3"></div>
                                      </div>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          </ul>                     
                      </div> 
                  </div>
              </nav>
          </div>
      </div>
    </div>  
