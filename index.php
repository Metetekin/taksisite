<?php
require __DIR__.'/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer;
require __DIR__.'/app/init.php';


$auto_refill = $conn->prepare("ALTER TABLE settings ADD custom_meta TEXT");
$auto_refill  -> execute(array());

$first_route  = explode('?',$_SERVER["REQUEST_URI"]);
$gets         = explode('&',$first_route[1]);
  foreach ($gets as $get) {
    $get = explode('=',$get);
    $_GET[$get[0]]  = $get[1];
  }
$routes       = array_filter( explode('/',$first_route[0]) );

foreach ($routes as $index => $value):
  $route[$index-1] = $value;
endforeach;

  if( !isset($route[0]) ){
    $route[0] = "home";
    $routeType= 0;
  }else{
    $routeType= 0;
  }


  if( !file_exists( controller($route[0]) ) ){
    $route[0] = "404";
  }

  $title  = $settings["site_title"];

  require controller($route[0]);

  if( $settings["recaptcha"] == 1 ){
    $captcha = false;
  }elseif( $settings["recaptcha"] == 2 ){
    $captcha = true;
  }


 $captchaKey =  $settings["recaptcha_key"];
  $active_menu = route(0); 
  $active_menu2 = route(1); 

  if( route(0) != "admin" ){
    if( !$templateDir ){
      $templateDir = route($routeType);
    }
 
    $contentGet = $templateDir;

    $content  = $conn->prepare("SELECT * FROM pages WHERE page_get=:get ");
    $content->execute(array("get"=>$contentGet));
    $content  = $content->fetch(PDO::FETCH_ASSOC);
    $content  = $content["page_content"];
    
    $serviceList = $conn->prepare("SELECT * FROM pages WHERE page_type=:type ");
    $serviceList->execute(array("type"=>1));
    $serviceList = $serviceList->fetchAll(PDO::FETCH_ASSOC);
    
    $pageList = $conn->prepare("SELECT * FROM pages WHERE page_type=:type");
    $pageList->execute(array("type"=>2));
    $pageList = $pageList->fetchAll(PDO::FETCH_ASSOC);
    
    $categoryList = $conn->prepare("SELECT * FROM categories ");
    $categoryList->execute(array());
    $categoryList = $categoryList->fetchAll(PDO::FETCH_ASSOC);
    
    $blogList = $conn->prepare("SELECT * FROM pages WHERE page_type=:type ");
    $blogList->execute(array("type"=>3));
    $blogList = $blogList->fetchAll(PDO::FETCH_ASSOC);
    
    echo $twig->render( $templateDir.'.twig',
      array(
            'site'=>[
                      'url'=>URL,'favicon'=>$settings['favicon'],"logo"=>$settings["site_logo"],"site_name"=>$settings["site_name"],
                      'service_speed'=>$settings["service_speed"],"keywords"=>$settings["site_keywords"],
                      "description"=>$settings["site_description"],'languages'=>$languagesL
                    ],
    'description'=>$description , 'keywords'=>$keywords, 'active_menu'=>$active_menu,  'active_menu2'=>$active_menu2,    'bankAccounts'=>$bankAccounts,  'captcha'=>$captcha, 'captchaKey'=>$captchaKey, 'errorText'=>$errorText,'successText'=>$successText,'paymentsList'=>$paymentsList, 'product'=>$product,'fileList'=>$fileList, 'title'=>$title, 'keywords'=>$keywords, 'description'=>$description , 'sliderList'=>$sliderList,'serviceList'=>$serviceList,'commentList'=>$commentList,'blogList'=>$blogList,'referenceList'=>$referenceList,'settings'=>$settings,'categoryList'=>$categoryList,'pageList'=>$pageList,'page'=>$page,'category'=>$category,'productList'=>$productList,'currency'=>currency($settings["site_currency"])
      )
    );
  }
