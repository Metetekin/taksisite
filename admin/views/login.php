<!doctype html>
<html lang="tr">
  
<head>
      <base href="<?php echo URL; ?>">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Yönetim Paneli</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="https://templates.iqonic.design/instadash/html/assets/images/favicon.ico" />
      <link rel="stylesheet" href="../assets/css/backend-plugin.min28b5.css?v=2.0.0">
      <link rel="stylesheet" href="../assets/css/backend28b5.css?v=2.0.0">

      <link rel='stylesheet' href='../assets/vendor/fullcalendar/core/main.css' />
      <link rel='stylesheet' href='../assets/vendor/fullcalendar/daygrid/main.css' />
      <link rel='stylesheet' href='../assets/vendor/fullcalendar/timegrid/main.css' />
      <link rel='stylesheet' href='../assets/vendor/fullcalendar/list/main.css' />
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    
</head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    
      <div class="wrapper">
      <section class="login-content">
         <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
               <div class="col-12">
                  <div class="row align-items-center">
                     <div class="col-lg-6">
                        <h2 class="mb-2">Giriş Yap</h2>
                        <p>Yönetim paneline erişmek için lütfen giriş yapın.</p>
                        <form  action="" method="POST">
                           <div class="row">

                            <?php if( $error ): ?>
                            <div class="col-lg-12">
                              <div class="alert alert-danger" role="alert">
                           <div class="iq-alert-icon">
                              <i class="ri-information-line"></i>
                           </div>
                           <div class="iq-alert-text"><?=$errorText?></div>
                        </div>
                              
                            </div>  
                            <?php endif; ?>
                               
                              <div class="col-lg-12">
                                 <div class="floating-label form-group">
                                    <input class="floating-input form-control" name="username" type="username" >
                                    <label>Kullanıcı adı</label>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="floating-label form-group">
                                    <input class="floating-input form-control" name="password" type="password">
                                    <label>Şifre</label>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Beni Hatırla</label>
                                 </div>
                              </div>
                              
                               <?php if(  $settings["recaptcha"] == 2 && $_SESSION["recaptcha"]  ): ?>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="<?=$settings["recaptcha_key"]?>"></div>
                                    </div>
                                </div>
                              <?php endif; ?>
                              
                           </div>
                           <button type="submit" class="btn btn-primary">Giriş Yap</button>
                        </form>
                     </div>
                     <div class="col-lg-6 mb-lg-0 mb-4 mt-lg-0 mt-4">
                        <img src="../assets/images/login/01.png" class="img-fluid w-80" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>
    
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
    <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>
    
    
    <!-- Fullcalender Javascript -->
    <script src='../assets/vendor/fullcalendar/core/main.js'></script>
    <script src='../assets/vendor/fullcalendar/daygrid/main.js'></script>
    <script src='../assets/vendor/fullcalendar/timegrid/main.js'></script>
    <script src='../assets/vendor/fullcalendar/list/main.js'></script>

    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>
  </body>

</html>