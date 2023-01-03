<?php

function admin_controller($controllerName){
  $controllerName = strtolower($controllerName);
  return PATH.'/admin/controller/'.$controllerName.'.php';
}

function admin_view($viewName){
  $viewName = strtolower($viewName);
  return PATH.'/admin/views/'.$viewName.'.php';
}

function cURL($value){ 
        $ch = curl_init($value);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
        return $result;
}
