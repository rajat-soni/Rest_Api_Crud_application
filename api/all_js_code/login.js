function loginData(){

    var email = $("#email").val();
    var password = $("#password").val();

  if(email != "" && password != ""){
    $.ajax({

        url : '../login_Master/login.inc.php',
        type : 'POST',
        data : {email:email, password:password},
        success : function(data){
          console.log(data);
            if(data.includes("Logged in")){
                window.location.href  = "../index_folder/index.inc.php";
            }else{
              $(".error").html("Error in  submitting Data !").fadeToggle(3000);
            }
        }
    });
  }else{

    $(".error").html("Fields should not be empty **").fadeToggle(3000);
  }
}

