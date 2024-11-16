<?php
// Connect to your database
class MyDB extends SQLite3 {
  function __construct() {
     $this->open('../test.db');
  }
}

// 2. Open Database
$db = new MyDB();
if(!$db) {
  echo $db->lastErrorMsg();
}

if (isset($_POST['orderId']) && isset($_POST['menuId']) && isset($_POST['menuStatus'])) {
  // Retrieve the values of orderId, menuId, and menuStatus
  $orderId = $_POST['orderId'];
  $menuId = $_POST['menuId'];
  $menuStatus = $_POST['menuStatus'];
  // Use the values as needed
}


if ($menuStatus === 'ได้รับเมนู') {
  $menuStatusUpdate = 'กำลังทำเมนู';
} else if ($menuStatus === 'กำลังทำเมนู') {
  $menuStatusUpdate = 'เสร็จสิ้นเมนู';
}

echo "1.$orderId, 2.$menuId, 3.$menuStatus";
// Perform the update operation
$sql = "UPDATE orderDetail SET menuStatus = '$menuStatusUpdate' WHERE orderId = '$orderId' AND menuId = '$menuId'";

if ($db->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $db->error;
}

// Close the database connection
$db->close();
?>
