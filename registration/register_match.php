<?php include '../conn.php';
$player1ID;
$player2ID;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $player1ID = $_POST['player1'];
    $player2ID = $_POST['player2'];
    $timeStart = $_POST['timeStart'];
    $timeEnd = $_POST['timeEnd'];
    $playerTeam = "INSERT INTO matches(start_time, end_time, player1ID, player2ID) VALUES ('$timeStart', '$timeEnd', '$player1ID', '$player2ID');";
    if ($result = mysqli_query($conn, $playerTeam)) {
        echo $result;
        header('location: ../pages/club.php');
    }
} else {
    echo 'Oops! Something went wrong. Please try again later.';
}

?>
