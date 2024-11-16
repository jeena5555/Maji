<?php
class MyDB extends SQLite3 {
    function __construct() {
       $this->open('../test.db');
    }
 }

 // 2. Open Database
 $db = new MyDB();


$orderId = $_POST['orderId'];
$deliveryId = $_POST['deliveryId'];

// Fetch menu statuses for the given orderId
$sql = "SELECT COUNT(*) AS totalMenus,
SUM(CASE WHEN menuStatus = 'เสร็จสิ้นเมนู' THEN 1 ELSE 0 END) AS completedMenus
FROM orderDetail
WHERE orderId = $orderId;";

$ret = $db->query($sql);

if ($ret) {
    $row = $ret->fetchArray(SQLITE3_ASSOC);

    // Check if all menus are completed
    if ($row['totalMenus'] == $row['completedMenus']) {
        // Update order status
        $updateSql = "UPDATE orders SET orderStatus = 'เสร็จสิ้นออเดอร์' WHERE orderId = '$orderId'";

        if ($deliveryId !== 0) {
            $deliverySQL = "UPDATE delivery SET deliveryStatus = 'กำลังจัดส่ง' WHERE deliveryId = '$deliveryId'";
            $db->query($deliverySQL);
        }
        
        $db->query($updateSql);
    }
}

        echo "true";
// Close the database connection
$db->close();
?>
