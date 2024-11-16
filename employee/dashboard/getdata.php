<?php
// กำหนดข้อมูลเชื่อมต่อ SQLite
$db_file = '../../test.db'; // ระบุที่อยู่ของไฟล์ SQLite

// Create connection
$conn = new SQLite3($db_file);

// Check connection
if (!$conn) {
    die("Connection failed: Unable to connect to SQLite database");
}

// SQL query to retrieve order counts for each day of the week
$sql = "SELECT
            CASE
                WHEN strftime('%w', orderDateTime) = '0' THEN 'Sunday'
                WHEN strftime('%w', orderDateTime) = '1' THEN 'Monday'
                WHEN strftime('%w', orderDateTime) = '2' THEN 'Tuesday'
                WHEN strftime('%w', orderDateTime) = '3' THEN 'Wednesday'
                WHEN strftime('%w', orderDateTime) = '4' THEN 'Thursday'
                WHEN strftime('%w', orderDateTime) = '5' THEN 'Friday'
                WHEN strftime('%w', orderDateTime) = '6' THEN 'Saturday'
            END AS day_of_week,
            COUNT(*) AS count
        FROM
            orders
        WHERE
            strftime('%w', orderDateTime) BETWEEN '1' AND '6'
        GROUP BY
            strftime('%w', orderDateTime)";

// Run the SQL query
$result = $conn->query($sql);

// Create an array to store the data
$data = array();

// Fetch data as an associative array and add it to the array
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $data[] = $row['count'];
}

// Send data as JSON
echo json_encode($data);

// Close connection
$conn->close();
?>
