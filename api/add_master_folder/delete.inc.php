
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete Record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<?php  
    include '../db_folder/connection.inc.php';
    session_start();
    $name = $_SESSION['login_success'];
    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $sql = "DELETE FROM `employeetbl` WHERE '$id' ";
        $run = $conn->query($sql);
        if($run === TRUE){
            echo "
            <script type='text/javascript'> 
            $('#msg').html('<p>Mr  {$name} Data delete successfully ! </p>').delay(600).fadeOut(); 
            </script> ";
            header("location:addUser.html");

            }else{ echo "
                <script type='text/javascript'> 
                $('#msg').html('<p> Error in Deletting data of Mr  {$name} ! </p>').delay(600).fadeOut(); 
                </script> ";
            }
    }

?>