<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
if(!isset($_SESSION)){
  session_start();
}

include_once("../../connections/connection.php");
  
$con = connection();

try{
  if(isset($_POST['email'])){
    $username =  mysqli_real_escape_string($con, $_POST['email']);
    $password =   mysqli_real_escape_string($con,$_POST['password']);
    
    $sql = "SELECT * FROM tbl_residents WHERE email = '$username' AND password ='$password' AND status = 'active'";
    
    $user = $con ->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;
  
   if($total > 0){
    $_SESSION['IDUSER'] = $row['id'];
      echo json_encode(array("content"=>$row, "responseStatus" =>'success'));
    }else{
      echo json_encode(array("content"=>200,"responseStatus" =>'Wrong email or password'));
     }
    }
}catch(Exception $e){
  echo json_encode(array("content"=>500,"responseStatus" =>'error', "errrorMessage" => $e->getMessage()));
}
  
?>