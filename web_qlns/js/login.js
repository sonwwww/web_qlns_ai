$(document).ready(function () {
    // nhấn sang form login
    $(document).on('click', '.btn_link_login', function(){
        let el = $(this),
            type = el.attr('data-type');
        el.parents('#pick-tk').hide();
        $('#login-cty, #login-uv').hide();
        $(`#${type}`).css("display", 'flex');
    });

    // nhấn ra chọn loại login
    $(document).on('click', '.btn_link_out', function(){
        $('#pick-tk').css("display", 'flex');
        $('#login-cty, #login-uv').hide();
    });

    $(document).on("keydown", function(e) {
        if (!$("#login_cty").is(":disabled") && $("#formSignInCty").is(":visible")) {
            if (e.which == 13 || e.keyCode == 13) {
                $("#formSignInCty").submit();
            }
        }

        if (!$("#login_uv").is(":disabled") && $("#formSignInNv").is(":visible")) {
            if (e.which == 13 || e.keyCode == 13) {
                $("#formSignInNv").submit();
            }
        }
    });

    // form login công ty
    $("#formSignInCty").validate({
        rules: {
            email: {
                required: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Vui lòng nhập email",
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
            },
        },
        errorPlacement: function(error, element) {
            let parent = $(element).parents(".form_group");
            if (parent.length > 0) {
                $(parent).append(error);
            }
        },
        submitHandler: function() {
            var email = $("#cty_email").val(),
                password = $("#cty_password_first").val();
            $('#login_cty').val('Đang xử lý').prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "../ajax/login.php",
                data: { email, password, type: 1},
                dataType: 'JSON',
                success: function(data) {
                    if (data.result) {
                        location.href = "/home/content_cty.php";
                    } else {
                        alert(data.msg);
                        $('#login_cty').val('Đăng nhập').prop("disabled", false);
                    }
                },
            });
        }
    });

    // form login nhân viên
    $("#formSignInNv").validate({
        rules: {
            email: {
                required: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Vui lòng nhập email",
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
            },
        },
        errorPlacement: function(error, element) {
            let parent = $(element).parents(".form_group");
            if (parent.length > 0) {
                $(parent).append(error);
            }
        },
        submitHandler: function() {
            var email = $("#user_email").val(),
                password = $("#user_password_first").val();
            $('#login_uv').val('Đang xử lý').prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "../ajax/login.php",
                data: { email, password, type: 0},
                dataType: 'JSON',
                success: function(data) {
                    if (data.result) {
                        location.href = "/home/content_uv.php";
                    } else {
                        alert(data.msg);
                        $('#login_uv').val('Đăng nhập').prop("disabled", false);
                    }
                },
            });
        }
    });
});