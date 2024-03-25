$(document).ready(function () {
    $(document).on("keydown", function(e) {
        if (!$("#quen_mk").is(":disabled") && $("#form-quen-mk").is(":visible")) {
            if (e.which == 13 || e.keyCode == 13) {
                $("#form-quen-mk").submit();
            }
        }
    });

    // form login công ty
    $("#form-quen-mk").validate({
        rules: {
            loai_tk: {
                required: true,
            },
            email_mk: {
                required: true,
            },
        },
        messages: {
            loai_tk: {
                required: "Vui lòng chọn loại tài khoản",
            },
            email_mk: {
                required: "Vui lòng nhập email",
            },
        },
        errorPlacement: function(error, element) {
            let parent = $(element).parents(".form_group");
            if (parent.length > 0) {
                $(parent).append(error);
            }
        },
        submitHandler: function() {
            var email_mk = $("#email_mk").val(),
                loai_tk = $("#loai_tk").val();
            $('#quen_mk').val('Đang xử lý').prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "../ajax/gui_mail.php",
                data: { email_mk, loai_tk},
                dataType: 'JSON',
                success: function(data) {
                    if (data.result) {
                        location.href = "/web_qlns/home/xacthuc.php";
                    } else {
                        alert(data.msg);
                        $('#quen_mk').val('Tiếp theo').prop("disabled", false);
                    }
                },
            });
        }
    });

})