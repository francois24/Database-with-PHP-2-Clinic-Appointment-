<?php

include_once ('connection/connection.php');
// connection();
$con = connection();

if (isset($_POST['submit'])){
 $txtdate = $_POST['appDate'];
 $txttime = $_POST['appTime'];
 $txttype = $_POST['appType'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$txtphone = $_POST['phone'];
$txtdoc = $_POST['doc'];
$txtdocName = $_POST['docName'];
$txtpatientID = $_POST['patient_ID'];


 $sql = "INSERT INTO `clinic`(`app_No`, `app_Date`, `app_Time`, `appt_Type`, `patient_ID`, `firstname`, `lastname`, `phone`, `doctors`, `doctors_Name`) VALUES (NULL,'$txtdate','$txttime','$txttype','$txtpatientID','$firstname','$lastname','$txtphone','$txtdoc','$txtdocName')";
$students = $con->query($sql) or die ($con->error);

// $row = $students->fetch_assoc();
echo header ("Location:index.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Records</title>
    <style>
        <?php include 'css/index-style.css'?>
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    
   <form action="" method='POST'>
       <div class="container-fluid">
        <div class="row">
            <h1>PATIENT INFO</h1>
        </div>

       <div class='row'>
            <div class='col-sm-3 '>
            <label for="">Application Date</label>
        <input type='text' name='appDate'>

        <label for="">Application Time</label>
        <input type='text' name='appTime'>

        <label for="">Application Type</label>
        <input type='text' name='appType'>
            </div>

            <div class='col-sm-3 '>
            <label for="">Firstname</label>
        <input type='text' name='firstname' id='firstname'>

        <label for="">Lastname</label>
        <input type='text' name='lastname' id='lastname'>

        <label for="">Phone</label>
        <input type='text' name='phone'>
            </div>

            <div class='col-sm-3'>
            <label for="">Patient ID</label>
        <input type='text' name='patient_ID'>

            <label for="">Doctor's</label>
        <input type='text' name='doc'>

        <label for="">Doctor's Name</label>
        <input type='text' name='docName'>
        <!-- <label for="">Gender</label>
        <select name="gender" id="gender">
            <option value='Male'>Male</option>
            <option value='Female'>Female</option>
        </select> -->
        <input type="submit" name='submit' value='submit' class='m-3 btn btn-primary'>
        <button type="button" class="btn btn-danger"><a href="index.php" class='text-decoration-none text-white' >Cancel</a></button>
            </div>
   
       </div>
       </div>

      

        
   </form>
    <br/>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>