<?php

// Start the session
session_start();

// Connect to your SQLite database
class MyDB extends SQLite3 {
    function __construct() {
       $this->open('test.db');
    }
}

// 2. Open Database
$db = new MyDB();
if(!$db) {
    echo $db->lastErrorMsg();
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $checkEmailQuery = "SELECT accountId, role FROM account WHERE accountEmail = :email AND accountPassword = :password";
    $stmt = $db->prepare($checkEmailQuery);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':password', $password, SQLITE3_TEXT);

    // Execute the query
    $result = $stmt->execute();

    // Check if the email and password combination exists in the database
    $row = $result->fetchArray(SQLITE3_ASSOC);
    if ($row) {
        // Fetch the accountId from the result set
        $accountId = $row['accountId'];
        $accountrole = $row['role'];

        // Store accountId in the session
        $_SESSION['accountId'] = $accountId;

        if ($accountrole === 'chef') {
            echo "chef";
        } else if ($accountrole === 'employee') {
            echo "employee";
        } else {
            echo "customer";
        }

    } else {
        echo "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$db->close();

?>
