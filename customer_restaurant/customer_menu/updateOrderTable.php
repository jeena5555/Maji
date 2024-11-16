<?php
session_start();
class MyDB extends SQLite3 {
    function __construct() {
        $this->open('../../test.db');
    }
}

// Open SQLite database
$db = new MyDB();
if (!$db) {
    echo $db->lastErrorMsg();
    // Handle the error as needed
}

if (isset($_POST['tableId']) && isset($_POST['orderId'])) {
    $tableId = $_POST['tableId'];
    $orderId = intval($_POST['orderId']);
}

if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {

    foreach ($_SESSION['basket'] as $index => $item) {
        $menuId = $item['menuId'];
        $menuQuantity = $item['menuQuantity'];

        $menuSQL = "INSERT INTO orderDetail (orderId, menuId, menuQuantity, menuStatus) VALUES ($orderId, $menuId, $menuQuantity, 'ได้รับเมนู')";
        $db->query($menuSQL);
    }
}

// Clear session
session_unset();
session_destroy();

// Close SQLite database connection
$db->close();
?>
