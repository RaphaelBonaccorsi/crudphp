<?php 
// Create and use db
$sql = "CREATE DATABASE if not exists test;";

if ($conn->query($sql) === TRUE) {
    echo "Checked if database exists<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

$sql = "use test;";

if ($conn->query($sql) === TRUE) {
    echo "Database connected<br>";
} else {
    echo "Error opening db: " . $conn->error;
}

// Create table

$sql = "CREATE TABLE if not exists Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(32) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
if ($conn->query($sql) === TRUE) {
    echo "Checked if table Users exists<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert data into table

$sql = "INSERT INTO Users (email, pass)
VALUES ('".$email."','".$password."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();