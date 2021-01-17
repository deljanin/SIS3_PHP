<?php                                                       //CHANGE THE FOLLOWING WHEN MOVING TO SERVER ON FACULTY!!! VVVV
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "tennis_is_db";
    $urlroot = 'http://localhost/neki/';
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    ?>     