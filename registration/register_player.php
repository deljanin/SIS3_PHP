<?php include "../conn.php";
$username = $password = $name = $username_err ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){    
    $name = trim($_POST["name"]);
    $surname = trim($_POST['surname']);
    $username = trim($_POST["username"]);
    $password = $_POST["password"];       
    $club = $_POST['club'];
    $sql = "SELECT name FROM player WHERE username = '$username'";
    
    if($result = mysqli_query($conn, $sql)){               
        if($result -> num_rows > 0){
            $username_err = "This username is already taken.";                
        } 
        else
        {
            $sql = "INSERT INTO player (name, surname, username, password, club_id) VALUES ('$name','$surname','$username','$password','$club');";
            if($stmt = mysqli_query($conn, $sql))
            {
                header("location: index.php");
            } 
            else{ echo "Something went wrong. Please try again later.";}     
            
        } 
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

}
