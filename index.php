<?php include "header.php";     
    $username = $password = $radio = "";
    $username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    /*foreach(array_keys($_POST) as $item){ 
        echo $item . "\n"; 
    }
    echo "<br>";
    foreach($_POST as $item){ 
        echo $item . "\n"; 
    }*/
        $username = trim($_POST["username"]);    
        $password = trim($_POST["password"]);           
        $radio = ($_POST['radio']);
    // Validate credentials

    if($radio == "club"){

        $sql = "SELECT club_id, username, password FROM club WHERE username = '$username' AND password='$password'";    
    
        if ($result = mysqli_query($conn, $sql)) {
            if($result -> num_rows > 0){
            session_start();
            
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            //$_SESSION["id"] = $id;
            $_SESSION["username"] = $username;                            
            
            // Redirect user to welcome page
            header("location: club.php");
            }else{ 
            echo "<b>Combination of username and password does not exist!</b>";
            }
        }
    }else{
        $sql = "SELECT player_id, username, password FROM player WHERE username = '$username' AND password='$password'";
        if ($result = mysqli_query($conn, $sql)) {
            if($result -> num_rows > 0){
            session_start();
            
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            //$_SESSION["id"] = ;
            $_SESSION["username"] = $username;                            
            
            // Redirect user to welcome page
            header("location: player.php");
        }else{ 
            echo "<b>Combination of username and password does not exist!</b>";
        }
    }
    // Close connection
    mysqli_close($conn);
    }

}
?>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            
            <div class="form-check mt-1">
            <input
                class="form-check-input"
                type="radio"
                name="radio"
                id="flexRadioDefault1"
                value="<?php echo $radio = 'player'; ?>"
            />
            <label class="form-check-label" for="flexRadioDefault1">Player</label>
            </div>

            <div class="form-check mb-2">
            <input
                class="form-check-input"
                type="radio"
                name="radio"
                id="flexRadioDefault2"
                value="<?php echo $radio = 'club'; ?>"

                checked
            />
            <label class="form-check-label" for="flexRadioDefault2">Club</label>
            </div>
            <div class="form-group mb-2">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>            
            <p>You aren't registered? Sign up <a href="register.php">here</a>.</p>
            <p>Your club isn't registered? <a href="register.php">Sign it up now</a>.</p>
        </form>
    </div>    
</body>
</html>