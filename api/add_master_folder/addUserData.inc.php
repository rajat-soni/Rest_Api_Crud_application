<?php 

include_once '../db_folder/connection.inc.php';

session_start();

// header('Content-Type : application/json');
// header('Access-Control-Allow-Origin : *');
// header('Access-Control-Allow-Methods : POST');
// header('Access-Control-Allow-headers: Content-Type, Access-Control-Allow-Origin, Access-Control-Allow-Methods, Authorization, X-Requested-with');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

//$data = json_decode(file_get_contents("php://input"));

//STOP Undo


$data = json_decode($_POST["json"]);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$emp_id = $data->emp_id;  
$name = $data->name;
$lastname = $data->lastname;
$file_with_name = $_FILES["file"]["name"];
$file_with_tmp_name = $_FILES["file"]["tmp_name"];
$target = '../image/';



$targetFilePath = $target .  basename($_FILES["file"]["name"]);

$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 $allowTypes = array('jpg','png','jpeg','gif','pdf');

  // Upload file to server
if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
$mobile = $data->mobile;
$address = $data->address;
$email = $data->email;
$password = $data->password;

$sql = " INSERT INTO `employeetbl`(`emp_id`,`name`, `lastname`, `file`, `mobile`, `address`, `email`, `password`) VALUES ('$emp_id','$name','$lastname','$file_with_name','$mobile','$address','$email','$password')";

$runSql = $conn->query($sql) or die("Error in sql Table");
if ($runSql === TRUE) {
  $_SESSION['login_success']= $name;
  
  echo json_encode(array("message"=>"Data Inserted","status"=>"success"));
  
} else {
  echo json_encode(array("message"=>"Data not Inserted","status"=>"Faild"));
}

}else{ echo json_encode(array("message"=>"Image not get","status"=>"Faild"));
}
}
$conn->close();

?>