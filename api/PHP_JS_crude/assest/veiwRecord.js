$(document).on('click', '.viewStudentBtn', function () {

    var student_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "code.php?student_id=" + student_id,
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 404) {

                alert(res.message);
            }else if(res.status == 200){

                // $('#view_name').text(res.data.name);
                // $('#view_email').text(res.data.email);
                // $('#view_phone').text(res.data.phone);
                // $('#view_course').text(res.data.course);

                $('#view_name_eu').text(res.data.name);
                $('#view_email_eu').text(res.data.email);
                $('#view_phone_eu').text(res.data.phone);
                $('#view_course_eu').text(res.data.course);


                
                $('#studentViewModal').modal('show');
            }
        }
    });
});
