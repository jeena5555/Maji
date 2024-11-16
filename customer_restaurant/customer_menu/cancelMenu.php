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


if (isset($_POST['orderId']) && isset($_POST['menuId'])) {
    $orderId = $_POST['orderId'];
    $menuId = $_POST['menuId'];
}


echo "1.$orderId 2.$menuId";

$cancelMenuSQL = "UPDATE orderdetail SET menuStatus = 'ยกเลิกเมนู' WHERE orderId =$orderId AND menuId =$menuId";

if ($db->query($cancelMenuSQL) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $db->error;
}

$db->close();


?>
