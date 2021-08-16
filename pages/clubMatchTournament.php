<?php
session_start();
include '../header.php';
include '../seasson.php';
include '../components/clubNavbar.component.php';

$sess = $_SESSION['id'];

$result1 = $conn->query(
    "SELECT player_id, name, surname from player where club_id = '$sess'"
);
$result2 = $conn->query(
    "SELECT player_id, name, surname from player where club_id = '$sess'"
);
?>



<script>

    function checkPlayer2(){
        var x = document.getElementById('player2');
        var y = document.getElementById('player1').value;
        for(var i =0; i < x.options.length; i++){
            if(x.options[i].value == y){
                x[i].style.display = "none";
            }else{
                x[i].style.display = "block";
            }
        }
    }
    function checkPlayer1(){
        var x = document.getElementById('player1');
        var y = document.getElementById('player2').value;
        for(var i =0; i < x.options.length; i++){
            if(x.options[i].value == y){
                x[i].style.display = "none";
            }else{
                x[i].style.display = "block";
            }
        }
    }

</script>



<div class="wrapper">
    <div id="createMatchForm" >    
        <label>Create a match:</label>
        <form action="../registration/register_match.php" method="post">
        <label>Starts at: </label>

        <input type="datetime-local" id="timeStart"
        name="timeStart" value="2021-08-16T00:00"
        min="2021-08-16T00:00" max="2023-01-01T00:00" class="form-control" required>

        <label>Ends at: </label>
        <input type="datetime-local" id="timeEnd"
        name="timeEnd" value="2021-08-16T00:00"
        min="2021-08-16T00:00" max="2023-01-01T00:00" class="form-control" required>
        <label>Player 1</label>
            <div class="form-group">
                <div class="btn-group mb-2">         
                <select name="player1" id="player1" onChange="checkPlayer2()">
                    <?php while ($rows = $result1->fetch_assoc()) {
                        $playerName = $rows['name'];
                        $playerSurname = $rows['surname'];
                        $playerid = $rows['player_id'];
                        echo "<option value = '$playerid'>$playerName $playerSurname</option>";
                    } ?>
                </select>
                </div>
            </div>

            <label>Player 2</label>
            <div class="form-group">
                <div class="btn-group mb-2">         
                <select name="player2" id="player2" onChange="checkPlayer1()">
                    <?php while ($rows = $result2->fetch_assoc()) {
                        $playerName = $rows['name'];
                        $playerSurname = $rows['surname'];
                        $playerid = $rows['player_id'];
                        echo "<option value = '$playerid'>$playerName $playerSurname</option>";
                    } ?>
                </select>
                </div>
            </div>
            <div class="form-group mt-2 mb-1">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
                
    </div>
</div>

    
</body>
</html>