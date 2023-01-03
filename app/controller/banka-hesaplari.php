<?php

  $title       = "Banka Hesaplarımız";
  $keywords    = $settings["site_keywords"];
  $description = $settings["site_description"];

  $bankAccounts = $conn->prepare("SELECT * FROM bank_accounts ");
  $bankAccounts-> execute(array());
  $bankAccounts = $bankAccounts->fetchAll(PDO::FETCH_ASSOC);