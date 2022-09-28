<?php

if(!isset($_SESSION)){
    session_start();
}

if (isset($_SESSION['userlogin'])){
    echo 'welcome '.$_SESSION['userlogin'];
    // session_start();
}
else{
    echo 'Welcome guests';
}

include_once ('connection/connection.php');
// connection();
$con = connection();



if (isset($_GET['searchbtn'])){
    $search = $_GET['search'];

    $sql = "SELECT * FROM clinic WHERE lastname like '%$search%' || firstname like'%$search%'";
    $students = $con->query($sql) or die ($con->error);

    $row = $students->fetch_assoc();
}

// if (isset($_POST['search'])){
//     // echo 'search';
//     $search = $_POST['search'];

//      $sql = "SELECT * FROM `test_table` WHERE `firstname`='$search' OR `lastname`='$search'";
//      $students = $con->query($sql) or die ($con->error);

//     $row = $students->fetch_assoc();
// }
    // $sql = "SELECT * FROM `users` WHERE `username`='$uname' AND `password`='$pword'";

// $host = "localhost";
// $username="root";
// $password = "";
// $database = "student_records";

// $con = new mysqli ($host,$username,$password,$database);

// if($con->connect_error){
//     echo $con->connect_error;
// }

    $sql = "SELECT * FROM clinic ORDER BY app_No DESC";
    $students = $con->query($sql) or die ($con->error);

    $row = $students->fetch_assoc();


// $sql = "SELECT * FROM test_table ORDER BY ID DESC";
// $students = $con->query($sql) or die ($con->error);

// $row = $students->fetch_assoc();

// print_r($row);

// do{
//     echo $row['firstname']." &nbsp &nbsp &nbsp &nbsp ".$row['lastname']."<br/>";
// }while($row = $students->fetch_assoc());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> 
    <style>
        body{
            text-align:center;
        }
    </style>
</head>
<body >

    <h1>Clinic Information</h1>

    <div class='row'>
        <div class='col-sm-4'>
            <?php if (isset($_SESSION['userlogin'])){?>
            <button type="button" class="btn btn-secondary"><a href="logout.php" class='text-decoration-none text-white'>Logout</a></button>

            <?php } else { ?>
            <button type="button" class="btn btn-secondary"><a href="login.php" class='text-decoration-none  text-white'>Login</a></button>
            <?php }?>
        </div>
        
         <div class='col-sm-4'>
            <!-- <?php  if ($_SESSION['access']=='admin1'){?> -->
              <button type="button" class="btn btn-secondary"><a href="insert.php" class='text-decoration-none  text-white'>Insert new</a></button>
              <!-- <?php }?> -->

         
            
        </div>

        <div class='col-sm-4'>
      

            <form action="" method="GET">
                 <input type="text" name='search'>

                 <button name='searchbtn' type='submit' class="btn     btn-secondary">Search</button>
             </form>
            <!-- <input type="text" name='search'>
            <button type="button" name = 'search' class="btn btn-secondary"><a href="insert.php" class='text-decoration-none  text-white'>Search</a></button> -->
        </div>
    </div>
  
        
    
    <br>
    <br>
    <table class="table table-striped-columns">
        <thead class='table-primary'>
            <th>Details</th>
            <th>Applicaion Number</th>
            <th>Application Date</th>
            <th>Application Time</th>
            <th>Application Type</th>
            <th>Patient Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Phone</th>
            <th>Doctors</th>
            <th>Doctor's Name</th>
        </thead>

        <tbody>
            <?php do { ?>
            <tr>
                <td><a href="details.php?app_No=<?php echo $row['app_No'];?>" class='text-decoration-none text-black'>Details</a></td>
                
                <td><?php echo $row['app_No'];?></td>
                <td><?php echo $row['app_Date'];?></td>
                <td><?php echo $row['app_Time'];?></td>
                <td><?php echo $row['appt_Type'];?></td>
                <td><?php echo $row['patient_ID'];?></td>
                <td><?php echo $row['firstname'];?></td>
                <td><?php echo $row['lastname'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['doctors'];?></td>
                <td><?php echo $row['doctors_Name'];?></td>
            </tr>
            <?php }while($row = $students->fetch_assoc()); ?>
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>