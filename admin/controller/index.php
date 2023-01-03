<?php

$order = countRow(['table' => 'orders', 'where' => ['payment_status' => 2] ]);

$ticket = $conn->prepare('SELECT ticket_date FROM tickets ORDER BY ticket_id DESC LIMIT 1');
$ticket->execute(array());
$ticket = $ticket->fetchAll(PDO::FETCH_ASSOC);

$orders = $conn->prepare('SELECT * FROM orders WHERE payment_status=:status ORDER BY order_id DESC LIMIT 10');
$orders->execute(array("status"=>2));
$orders = $orders->fetchAll(PDO::FETCH_ASSOC);

$ordersX = $conn->prepare('SELECT * FROM orders WHERE payment_status=:status ORDER BY order_id DESC LIMIT 1');
$ordersX->execute(array("status"=>2));
$ordersX = $ordersX->fetchAll(PDO::FETCH_ASSOC);

$payments = $conn->prepare("SELECT SUM(order_amount) FROM orders WHERE payment_status='2' ");
$payments -> execute();
$payments = $payments->fetch(PDO::FETCH_ASSOC);
$total_payment = round($payments['SUM(order_amount)']);

$product       = countRow(['table' => 'products' ]);

require admin_view('index');
