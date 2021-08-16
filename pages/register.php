<?php
session_start();
include '../header.php';
include '../conn.php';
include '../registration/register_player.php';
include '../registration/register_club.php';
include '../components/navbar.component.php';

$result = $conn->query('SELECT club_id, name from club');
?>
<body>
    <script>
        function myFunction() {
            if (document.getElementById("rPlayer").checked){
                document.getElementById("clubForm").style.display='none';
                document.getElementById("playerForm").style.display='block';
            } else if (document.getElementById("rClub").checked){
                document.getElementById("clubForm").style.display='block';
                document.getElementById("playerForm").style.display='none';
            }
        }
    </script>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create the club account.</p>
        <div class="form-check form-check-inline" onchange="myFunction()">
            <input class="form-check-input" type="radio" id="rPlayer" name="option" checked>Player
        </div>
        <div class="form-check form-check-inline" onchange="myFunction()">
            <input class="form-check-input"  type="radio" id="rClub" name="option">Club
        </div>
        <div id="clubForm" style="display:none">
            <form action="../registration/register_club.php" method="post">
                <div class="form-group">
                    <label>Name of the club</label>
                    <input type="text" name="name" class="form-control" required>
                </div> 
                <div class="form-group">
                    <label>Username <?php echo "<b style='font-size:13; color:red;'>$username_err</b>"; ?></label>
                    <input type="text" name="username" class="form-control" required>                    
                </div>   
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group mt-2 mb-1">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
                <p>Already have an account? <a href="index.php">Login here</a>.</p>
            </form>  
        </div>           
        
        <div id="playerForm" >    
            <form action="../registration/register_player.php" method="post">
                <div class="form-group">
                    <label>Your name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Your surname</label>
                    <input type="text" name="surname" class="form-control" required>
                </div>  
                <div class="form-group">
                    <label>Username <?php echo "<b style='font-size:13; color:red;'>$username_err</b>"; ?></label>
                    <input type="text" name="username" class="form-control" required>                    
                </div>    
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <label class="mt-2">Club</label> 
                <div class="form-group">
                    <!-- Fill up with sql data -->
                    
                    <div class="btn-group mb-2">         
                              
                    <select name="club">
                        <?php while ($rows = $result->fetch_assoc()) {
                            $clubName = $rows['name'];
                            $clubid = $rows['club_id'];
                            echo "<option value = '$clubid'>$clubName</option>";
                        } ?>
                    </select>
                    </div>
                </div> 
                <div class="form-group mt-2 mb-1">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
                <p>Already have an account? <a href="index.php">Login here</a>.</p>
            </form>
               
        </div>
        
    </div>    
</body>
</html>