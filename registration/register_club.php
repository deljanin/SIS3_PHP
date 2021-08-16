<?php include '../conn.php';
$username = '';
$password = '';
$name = '';
$username_err = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {
        echo $key;
        echo $value;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = trim($_POST['name']);
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $sql = "SELECT name FROM club WHERE username = '$username'";

        if ($result = mysqli_query($conn, $sql)) {
            if ($result->num_rows > 0) {
                $username_err = 'This username is already taken.';
            } else {
                $sql = "INSERT INTO club (name, username, password) VALUES ('$name','$username','$password')";
                if ($stmt = mysqli_query($conn, $sql)) {
                    header('location: ../index.php');
                } else {
                    echo 'Something went wrong. Please try again later.';
                }
            }
        } else {
            echo 'Oops! Something went wrong. Please try again later.';
        }
    }
}
