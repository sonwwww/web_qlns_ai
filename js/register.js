$(document).ready(function () {
	// check sdt
	$.validator.addMethod("validatePhone", function(value, element) {
	    return this.optional(element) || /^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|087|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/i.test(value);
	}, "Hãy nhập đúng định dạng số điện thoại");

	// check email
	$.validator.addMethod("validateEmail",
	    function(value, element) {
	        var regex_pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	        return regex_pattern.test(value);
	    }
	);

	// check email cty tồn tại
	$.validator.addMethod("checkEmailCty", function(email, element) {
        var status;
        $.ajax({
            type: "POST",
            url: "../ajax/check_email.php",
            dataType: 'json',
            async: false,
            data: {
                email: email,
                type: 1,
            },
            success: function(data) {
                status = data.result;
            },
        });
        return status;
    });

    // check email nv tồn tại
	$.validator.addMethod("checkEmailNv", function(email, element) {
        var status;
        $.ajax({
            type: "POST",
            url: "../ajax/check_email.php",
            dataType: 'json',
            async: false,
            data: {
                email: email,
                type: 0,
            },
            success: function(data) {
                status = data.result;
            },
        });
        return status;
    });

    // check id công ty
    $.validator.addMethod("checkIdCty", function(id_cty, element) {
        var status;
        $.ajax({
            type: "POST",
            url: "../ajax/check_idcty.php",
            dataType: 'json',
            async: false,
            data: { id_cty },
            success: function(data) {
                status = data.result;
            },
        });
        return status;
    });


	// form register công ty
	$("#formRegisterCty").validate({
        rules: {
            email: {
                required: true,
                email: true,
                validateEmail: true,
                checkEmailCty: true,
            },
            name: {
                required: true,
            },
            phone: {
            	validatePhone: true,
            },
            password: {
                required: true,
            },
            res_password: {
                required: true,
                equalTo: "#password",
            },
            address: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Vui lòng nhập tài khoản đăng nhập",
                email: "Vui lòng nhập đúng email",
                validateEmail: "Vui lòng nhập đúng email",
                checkEmailCty: "Email này đã được đăng ký",
            },
            name: {
                required: "Vui lòng nhập tên công ty",
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
            },
            res_password: {
                required: "Vui lòng nhập lại mật khẩu",
                equalTo: "Mật khẩu nhập lại chưa chính xác",
            },
            address: {
                required: "Vui lòng nhập địa chỉ",
            }
        },
        errorPlacement: function(error, element) {
            let parent = $(element).parents(".form-group");
            if (parent.length > 0) {
                $(parent).append(error);
            }
        },
        submitHandler: function() {
            var email = $("#email").val(),
                name = $("#name").val(),
                phone = $("#phone").val(),
                password = $("#password").val(),
                address = $("#address").val();

            $('#register_cty').val('Đang xử lý').prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "../ajax/register_company.php",
                data: { email, name, phone, password, address },
                dataType: 'JSON',
                success: function(data) {
                    if (data.result) {
                        location.href = '/web_qlns/home/login.php';
                    } else {
                        alert(data.msg);
                        $('#register_cty').val('Đăng ký').prop("disabled", false);
                    }
                },
            });
        }
    });

    // form register nhân viên
    $(".formRegisterNv").validate({
        rules: {
            email: {
                required: true,
                email: true,
                validateEmail: true,
                checkEmailNv: true,
            },
            username: {
                required: true,
            },
            phone: {
            	required: true,
            	validatePhone: true,
            },
            password: {
                required: true,
            },
            repassword: {
                required: true,
                equalTo: "#password",
            },
            address: {
                required: true,
            },
            id_cty: {
                required: true,
                checkIdCty: true,
            },
        },
        messages: {
            email: {
                required: "Vui lòng nhập tài khoản đăng nhập",
                email: "Vui lòng nhập đúng email",
                validateEmail: "Vui lòng nhập đúng email",
                checkEmailNv: "Email này đã được đăng ký",
            },
            username: {
                required: "Vui lòng nhập tên công ty",
            },
            phone: {
            	required: "Vui lòng nhập số điện thoạsi",
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
            },
            repassword: {
                required: "Vui lòng nhập lại mật khẩu",
                equalTo: "Mật khẩu nhập lại chưa chính xác",
            },
            address: {
                required: "Vui lòng nhập địa chỉ",
            },
            id_cty: {
                required: "Vui lòng nhập id công ty",
                checkIdCty: "Id công ty không tồn tại",
            },
        },
        errorPlacement: function(error, element) {
            let parent = $(element).parents(".group-control");
            if (parent.length > 0) {
                $(parent).append(error);
            }
        },
        submitHandler: function() {
            var email = $("#email").val(),
                username = $("#username").val(),
                phone = $("#phone").val(),
                password = $("#password").val(),
                id_cty = $("#id_cty").val(),
                address = $("#address").val();

            $('#register_web').val('Đang xử lý').prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "../ajax/register_nv.php",
                data: { email, username, phone, password, address, id_cty },
                dataType: 'JSON',
                success: function(data) {
                    if (data.result) {
                        location.href = '/web_qlns/home/login.php';
                    } else {
                        alert(data.msg);
                        $('#register_web').val('Đăng ký').prop("disabled", false);
                    }
                },
            });
        }
    });
});