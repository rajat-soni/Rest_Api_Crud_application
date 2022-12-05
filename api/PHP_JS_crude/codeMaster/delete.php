<?php

require '../dbMaster/dbcon.php';




if(isset($_POST['delete_student']))
{
    header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $query = "DELETE FROM employee WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Student Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>