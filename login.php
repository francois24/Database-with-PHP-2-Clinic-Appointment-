<?php

if(!isset($_SESSION)){
    session_start();
}

    include_once ('connection/connection.php');
    // connection();
    $con = connection();

    if (isset($_POST['login'])){
        // echo 'login';
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];

        $sql = "SELECT * FROM `users` WHERE `username`='$uname' AND `password`='$pword'";

        $user = $con->query($sql) or die ($con->error);
        $row  = $user->fetch_assoc();
        $total = $user->num_rows;
        
        if($total>0){

            $_SESSION['userlogin'] = $row['access'];
            $_SESSION['access'] = $row['access'];

            // echo $_SESSION ['userlogin'];
            echo header ("Location:index.php");
            
        }else{
            echo 'No user found';
        }

        // $students = $con->query($sql) or die ($con->error);
        // echo "admin";
    }

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
     body{
            text-align:center;
        }
</style>
<body>
    <h1>Log in</h1>
    <form action="" method="POST">
        <label for="">Username</label>
        <input type="text" name='uname'>
        
        <label for="">Password</label>
        <input type="password" name='pword'>

        <button name='login' type='submit'>Login </button>
    </form>
</body>
</html>