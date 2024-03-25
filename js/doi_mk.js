$(document).ready(function () {
    $(document).on("keydown", function(e) {
        if (!$("#doi_mk").is(":disabled") && $("#form-quen-dmk").is(":visible")) {
            if (e.which == 13 || e.keyCode == 13) {
                $("#form-quen-dmk").submit();
            }
        }
    });

    // form login công ty
    $("#form-quen-dmk").validate({
        rules: {
            makhau1: {
                required: true,
            },
            makhau2: {
                required: true,
            },
        },
        messages: {
            makhau1: {
                required: "Vui lòng nhập lại mật khẩu",
            },
            makhau2: {
                required: "Vui lòng nhập lại mật khẩu",
            },
        },
        errorPlacement: function(error, element) {
            let parent = $(element).parents(".form_group");
            if (parent.length > 0) {
                $(parent).append(error);
            }
        },
        submitHandler: function() {
            var matkhau1 = $("#makhau1").val(),
                matkhau2 = $("#makhau2").val();
            $('#doi_mk').val('Đang xử lý').prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "../ajax/doi_mk.php",
                data: { matkhau1, matkhau2},
                dataType: 'JSON',
                success: function(data) {
                    if (data.result) {
                        location.href = "/web_qlns/home/login.php";
                    } else {
                        alert(data.msg);
                        $('#doi_mk').val('Tiếp theo').prop("disabled", false);
                    }
                },
            });
        }
    });

})