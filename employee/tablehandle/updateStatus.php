<?php
// Connect to your SQLite database
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
$tableName = $_POST['tableName'];

// Update table status
$sql = "UPDATE tabletype SET tableTypeStatus = 'ไม่ว่าง' WHERE tableTypeId = '$tableName'";
$db->exec($sql);

// Insert new order
$orderSQL = "INSERT INTO orders (tableId, orderDateTime, orderStatus) VALUES ('$tableName', datetime('now'), 'กำลังสั่งอาหาร')";
$db->exec($orderSQL);
$orderId = $db->lastInsertRowID();

// Insert payment information
$paymentSQL = "INSERT INTO payment (orderId, amountMoney, paymentStatus) VALUES ($orderId, 0, 'กำลังชำระเงิน')";
$db->exec($paymentSQL);

// Close the database connection
$db->close();

echo $orderId;
?>
