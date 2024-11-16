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

if (isset($_POST['location']) && isset($_POST['tel']) && isset($_POST['name']) && isset($_POST['paymentMethod']) && isset($_POST['amountMoney'])) {
    $location = $_POST['location'];
    $tel = $_POST['tel'];
    $name = $_POST['name'];
    $paymentMethod = $_POST['paymentMethod'];
    $amountMoney = $_POST['amountMoney'];
}


$deliverySQL = "INSERT INTO delivery(deliveryName, deliveryPhone, deliveryStatus, latlong) VALUES ('$name', '$tel', 'กำลังจัดการออเดอร์', '$location')";
$db->query($deliverySQL);
$deliveryId = $db->lastInsertRowID();

$createOrder = "INSERT INTO orders(deliveryId, orderDateTime, orderStatus, custId) VALUES ($deliveryId, datetime('now'), 'ได้รับออเดอร์', 2)";
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
