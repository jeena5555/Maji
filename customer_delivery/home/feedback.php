<?php
$dbPath = "../../maji.db";

try {
    $db = new SQLite3($dbPath);

    if (isset($_POST['feedbackText'])) {
        $feedbackText = $_POST['feedbackText'];

        $pattern = "/แตด|หี|เหี้ย|สัส|ควย|มึง/";

        if (preg_match($pattern, $feedbackText)) {
            echo "<script>alert('ข้อความมีคำหยาบ กรุณากรอกข้อความใหม่');</script>";
        } else {
            // Prepare SQL statement
            $sql = "INSERT INTO feedback (content) VALUES (:feedbackText)";
            $stmt = $db->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':feedbackText', $feedbackText);

            // Execute the statement
            $result = $stmt->execute();

            if ($result) {
                echo "<script>window.location.reload();</script>";
            } else {
                echo "Error inserting record.";
            }
        }
    }
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
