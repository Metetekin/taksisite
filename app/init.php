<?php

session_start();
ob_start();

$config = require __DIR__.'/config.php';

try {
  $conn = new PDO("mysql:host=".$config["db"]["host"].";dbname=".$config["db"]["name"].";charset=".$config["db"]["charset"].";", $config["db"]["user"], $config["db"]["pass"] );
} catch (PDOException $e) {
  die($e->getMessage());
}

if( $_COOKIE["u_id"] && $_COOKIE["u_login"] && $_COOKIE["u_password"] ):

  $row      = $conn->prepare("SELECT * FROM clients WHERE client_id=:id");
  $row      ->execute(array("id"=>$_COOKIE["u_id"] ));
  $row      = $row->fetch(PDO::FETCH_ASSOC);
  $access   = json_decode($row["access"],true);
  $password = $row["password"];

  if( @$_COOKIE["u_password"] == $password ):
    $_SESSION["softyr_userlogin"]      = 1;
    $_SESSION["softyr_userid"]         = $row["client_id"];
    $_SESSION["softyr_userpass"]       = $row["password"];
      if( $access["admin_access"] ):
        $_SESSION["softyr_adminlogin"] = 1;
      endif;
  else:
    unset($_SESSION["softyr_userlogin"]);
    unset($_SESSION["softyr_userid"]);
    unset($_SESSION["softyr_userpass"]);
    unset($_SESSION["softyr_adminlogin"]);
    unset($_SESSION);
    setcookie("u_id", $row["client_id"], time()-(60*60*24*7), '/', null, null, true );
    setcookie("u_password", $row["password"], time()-(60*60*24*7), '/', null, null, true );
    setcookie("u_login", 'ok', time()-(60*60*24*7), '/', null, null, true );
    session_destroy();
  endif;

endif;

$settings = $conn->prepare("SELECT * FROM settings WHERE id=:id");
$settings->execute(array("id"=>1));
$settings = $settings->fetch(PDO::FETCH_ASSOC);


$loader   = new Twig_Loader_Filesystem(__DIR__.'/views');
$twig     = new Twig_Environment($loader, ['autoescape' => false]);

$user = $conn->prepare("SELECT * FROM clients WHERE client_id=:id");
$user->execute(array("id"=>$_SESSION["softyr_userid"] ));
$user = $user->fetch(PDO::FETCH_ASSOC);
$user['auth']     = $_SESSION["softyr_userlogin"];
$user["access"]   = json_decode($user["access"],true);

foreach ( glob(__DIR__.'/helper/*.php') as $helper ) {
  require $helper;
}

foreach ( glob(__DIR__.'/classes/*.php') as $class ) {
  require $class;
}

