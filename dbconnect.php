<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Prac_9";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->close();
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$table_creation_query = "CREATE TABLE IF NOT EXISTS complaints (
    Customer_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Customer_name VARCHAR(30) NOT NULL,
    Contact_number VARCHAR(15) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Address_v VARCHAR(100) NOT NULL,
    Order_date DATE NOT NULL,
    Product VARCHAR(50) NOT NULL,
    Quantity INT(11) NOT NULL
)";
$conn->query($table_creation_query);
?>