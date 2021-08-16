<?php session_start();
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $_SESSION['id'];
    echo ' ' . $_POST['oponent'];
    echo ' ' . $_POST['match'];
}

?>
