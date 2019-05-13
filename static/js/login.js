$(function(){
    $("#loginForm").validate({
        rules: {
            username: {
                required: true
            },
            password: {
                required: true,
            }
        },
        messages: {
            username: "用户名不能为空",
            password: "密码不能为空"
        },
        errorElement: 'span',
        errorClass: 'error-msg',
        submitHandler: function(form) {
            $.ajax({ 
                method: 'POST',
                url: "",
                data: {
                    "username": $("#username").val(),
                    "password": $("#password").val(),
                },
                dataType: 'json',
                success: function(data){
                    if (data.code == 1) {
                        window.location.href = "../index.html";
                    }else{
                        $("#modal-txt").text(data.msg);
                        $('#myModal').modal('show');
                    }
                }
            });
        }
    });
});