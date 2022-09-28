<?php
    // echo $_POST['ID'];
    // include_once("connection/connection.php");
    // $con = connection();
    
    // if(isset($_POST['delete'])){
    
    //     $id = $_POST['ID'];
    //     $sql = "DELETE FROM list_of_students WHERE ID ='$id' ";
    //     $con->query($sql) or die ($con->error);
    //     echo header ("Location: index.php");
    // }

    if(!isset($_SESSION)){
        session_start();
    }
    
    if (isset($_SESSION['access']) && $_SESSION['access']=='admin1'){
        echo 'welcome '.$_SESSION['userlogin']."</br> </br>";
        // session_start();
    }else{
        // echo 'Welcome guests';
        echo header("Location:index.php");
    }

    include_once ('connection/connection.php');
    // connection();
    $con = connection();

    $id= $_GET['app_No'];

    $sql = "DELETE FROM clinic WHERE app_No ='$id'";

    $con->query($sql) or die ($con->error);

    // $row = $students->fetch_assoc();
    echo header ("Location:index.php");


?>
