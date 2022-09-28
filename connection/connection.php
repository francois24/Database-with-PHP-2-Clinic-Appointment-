<?php
    // function connection(){
    //     echo "This is a function <br/>";
    //     echo "Connection establish";
    // }
        function connection(){
        $host = "localhost";
        $username="root";
        $password = "";
        $database = "student_records";

        $con = new mysqli ($host,$username,$password,$database);

        if($con->connect_error){
             echo $con->connect_error;
        }else{
            return $con;
        }
        }
?>