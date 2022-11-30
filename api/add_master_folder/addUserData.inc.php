<?php 

include_once '../db_folder/connection.inc.php';

session_start();

// header('Content-Type : application/json');
// header('Access-Control-Allow-Origin : *');
// header('Access-Control-Allow-Methods : POST');
// header('Access-Control-Allow-headers: Content-Type, Access-Control-Allow-Origin, Access-Control-Allow-Methods, Authorization, X-Requested-with');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  
$name = $data->name;
$lastname = $data->lastname;
$mobile = $data->mobile;
$address = $data->address;
$email = $data->email;
$password = $data->password;

$sql = " INSERT INTO `employeetbl`(`name`, `lastname`, `mobile`, `address`, `email`, `password`) VALUES ('$name','$lastname','$mobile','$address','$email','$password')";

$runSql = $conn->query($sql) or die("Error in sql Table");
if ($runSql === TRUE) {
  $_SESSION['login_success']= $name;
  echo json_encode(array("message"=>"Data Inserted","status"=>"success"));
  
} else {
  echo json_encode(array("message"=>"Data not Inserted","status"=>"Faild"));
}
}
$conn->close();

?>