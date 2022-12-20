<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) 
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $branch_name = $_POST['username'];
        if (count($errors) == 0) {
            $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $_SESSION['username'] = $row['username'];
                $_SESSION['success'] = "Your are now logged in";
                header("location: index.php");   
               
            }
            else 
            {
                array_push($errors, "Wrong Username or Password");
                $_SESSION['error'] = "Wrong Username or Password!";
                header("location: login.php");
            }
             
        }

?>
