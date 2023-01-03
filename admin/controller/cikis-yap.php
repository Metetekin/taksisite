<?php

  unset($_SESSION["softyr_userid"]);
  unset($_SESSION["softyr_userpass"]);
  unset($_SESSION["softyr_userlogin"]);
  setcookie("u_id", $user["client_id"], time()-(60*60*24*7), '/', null, null, true );
  setcookie("u_password", $user["password"], time()-(60*60*24*7), '/', null, null, true );
  setcookie("u_login", 'ok', time()-(60*60*24*7), '/', null, null, true );
  session_destroy();
  header("Location:".site_url('admin'));
die;