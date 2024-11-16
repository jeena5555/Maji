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
 } else {
    echo "Opened database successfully<br>";
 }


if (isset($_POST['orderId'])) {
    $orderId = $_POST['orderId'];
}


echo "1.$orderId";

$cancelSQL = "SELECT
deliveryId
FROM orders
WHERE orderId = $orderId
";

$ret = $db->query($cancelSQL);
if ($ret->numColumns() > 0) {
    $ordersDetailRow = $ret->fetchArray(SQLITE3_ASSOC);

    //status
    $deliveryId = $ordersDetailRow['deliveryId'];
}

$orderSQL = "UPDATE orders SET orderStatus = 'ยกเลิกออเดอร์', orderDateTime = NOW() WHERE orderId = $orderId";

if ($deliveryId !== null) {
    $deliverySQL = "UPDATE delivery SET deliveryStatus = 'ยกเลิกออเดอร์' WHERE deliveryId = $deliveryId";
}

$paymentSQL = "UPDATE payment SET paymentStatus = 'ยกเลิก' WHERE orderId = $orderId";

if (($db->query($paymentSQL) === TRUE  && ($db->query($orderSQL) === TRUE))) {
    if (($db->query($deliverySQL) === TRUE)){
        echo "Record updated successfully";
    }
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$ret->close();
?>
