<?php

// Connect to your SQLite database
class MyDB extends SQLite3 {
    function __construct() {
        $this->open('../test.db');
    }
}

// 2. Open Database
$db = new MyDB();
if (!$db) {
    echo $db->lastErrorMsg();
}

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phone'])) {
    // Retrieve the values of orderId, menuId, and menuStatus
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM account WHERE accountEmail = '$email'";
    $result = $db->query($checkEmailQuery);

    if ($result->fetchArray(SQLITE3_ASSOC)) {
        echo "อีเมลเคยถูกใช้ไปแล้ว";
    } else {
        // Insert into account table
        $accountSQL = "INSERT INTO account (accountEmail, accountPassword) VALUES ('$email', '$password')";

        if ($db->exec($accountSQL)) {
            // Get the last inserted row ID
            $accountId = $db->lastInsertRowID();

            // Insert into customer table with the obtained accountId
            $customerSQL = "INSERT INTO customer (custName, custSurname, custPhone, accountId) VALUES ('$firstname', '$lastname', '$phone', $accountId)";

            if ($db->exec($customerSQL)) {
                echo "ลงทะเบียนเรียบร้อย";
            } else {
                echo "Error: " . $customerSQL . "<br>" . $db->lastErrorMsg();
            }
        } else {
            echo "Error: " . $accountSQL . "<br>" . $db->lastErrorMsg();
        }
    }
}

// Close the database connection
$db->close();

?>
