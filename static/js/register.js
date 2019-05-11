$(function(){
    
    $("#registerForm").validate({
        rules: {
            username: {
                required: true
            },
            email: {
                email: true
            },
            password: {
                required: true,
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            username: "用户名不能为空",
            email: {
                email: "邮箱格式不正确"
            },
            password: "密码不能为空",
            confirm_password: {
                required: "密码不能为空",
                equalTo: "两次密码输入不一致"
            }
        },
        errorElement: 'span',
        errorClass: 'error-msg',
        submitHandler: function(form) {
            $.ajax({ 
                method: 'POST',
                url: "../../register.php",
                data: {
                    "username": $("#username").val(),
                    "email": $("#email").val(),
                    "password": $("#password").val(),
                },
                dataType: 'json',
                success: function(data){
                    $('#myModal').modal({
                        keyboard: false,
                        backdrop: false
                    });
                    $("#modal-txt").text(data.msg);
                    $('#myModal').modal('show');
                    if (data.code == 1) {
                        $('#confirm-btn').on('click', function () {
                            window.location.href = "../index.html";
                        });
                    }
                }
            });
        }
    });
});