<?php

class MyDB extends SQLite3 {
    function __construct() {
       $this->open('../../test.db');
    }
 }

 // 2. Open Database
 $db = new MyDB();
 if(!$db) {
    echo $db->lastErrorMsg();
 }

session_start();

if (isset($_POST['custId']) && isset($_POST['paymentMethod']) && isset($_POST['amountMoney'])) {
    $custId = intval($_POST['custId']);
    $paymentMethod = $_POST['paymentMethod'];
    $amountMoney = intval($_POST['amountMoney']);
}

$takeawaySQL = "INSERT INTO takeaway (takeawayName, takeawayPhone, takeawayBranch) VALUES ('', '', 'ลาดกระบัง')";
$db->query($takeawaySQL);

$takeawayId = $db->lastInsertRowID();

echo "1. $custId 2. $paymentMethod 3. $amountMoney 4.$takeawayId";

if ($custId === 0) {
    $orderSQL = "INSERT INTO orders (takeawayId, orderDateTime, orderStatus) VALUES ($takeawayId, datetime('now'), 'ได้รับออเดอร์')";
    $db->query($orderSQL);
    $orderId = $db->lastInsertRowID();
    $paymentSQL = "INSERT INTO payment (orderId, amountMoney, paymentMethod, paymentDateTime, paymentStatus) VALUES ($orderId, $amountMoney, '$paymentMethod', datetime('now'), 'ชำระเงินเสร็จสิ้น')";
} else {
    $orderSQL = "INSERT INTO orders (takeawayId, orderDateTime, orderStatus, custId) VALUES ($takeawayId, datetime('now'), 'ได้รับออเดอร์', $custId)";
    $db->query($orderSQL);
    $orderId = $db->lastInsertRowID();
    $paymentSQL = "INSERT INTO payment (orderId, promotionId, amountMoney, paymentMethod, paymentDateTime, paymentStatus) VALUES ($orderId, 1, $amountMoney, '$paymentMethod', datetime('now'), 'ชำระเงินเสร็จสิ้น')";
}

if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {

    foreach ($_SESSION['basket'] as $index => $item) {
        $menuId = $item['menuId'];
        $menuQuantity = $item['menuQuantity'];

        $menuSQL = "INSERT INTO orderDetail (orderId, menuId, menuQuantity, menuStatus) VALUES ($orderId, $menuId, $menuQuantity, 'ได้รับเมนู')";
        $db->query($menuSQL);
    }
}

$db->query($paymentSQL);

session_unset();
session_destroy();

$db->close();

?>
