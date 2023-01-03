<?php

$sliderList = $conn->prepare("SELECT * FROM slider ORDER BY slider_sid ASC ");
$sliderList->execute(array());
$sliderList = $sliderList->fetchAll(PDO::FETCH_ASSOC);

$commentList = $conn->prepare("SELECT * FROM comments ");
$commentList->execute(array());
$commentList = $commentList->fetchAll(PDO::FETCH_ASSOC);

$referenceList = $conn->prepare("SELECT * FROM reference ");
$referenceList->execute(array());
$referenceList = $referenceList->fetchAll(PDO::FETCH_ASSOC);
