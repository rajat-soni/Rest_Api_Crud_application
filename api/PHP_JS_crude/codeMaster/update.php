<?php

require '../dbMaster/dbcon.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");

if(isset($_POST['update_student']))
{
    $data = json_decode($_POST['json']);
    $student_id = $data->student_id;

    $name = $data->name;
    $email = $data->email;
    $file_with_name = $_FILES["file"]["name"];
   $file_with_tmp_name = $_FILES["file"]["tmp_name"];
   $target = '../image/';
   $targetFilePath = $target .  basename($_FILES["file"]["name"]);
   $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
   $allowTypes = array('jpg','png','jpeg','gif','pdf');
    
    $phone = $data->phone;
    $course = $data->course;

    if($name == NULL || $email == NULL || $file_with_name == NULL || $phone == NULL || $course == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE employee SET name='$name', email='$email', file = '$file_with_name', phone='$phone', course='$course' 
                WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Student Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}
