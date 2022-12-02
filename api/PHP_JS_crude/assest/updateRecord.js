$(document).on('click', '.editStudentBtn', function () {

    var student_id = $(this).val();


   var data= {
    student_id: student_id,
  student_name:$(this).parent().first().parent().children().eq(1).html(),
  student_email:$(this).parent().first().parent().children().eq(2).html(),
   student_phone:$(this).parent().first().parent().children().eq(3).html(),
   student_course:$(this).parent().first().parent().children().eq(4).html()
}

 $('#student_id').val(data['student_id']);

$('#name').val(data.student_name);
$('#email').val(data.student_email);
$('#phone').val(data.student_phone);
$('#course').val(data.student_course);


$('#studentEditModal').modal('show');

    


});

$(document).on('submit', '#updateStudent', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("update_student", true);
    var data= {
        student_id: $('#student_id').val(),
      name:$('#name').val(),
      email:$('#email').val(),
       phone:$('#phone').val(),
       course:$('#course').val()
    }
    formData.append("json", JSON.stringify(data));
 
    


    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            
            var res = jQuery.parseJSON(response);
            if(res.status == 422) {
                $('#errorMessageUpdate').removeClass('d-none');
                $('#errorMessageUpdate').text(res.message);

            }else if(res.status == 200){

                $('#errorMessageUpdate').addClass('d-none');

                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);
                
                $('#studentEditModal').modal('hide');
                $('#updateStudent')[0].reset();

                $('#myTable').load(location.href + " #myTable");

            }else if(res.status == 500) {
                alert(res.message);
            }
        }
    });

});