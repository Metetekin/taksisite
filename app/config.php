<?php

define('PATH', realpath('.'));
define('SUBFOLDER', false);
define('URL', 'https://taksi.sitearaci.com');

error_reporting(0);
date_default_timezone_set('Europe/Istanbul');

return [
  'db' => [
    'name'    =>  'sitearac_taksi',
    'host'    =>  'localhost',
    'user'    =>  'sitearac_taksi',
    'pass'    =>  '123emo123.',
    'charset' =>  'utf8mb4'
  ]
];
