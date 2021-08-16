<?php //CHANGE THE FOLLOWING WHEN MOVING TO SERVER ON FACULTY!!! VVVV
$servername = '';
$username = 'codeigniter';
$password = 'codeigniter2019';
$db_name = 'SISIII2021_89191004';
//$urlroot = 'https://www.studenti.famnit.upr.si/~89191004/SISIII2021';
// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>     