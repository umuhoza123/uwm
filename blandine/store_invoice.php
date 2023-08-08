<?php
// Connect to the database (Replace 'your_db_host', 'your_db_username', 'your_db_password', and 'your_db_name' with your actual database credentials)
$mysqli = new mysqli('127.0.0.1', 'root', '', 'blandine');

// Check connection
if ($mysqli->connect_errno) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and retrieve form data
    $name = $mysqli->real_escape_string($_POST['name']);
    $month_paid_for = $mysqli->real_escape_string($_POST['month_paid_for']);
    $current_month_invoice = $mysqli->real_escape_string($_POST['current_month_invoice']);
    $fine_fees = $mysqli->real_escape_string($_POST['fine_fees']);
    $total_amount = $mysqli->real_escape_string($_POST['total_amount']);

    // Insert data into the database
    $sql = "INSERT INTO `invoices`(`names`, `paid_month`, `monthly`, `fines`, `total_pay`) VALUES ('$name', '$month_paid_for', '$current_month_invoice', '$fine_fees', '$total_amount')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Invoice information stored successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    // Close the database connection
    $mysqli->close();
}
?>
