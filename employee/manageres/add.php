<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['tablesize'])) {
        $tableName = strtoupper($_POST['name']);
        $tableSize = $_POST['tablesize'];

        $sqlforadd = "INSERT INTO tabletype (tableTypeid, tableSize, tableTypeStatus) VALUES ('$tableName', '$tableSize', 'ว่าง')";
        if ($db->exec($sqlforadd)) {
            echo "<script>window.location.reload();</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดในการเพิ่มโต๊ะอาหาร');</script>";
        }
    }
}

$db->close();
?>
