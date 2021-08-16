<?php
session_start();
include '../header.php';
include '../seasson.php';
include '../components/clubNavbar.component.php';

$clubID = $_SESSION['id'];
$idPlayer1 = $idPlayer2 = 0;

$result1 = $conn->query(
    'SELECT match_id, start_time, end_time, player1ID, player2ID from matches'
);

$name1 = '';
$surname1 = '';
$name2 = '';
$surname2 = '';
?>


<label>Matches in the club:</label>
<table class="table thead-light">
<thead class="thead-light"><td>Start date</td><td>Start time</td><td>End date</td><td>End time</td><td>Player 1</td><td>Player 2</td></thead>
    <?php while ($rows1 = $result1->fetch_assoc()) {
        $idPlayer1 = $rows1['player1ID'];
        $idPlayer2 = $rows1['player2ID'];
        $mID = $rows1['match_id'];
        $startD = explode('T', $rows1['start_time'])[0];
        $startT = explode('T', $rows1['start_time'])[1];
        $endD = explode('T', $rows1['end_time'])[0];
        $endT = explode('T', $rows1['end_time'])[1];
        echo '<tr>';
        echo "<td>$startD</td>";
        echo "<td>$startT</td>";
        echo "<td>$endD</td>";
        echo "<td>$endT</td>";

        $p1 = $conn->query(
            "SELECT player_id, name, surname, club_id from player where club_id = '$clubID' and player_id = '$idPlayer1';          "
        );
        $p2 = $conn->query("SELECT player_id, name, surname, club_id from player where club_id = '$clubID' and player_id = '$idPlayer2';  
        ");
        while ($rows0 = $p1->fetch_assoc()) {
            $name1 = $rows0['name'];
            $surname1 = $rows0['surname'];
        }
        while ($rows0 = $p2->fetch_assoc()) {
            $name2 = $rows0['name'];
            $surname2 = $rows0['surname'];
        }
        echo "<td>$name1 $surname1</td>";
        echo "<td>$name2 $surname2</td>";
        echo '</tr>';
    } ?>
</table>
<br>
<label>Club Participants: </label>
<table class="table">
<thead class="thead-light"><td>Participant id</td><td>Name</td><td>Surname</td></thead>

    <?php
    $players = $conn->query(
        "SELECT player_id, name, surname, club_id from player where club_id = '$clubID';"
    );
    while ($row = $players->fetch_assoc()) {
        $pid = $row['player_id'];
        $name = $row['name'];
        $surname = $row['surname'];
        echo '<tr>';
        echo "<td>$pid</td>";
        echo "<td>$name</td>";
        echo "<td>$surname</td>";
        echo '</tr>';
    }
    ?>
</table>
</body>
</html>