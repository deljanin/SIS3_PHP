<?php include "header.php";
$username = $password = $name = $surname = $club= "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    foreach ($_POST as $key => $value)
    {
        echo $key ;
        echo $value;
        
    }
        $password = trim($_POST["password"]);
        $name = trim($_POST["name"]);
        $username = trim($_POST["username"]);
        // Prepare a select statement
        $sql = "SELECT id FROM club WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
        
        $sql = "INSERT INTO club (name, username, password) VALUES ('$name','$username','$password')";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                //header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
    
    // Close connection
    mysqli_close($conn);
}