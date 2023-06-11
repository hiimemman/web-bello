<?php

function connection(){
   
    
    //localhost
    // $host = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "db_web_bello";

 
    // $con = new mysqli($host, $username, $password, $database,);
    
    // if($con->connect_error){
    //     echo $con->connect_error;
    // }else{
    //     return $con;
    // }
    
    date_default_timezone_set('Asia/Manila');
    return $con = mysqli_connect('localhost', 'u506529841_root', 'Admin1234', 'u506529841_db_web_bello');
}

?>