<?php
session_start();
include '../header.php';
include '../seasson.php';
include '../components/playerNavbar.component.php';

$result = $conn->query(
    'SELECT match_id, start_time, end_time, player1ID, player2ID from matches'
);

$name1 = '';
$surname1 = '';
$name2 = '';
$surname2 = '';
$player_ids = '';
$rows = '';
?>
<div id="matchForm" >    
    <table class="table">
    <thead class="thead-light">
        <td>Start date</td><td>Start time</td><td>End date</td><td>End time</td>
        <td>Oponent</td><td>Option</td></thead>

        <?php while ($rows = $result->fetch_assoc()) {
            $startD = explode('T', $rows['start_time'])[0];
            $startT = explode('T', $rows['start_time'])[1];
            $endD = explode('T', $rows['end_time'])[0];
            $endT = explode('T', $rows['end_time'])[1];
            $p1ID = $rows['player1ID'];
            $p2ID = $rows['player2ID'];
            $match_id = $rows['match_id'];
            if ($p1ID == $_SESSION['id']) {
                echo '<tr>';
                echo "<td>$startD</td>";
                echo "<td>$startT</td>";
                echo "<td>$endD</td>";
                echo "<td>$endT</td>";
                $p2 = $conn->query("SELECT player_id, name, surname from player where player_id = '$p2ID';  
                ");
                while ($rows0 = $p2->fetch_assoc()) {
                    $name2 = $rows0['name'];
                    $surname2 = $rows0['surname'];
                }
                echo "<td>$name2 $surname2</td>";
                echo "<td>     
                <form action='playAction.php' method='post'>
                <input type='submit' class='btn btn-primary' name='btn' value='Play'>
                <input type='hidden' value='$match_id' name='match'/>
                </form>
                </td>";
                echo '<tr>';
            } elseif ($p2ID == $_SESSION['id']) {
                echo '<tr>';
                echo "<td>$startD</td>";
                echo "<td>$startT</td>";
                echo "<td>$endD</td>";
                echo "<td>$endT</td>";
                $p1 = $conn->query("SELECT player_id, name, surname from player where player_id = '$p1ID';  
                ");

                while ($rows0 = $p1->fetch_assoc()) {
                    $name1 = $rows0['name'];
                    $surname1 = $rows0['surname'];
                }
                echo "<td>$name1 $surname1</td>";
                echo "<td>
                <form action='playAction.php' method='post'>
                <input type='submit' class='btn btn-primary' value='Play' onClick=''>
                <input type='hidden' value='$match_id' name='match'/>

                </form>
                </td>";
                echo '<tr>';
            }
        } ?>
        
        </table>
    
        
</div>
    
</body>
</html>