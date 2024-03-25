$(document).ready(function () {
    $(document).on("keydown", function(e) {
        if (!$("#xac-thuc").is(":disabled") && $("#form-quen-m").is(":visible")) {
            if (e.which == 13 || e.keyCode == 13) {
                $("#form-quen-m").submit();
            }
        }
    });

    // form login công ty
    $("#form-quen-m").validate({
        rules: {
            ma_xt: {
                required: true,
            }
        },
        messages: {
            ma_xt: {
                required: "Vui lòng nhập lại mã xác thực.",
            }
        },
        errorPlacement: function(error, element) {
            let parent = $(element).parents(".form_group");
            if (parent.length > 0) {
                $(parent).append(error);
            }
        },
        submitHandler: function() {
            var ma_xt = $("#ma_xt").val();
            $('#xac-thuc').val('Đang xử lý').prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "../ajax/xacthuc.php",
                data: {ma_xt},
                dataType: 'JSON',
                success: function(data) {
                    if (data.result) {
                        location.href = "/web_qlns/home/doi-mk.php";
                    } else {
                        alert(data.msg);
                        $('#xac-thuc').val('Tiếp theo').prop("disabled", false);
                    }
                },
            });
        }
    });

})