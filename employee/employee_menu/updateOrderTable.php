<?php
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

if (isset($_POST['tableId'])) {
    $tableId = intval($_POST['tableId']);
}

$tableOrder = "SELECT orderId FROM orders WHERE tableId = $tableId AND orderStatus != 'เสร็จสิ้น' ORDER BY orderDateTime DESC LIMIT 1";
$resultTableOrder = $db->query($tableOrder);

if ($resultTableOrder) {
    $row = $resultTableOrder->fetchArray(SQLITE3_ASSOC);
    $orderId = $row['orderId'];
}

if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {
    foreach ($_SESSION['basket'] as $index => $item) {
        $menuId = $item['menuId'];
        $menuQuantity = $item['menuQuantity'];

        $menuSQL = "INSERT INTO orderDetail (orderId, menuId, menuQuantity, menuStatus) VALUES ($orderId, $menuId, $menuQuantity, 'ได้รับเมนู')";
        $db->exec($menuSQL);
    }
}

session_unset();
session_destroy();

$db->close();
?>
