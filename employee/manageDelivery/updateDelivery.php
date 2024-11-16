<?php
// Connect to your database
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

if (isset($_POST['orderId']) && isset($_POST['paymentId']) && isset($_POST['paymentMethod']) && isset($_POST['deliveryId'])) {
  $orderId = $_POST['orderId'];
  $paymentId = $_POST['paymentId'];
  $paymentMethod = $_POST['paymentMethod'];
  $deliveryId = $_POST['deliveryId'];
}

echo "1.$paymentId 2.$deliveryId";

$paymentSQL = "UPDATE payment SET paymentMethod = '$paymentMethod', paymentStatus = 'ชำระเงินเสร็จสิ้น' WHERE paymentId = '$paymentId'";

$deliverySQL = "UPDATE delivery SET deliveryStatus = 'จัดส่งเสร็จสิ้น' WHERE deliveryId = '$deliveryId'";

$orderSQL = "UPDATE orders SET orderStatus = 'เสร็จสิ้นออเดอร์', orderDateTime = datetime('now') WHERE orderId = '$orderId'";

if (($db->exec($paymentSQL) === TRUE) && ($db->exec($deliverySQL) === TRUE) && ($db->exec($orderSQL) === TRUE)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $db->lastErrorMsg();
}

$db->close();
?>
