<?php
// Connect to the database (Replace 'your_db_host', 'your_db_username', 'your_db_password', and 'your_db_name' with your actual database credentials)
$mysqli = new mysqli('127.0.0.1', 'root', '', 'blandine');
// Check connection
if ($mysqli->connect_errno) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

// Fetch invoice data from the database
$sql = "SELECT * FROM invoices";
$result = $mysqli->query($sql);

// Check if data was fetched successfully
if ($result) {
    $invoices = array();
    while ($row = $result->fetch_assoc()) {
        $invoices[] = $row;
    }
    echo json_encode($invoices);
} else {
    echo 'Error: Unable to fetch data';
}

// Close the database connection
header('Content-Type: application/json');
$mysqli->close();
?>
