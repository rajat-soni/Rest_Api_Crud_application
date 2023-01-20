<?php


if(isset($_POST['send_data'])){

    $name = $_POST['name'];
    $title = $_POST['title'];

    $data = file_get_contents('data.json');
    print_r($data);
    die;
    
  $dataArr = json_decode($data, true);
 

  $dataNew = array(

    'name'=> $name,
     'title'=> $title
  );


$dataArry[] =  $dataNew;

$newData = json_encode($dataArry);

if(file_put_contents('data.json',$newData)){
    header('location:data.json');
}else{
    echo"file not created";
}

}
?>







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
    <style>
        #loader{
            display:none;
        }
    </style>
</head>

    <body style="background-color: #D6EAF8;">
  
    <div class = "container mb-4">
    <div class="row">
      <div class="col-md-3"></div>
        <div class="col-md-6 mt-5">
         
            <div class= "card shadow">
                <div class="card-header" style= "padding-top: 20px; padding-bottom: 20px; "><span style="font-size: 24px; float:right;">Add New User</span></div>
                <form id = "form" method = "post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class = "row">
                        <form action = "" method = "POST">
                        <input type = "hidden" placeholder= "id*" name = "emp_id" id = "emp_id" class= "form-control">
                        <div class = "col-2"><label>Name</div><br>
                        <div class = "col-10"><input type = "text" placeholder= "Employee name*" name = "name" id = "name" class= "form-control"></div>
                        <span class="text-danger" class = "error" style="margin-left: 110px;"></span>
                    </div><br>

                
                  
                   
                   
                    <div class = "row">
                        <div class = "col-2"><label>Title</div><br>
                        <div class = "col-10"><input type = "text" class= "form-control" id= "title" name = "title" placeholder="title address here*"></div>
                        <span class="text-danger" class = "error" style="margin-left: 110px;"></span>
                    </div><br>
                   
                    <input type = "submit" name = "send data" value = "send data">
                 
                    
                
</form>
        </div>
        <div class="col-md-3"><p id = "error"></p></div>
        <div id="preloader">
            <div id="loader">

                <img src='Walk.gif' width='32px' height='32px'>
            </div>
          </div>
</div>      
</div>

<footer class="fixed-bottom">All Rights Reserved in Ajax Crud &copy;</footer>
</div>
</body>

<script src = "../Assest/addUser.js"></script>


</html>
    
   


