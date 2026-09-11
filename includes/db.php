<?php

$servername = "sql212.infinityfree.com";
$username = "if0_42890633";
$password = "YOUR_VPANEL_PASSWORD";
$dbname = "if0_42890633_library";

try {

    $conn = new PDO(
        "mysql:host=$servername;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    die("Connection failed: " . $e->getMessage());

}

?>
