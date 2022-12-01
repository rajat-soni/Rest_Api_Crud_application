<?php  include 'connection.inc.php';

header('content-Type : application/json');
header('Access-Control-Allow-Origin : *');

$sql = "SELECT * FROM  admin_tbl";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $res=array();
    while($row = $result->fetch_assoc()){

        $res[]=$row;
      
    }
  
    echo json_encode($res);
} else {
    echo json_encode(array('message'=>'Data not submited','status'=>'Faild'));
}

$conn->close();
?>
