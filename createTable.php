<?php

$servername = "localhost";
$username = "root";
$password = "";


$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


/*$query = "CREATE DATABASE imageupload";
if (mysqli_query($conn, $query)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
*/

mysqli_select_db($conn,"imageupload");

$query = "CREATE TABLE imageurl (
url VARCHAR(100) NOT NULL)";

if (mysqli_query($conn, $query)) {
    echo " Table created successfully";
} else {
    echo " Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);