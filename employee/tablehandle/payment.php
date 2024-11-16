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

// Get values from the POST request
$tableId = $_POST['tableId'];
$orderId = $_POST['orderId'];
$amountMoney = $_POST['amountMoney'];
$paymentMethod = $_POST['paymentMethod'];

echo "$tableId $orderId $amountMoney $paymentMethod";

$paymentSQL = "UPDATE payment SET paymentStatus = 'ชำระเงินเสร็จสิ้น', amountMoney = $amountMoney, paymentMethod = '$paymentMethod'  WHERE orderId = $orderId";
$db->query($paymentSQL);

$tableSQL = "UPDATE tabletype SET tableTypeStatus = 'ว่าง' WHERE tableTypeId = '$tableId'";
$db->query($tableSQL);

// Close the database connection
$db->close();
?>
