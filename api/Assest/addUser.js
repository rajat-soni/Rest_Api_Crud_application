
function insertUser(){
    var Form = $("#form").val();
    var emp_id = $("#emp_id").val();
  
    var name = $("#name").val();
    
    var lastname = $("#lastname").val();
    var mobile = $("#mobile").val();
    var file = $('input:file')[0].files[0];
    var address = $("#address").val();
    var email = $("#email").val();
    var password = $("#password").val();
    

    if(name != "" && lastname != "" && file != "" && mobile != ""  && address != "" && email != "" && password !=""){
     
//STOP UNDO 

var formData = new FormData();
formData.append('json',  JSON.stringify({emp_id : emp_id, name: name, lastname: lastname,  mobile:mobile, address:address, email:email, password:password})   );
// Attach file
formData.append('file', file ); 
        $.ajax({
            url : 'http://localhost:3000/add_master_folder/addUserData.inc.php',
            type : 'POST',
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false, // NEEDED, DON'T OMIT THIS
            enctype: 'multipart/form-data',
            cache: false,
            data :formData,
       
                beforeSend: function(){
                    /* Show image container */
                    $("#loader").show();
                    return true;
                   },
            
 
            success : function(result){
               
                    var data = JSON.parse(result);
                
                    if(data.status == 'success'){
                        // $('#Form')[0].reset();
                         $("#loader").hide();
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