//validation

$(document).ready(function(){
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.validator.setDefaults({
        onkeyup: false,
        errorPlacement: function(error, element) {
            if (element.hasClass('form-check-input')) {
                error.insertAfter(element.prev('.main-radio'));
            } else {
                error.insertAfter(element);
            }
        }
    });
});



$("#register_form").validate({
    errorClass: 'text-danger',
    ignore: ':hidden',
    rules:{
        first_name:{required:true},
        last_name:{required:true},
        email_id:{
            required:true,
            email:true,
            remote: {
                url: '/check-email-id',
                dataType: 'JSON',
                type: 'POST',
                data: {
                    email_id: function() {
                        return $("#email_id").val();
                    },
                },
                beforeSend: function() {
                    toggleDiv('loader-overlay', 'block');
                },
                complete: function() {
                    toggleDiv('loader-overlay', 'none');
                },
                dataFilter: function(data) {
                    if (data.trim() == 'false') {
                        return 'T"his email id is already in our database"';
                    }
                    return true;
                },
                error: function(jqXHR, satus, error) {
                    console.log(status, error);
                }
            },
        },
        password:{required:true},
        annual_income:{required:true,number:true},
        date_of_birth:{required:true},
        gender:{required:true},

    },
    messages:{
        first_name:{required:"Enter first name"},
        last_name:{required:"Enter last name"},
        email_id:{required:"Enter email id",email:"Enter valid email id"},
        password:{required:"Enter password"},
        annual_income:{required:"Enter annual income",number:"Enter valid value"},
        date_of_birth:{required:"Select date of birth"},
        gender:{required:"Select gender"},
    },
    submitHandler:function(form,event){
        event.preventDefault();
        toggleDiv('loader-overlay', 'block');
        form.submit();
    }
});


$("#login_form").validate({
    errorClass: 'text-danger',
    ignore: ':hidden',
    rules:{
        email_id:{
            required:true,
            email:true,
        },
        password:{required:true},

    },
    messages:{
        email_id:{required:"Enter email id",email:"Enter valid email id"},
        password:{required:"Enter password"},
    },
    submitHandler:function(form,event){
        event.preventDefault();
        toggleDiv('loader-overlay', 'block');
        form.submit();
    }
});