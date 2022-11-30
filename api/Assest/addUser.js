
function insertUser(){
    var name = $("#name").val();
    
    var lastname = $("#lastname").val();
    var mobile = $("#mobile").val();
    var address = $("#address").val();
    var email = $("#email").val();
    var password = $("#password").val();
    

    if(name != "" && lastname != "" && mobile != "" && address != "" && email != "" && password !=""){

        $.ajax({
            url : 'http://localhost:3000/api/add_master_folder/addUserData.inc.php',
            type : 'POST',
            contentType: "application/json; charset=utf-8",
            cache: false,
            data :JSON.stringify({name: name, lastname: lastname, mobile:mobile, address:address, email:email, password:password}),
       
            beforeSend: function(data){
                $("#msg").html(data).show()
                },
 
            success : function(result){
               
                    var data = JSON.parse(result);
                
                    if(data.status == 'success'){
                        window.location.href = "../home.php";
                    }else{
                    $("#error").html("<p class='alert alert-info'>Error in Submitting Data").fadeOut(3000);
                    }
            }
        });
    }else{
    $("#error").fadeIn(2000, function(){
        $("#error").html("<p class='alert alert-info'>Fields should not be empty</p>").fadeOut(3000);
          
        })
    }
}