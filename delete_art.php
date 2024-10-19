<?php
include 'config.php';
include 'header.php';
session_start();

if (isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];
if ($conn->query("DELETE FROM art WHERE id='$id'")) {
    header('Location: index.php');
} else {
    echo "Error: " . $conn->error;
}
?>
