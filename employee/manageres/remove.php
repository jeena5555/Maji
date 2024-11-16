<?php
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

if (isset($_POST['tableName'])) {
    $tableName = $_POST['tableName'];

    // SQLite3 does not use the traditional MySQLi functions
    // You need to use the SQLite3 methods for executing queries

    $sql = "DELETE FROM tabletype WHERE tableTypeId = '$tableName'";

    $result = $db->exec($sql);

    if ($result) {
        echo "<script>window.location.reload();</script>";
    } else {
        echo "Error deleting record: " . $db->lastErrorMsg();
    }
}

// Close SQLite3 connection
$db->close();
?>
