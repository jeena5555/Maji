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

if (isset($_POST['tableName']) && isset($_POST['id'])) {
    $tableName = strtoupper($_POST['tableName']);
    $id = $_POST['id'];

    $sql = "UPDATE tabletype SET tableTypeId = '$tableName' WHERE tableTypeId = '$id';";
    $result = $db->exec($sql);

    if ($result) {
        echo "<script>window.location.reload();</script>";
    } else {
        echo 
        '
            <script>alert("โปรดกรอก ตัวอักษร+(0-9)")</script>
        ';
    }
}

// Close Database
$db->close();
?>
