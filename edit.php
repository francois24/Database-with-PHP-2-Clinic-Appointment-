<?php

include_once ('connection/connection.php');
// connection();
$con = connection();

if (isset($_POST['submit'])){
    $appDate = $_POST['app_Date'];
    $appTime = $_POST['app_Time'];
    $apptType = $_POST['appt_Type'];
    $patientID = $_POST['patient_ID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $doctors = $_POST['doctors'];
    $doctorsName = $_POST['doctors_Name'];


$id= $_GET['app_No'];

 $sql = "UPDATE`clinic` SET `app_Date` = '$appDate', `app_Time` = '$appTime', `appt_Type`='$apptType' , `patient_ID`='$patientID', `firstname`='$firstname', `lastname`='$lastname', `phone`='$phone', `doctors`='$doctors', `doctors_Name`='$doctorsName' WHERE `app_No`='$id'";

 $con->query($sql) or die ($con->error);

// $row = $students->fetch_assoc();
echo header ("Location:details.php?app_No=".$id);

}

$id= $_GET['app_No'];

$sql = "SELECT * FROM clinic where app_No = '$id'";
$students = $con->query($sql) or die ($con->error);

$row = $students->fetch_assoc();
// $sql = "SELECT * FROM sample";
// $students = $con->query($sql) or die ($con->error);

// $row = $students->fetch_assoc();


// $sql = "SELECT * FROM test_table";
// $students = $con->query($sql) or die ($con->error);

// $row = $students->fetch_assoc();
// $con = connection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info</title>
    <style>
        <?php include 'css/index-style.css'?>
    </style>
</head>
<body>
   <form action="" method='POST'>
   <label for="">Appllication Date</label>
        <input type='text' name='app_Date' id='firstname' value='<?php echo $row['app_Date'];?>'>

        <label for="">Application Time</label>
        <input type='text' name='app_Time' id='firstname' value='<?php echo $row['app_Time'];?>'>

        <label for="">Appointment Type</label>
        <input type='text' name='appt_Type' id='firstname' value='<?php echo $row['appt_Type'];?>'>

        <label for="">Patint ID</label>
        <input type='text' name='patient_ID' id='firstname' value='<?php echo $row['patient_ID'];?>'>

        <label for="">Firstname</label>
        <input type='text' name='firstname' id='firstname' value='<?php echo $row['firstname'];?>'>

        <label for="">Lastname</label>
        <input type='text' name='lastname' id='lastname' value='<?php echo $row['lastname'];?>'>

        <label for="">Phone Number</label>
        <input type='text' name='phone' id='firstname' value='<?php echo $row['phone'];?>'>

        <label for="">Doctor's ID</label>
        <input type='text' name='doctors' id='firstname' value='<?php echo $row['doctors'];?>'>

        <label for="">Doctor's Name</label>
        <input type='text' name='doctors_Name' id='firstname' value='<?php echo $row['doctors_Name'];?>'>

        <!-- <label for="">Gender</label>
        <select name="gender" id="gender"  value='<?php echo $row['gender'];?>'>

            <option value='Male'<?php echo ($row['gender']=='male')?'selected':'';?> >Male</option>

            <option value='Female'<?php echo ($row['gender']=='female')?'selected':'';?>  >Female</option> -->

        </select>
        <input type="submit" name='submit' value='submit'>
        <button><a href="delete.php?app_No=<?php echo $row['app_No'];?>">Delete</a></button>
   </form>
    <br/>
  

</body>
</html>