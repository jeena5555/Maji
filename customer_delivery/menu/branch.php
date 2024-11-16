<?php

session_start();

if (isset($_SESSION['custId'])) {
    $custId = $_SESSION['custId'];
}

class MyDB extends SQLite3 {
    function __construct() {
       $this->open('../../test.db');
    }
 }

 // 2. Open Database
 $db = new MyDB();
 if(!$db) {
    echo $db->lastErrorMsg();
 } else {
    echo "Opened database successfully<br>";
 }

if ((isset($_POST['paymentMethod']) && (isset($_POST['amountMoney'])))) {
    $paymentMethod = $_POST['paymentMethod'];
    $amountMoney = $_POST['amountMoney'];
}


$takeawaySQL = "INSERT INTO takeaway(takeawayBranch) VALUES ('ลาดกระบัง')";
$db->query($takeawaySQL);
$takeawayId = $db->lastInsertRowID();

$createOrder = "INSERT INTO orders(takeawayId, orderDateTime, orderStatus, custId) VALUES ($takeawayId, datetime('now'), 'ได้รับออเดอร์', 2)";
$db->query($createOrder);
$orderId = $db->lastInsertRowID();

if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {

    foreach ($_SESSION['basket'] as $index => $item) {
        $menuId = $item['menuId'];
        $menuQuantity = $item['menuQuantity'];

        $menuSQL = "INSERT INTO orderDetail (orderId, menuId, menuQuantity, menuStatus) VALUES ($orderId, $menuId, $menuQuantity, 'ได้รับเมนู')";
        $db->query($menuSQL);
    }

    unset($_SESSION['basket']);
}

$payment = "INSERT INTO payment(orderId, promotionId, amountMoney, paymentMethod, paymentDateTime, paymentStatus) VALUES ($orderId, 1, $amountMoney, '$paymentMethod', datetime('now'), 'ชำระเงินเสร็จสิ้น')";
$db->query($payment);



$db->close();

?>
