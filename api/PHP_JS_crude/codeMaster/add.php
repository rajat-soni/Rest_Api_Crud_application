<?php

require '../dbMaster/dbcon.php';


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if($_SERVER['REQUEST_METHOD'] === 'POST') 
{

    $data = json_decode($_POST["json"]);
   $name = $data->name;
   $email = $data->email;
   $file_with_name = $_FILES["file"]["name"];
   $file_with_tmp_name = $_FILES["file"]["tmp_name"];
   $target = '../image/';
   $targetFilePath = $target .  basename($_FILES["file"]["name"]);
   $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
   $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $phone = $data->phone;
            $course = $data->course;
 
            if($name == NULL || $email == NULL || $phone == NULL || $course == NULL)
            {
                $res = [
                'status' => 422,
                'message' => 'All fields are mandatory'
                ];
                echo json_encode($res);
                return;
            }

                $query = "INSERT INTO employee (name,email,file,phone,course) VALUES ('$name','$email','$file_with_name','$phone','$course')";
                $query_run = mysqli_query($con, $query);

            if($query_run)
            {
                $res = [
                    'status' => 200,
                    'message' => 'Student Created Successfully'
                ];

                echo json_encode($res);
                return;
            }else{
                $res = [
                    'status' => 500,
                    'message' => 'Student Not Created'
                ];
                echo json_encode($res);
                return;
            }
        }else{
            $res = [
                'status' => 500,
                'message' => 'Image not created'
            ];
            echo json_encode($res);
            return;
        }
    }else{
        $res = [
            'status' => 500,
            'message' => 'Student Not Created'
        ];
        echo json_encode($res);
        return;
    }



?>