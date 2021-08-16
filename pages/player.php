<?php
session_start();
include '../header.php';
include '../seasson.php';
include '../components/playerNavbar.component.php';

$pid = $_SESSION['id'];
$actionSql1 = $conn->query(
    "SELECT action_name, player_id, pointwon, count(action_name) as c from action where player_id = '$pid' and pointwon = 1 group by action_name;"
);
$actionSql0 = $conn->query(
    "SELECT action_name, player_id, pointwon, count(action_name) as c from action where player_id = '$pid' and pointwon = 0 group by action_name;"
);

$map = [];
?>


<!-- echo $_SESSION['name']; -->
<div class="m-2"><b>My stats: </b></div>
<p class="m-2">NOTICE: In order for the system to display correctly you need to have at least 1 action in every category below.</p>

    <table class="table">
        <thead class="thead-light">
        <th scope="row"></th><th>1st Serve</th><th>1st Serve Return</th><th>2nd Serve</th><th>2nd Serve Return</th><th>Break Point</th><th>Break Point Saved</th>
        <th>Return Ace</th><th>Return Double Fault</th><th>Serve Ace</th><th>Double Fault</th></thead>
            
            <tr>
            <th scope="row">Point Won</th>
            <?php while ($rows = $actionSql1->fetch_assoc()) {
                $won = $rows['c'];
                echo "<td>$won</td>";
            } ?>
            </tr>
            <tr>
            <th scope="row">Point Lost</th>
            <?php while ($rows = $actionSql0->fetch_assoc()) {
                $won = $rows['c'];
                echo "<td>$won</td>";
            } ?>
            </tr>
    </table>


</body>
</html>