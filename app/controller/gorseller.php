<?php


  $title       = "Görseller - Galeri";
  $keywords    = $settings["site_keywords"];
  $description = $settings["site_description"];


$fileList = $conn->prepare("SELECT * FROM files WHERE file_type=:type");
$fileList->execute(array("type"=>2));
$fileList = $fileList->fetchAll(PDO::FETCH_ASSOC);
