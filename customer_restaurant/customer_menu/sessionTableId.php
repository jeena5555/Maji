<?php

// Start the session
session_start();

class MyDB extends SQLite3 {
    function __construct() {
       $this->open('../../test.db');
    }
}

// 2. Open Database
$db = new MyDB();
if (!$db) {
    echo $db->lastErrorMsg();
}

$tableId = $_POST['tableId'];

$orderSQL = "SELECT o.orderId 
            FROM orders o JOIN tabletype t 
            WHERE o.tableId = '$tableId' AND t.tableTypeStatus = 'ไม่ว่าง' AND o.orderStatus != 'เสร็จสิ้นออเดอร์' AND o.orderStatus != 'ยกเลิกออเดอร์'
            ORDER BY o.orderDateTime DESC LIMIT 1";
$orderResult = $db->query($orderSQL);

if ($orderResult) {
    $ordersRow = $orderResult->fetchArray(SQLITE3_ASSOC);
    $order = $ordersRow['orderId'];
    echo "$order, $tableId";

    $_SESSION['orderId'] = $order;

    $orderId = $_SESSION['orderId'];
}

// Close the database connection
$db->close();
?>
