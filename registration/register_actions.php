<?php session_start();
include '../seasson.php';
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action_name = $_POST['action_name'];
    $action_time = $_POST['action_time'];
    $pointWon = $_POST['pointWon'];
    $matchID = $_POST['matchID'];
    $pid = $_SESSION['id'];
    if ($pointWon != 'true') {
        $point = 0;
    } else {
        $point = 1;
    }
    echo $action_name . ' ' . $action_time . ' ' . $pointWon . ' ' . $matchID;
    $sql = "INSERT INTO action(action_name, action_time, match_id, player_id, pointwon) VALUES ('$action_name', '$action_time', $matchID, $pid, $point)";
    echo $sql;
    if ($result = mysqli_query($conn, $sql)) {
        echo 'IT WORK';
    }
    header('Location: ../pages/match.php');
}

?>
