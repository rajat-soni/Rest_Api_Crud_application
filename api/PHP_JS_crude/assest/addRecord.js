        // save Record js code //

        $(document).on('submit', '#saveStudent', function (e) {  
            e.preventDefault();

            var name = $("#view_name").val();
            var email = $("#view_email").val();
            var phone= $("#view_phone").val();
            var course = $("#view_cousre").val();
            var formData = new FormData();
            formData.append('json',  JSON.stringify({name:name, email:email, phone:phone, course:course})   );
            formData.append('save_student', 'yes');
            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#studentAddModal').modal('hide');
                        $('#saveStudent')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });
