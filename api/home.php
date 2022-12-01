<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script
    src="https://code.jquery.com/jquery-3.6.1.js"
    integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: #;">

<?php  
    include 'db_folder/connection.inc.php';
    session_start();
    $name = $_SESSION['login_success'];
    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $sql = "DELETE FROM `employeetbl` WHERE `emp_id` = '$id' ";
        $run = $conn->query($sql);
        if($run === TRUE){
            echo "
            <script type='text/javascript'> 
            $('#msg').html('<p>Mr  {$name} Data delete successfully ! </p>').delay(600).fadeOut(); 
            </script> ";
           

            }else{ echo "
                <script type='text/javascript'> 
                $('#msg').html('<p> Error in Deletting data of Mr  {$name} ! </p>').delay(600).fadeOut(); 
                </script> ";
            }
    }

?>


    
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Sr.no</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Avtar</th>
      <th scope="col">Mobile</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

   <h4 id = "msg"></h4>

<?php 
include 'db_folder/connection.inc.php';

header('content-Type : application/json');
header('Access-Control-Allow-Origin : *');

$name = $_SESSION['login_success'];
//$_SESSION['name'] = login_success;

// echo "
// <script type='text/javascript'> 
// $('#msg').html('<p> Welcome to Admin: {$name} </p>').delay(600).fadeOut(); 
// </script> ";





$table = "`employeetbl`";
$sr_no = 1;

 $sql = "SELECT * FROM  $table";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $res=array();
    while($row = $result->fetch_array()){

        $res[]=$row;
  
        $image = $row['file'];
      
       
        
        ?>
      <tbody>
      <tr>
      <th scope="row"><?php echo $sr_no;?></th>
      
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['lastname'];?></td>
      <td style= "width:10%;"><img alt ="Avtaar is not uploaded" style="width: 80px; height:50px; margin: 0px auto;" src = "../image/<?php echo $row['file'];?>"></td>
      <td><?php echo $row['mobile'];?></td>
      <td><?php echo $row['address'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['password'];?></td>
      <td><a href="?add_master_folder/delete.inc.php&id=<?php echo $row['emp_id'];?>" class= "btn btn-danger btn-sm" onClick="return confirm('Do you really want to delete');">Delete</a>
      <a href="edit.php&id=<?php echo $row['emp_id'];?>" class= "btn btn-primary btn-sm">Edit</a>
      <a href="allRecords.php" class= "btn btn-success btn-sm">SigleRecord</a></td>
    </tr>
    <?php $sr_no++; } 
  
  json_encode(array("msg" => "Success", 'status' => 'success'));
} else {
    json_encode(array('message'=>'Data not submited','status'=>'Faild'));
}

$conn->close();
?>






</body>
</html>