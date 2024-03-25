$(document).ready(function () {
    $(document).on('click', '#pick-cty', function(){
        $('#pick-tk').css("display", 'none');
        $('#login-uv').css("display", 'none');
        $('#login-cty').css("display", 'flex');
    })

    $(document).on('click', '#pick-uv', function(){
        $('#pick-tk').css("display", 'none');
        $('#login-cty').css("display", 'none');
        $('#login-uv').css("display", 'flex');
    })

    $(document).on('click', '.icon-out', function(){
        $('#pick-tk').css("display", 'flex');
        $('#login-cty').css("display", 'none');
    })

    $(document).on('click', '.box_dangnhap', function(){
        $('.register_content').css("display", 'none');
        $('.login-web').css("display", 'block');
    })

    $(document).on('click', '.box_dangky', function(){
        $('.login-web').css("display", 'none');
        $('.register_content').css("display", 'block');
    })

    $(document).on('click', '#register_web', function(){
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var repassword = document.getElementById('repassword').value;
        var number_phone = document.getElementById('number_phone').value;
        var address = document.getElementById('address').value;
    
        if (username === '' || email === '' || password === '' || repassword === '' || number_phone === '' || address === '') {
            alert('Vui lòng điền đầy đủ thông tin.');
        } else {
            document.getElementById('registrationForm').submit();
        }
    })

    $(document).on('click','.ant-menu-1', function(){
        $('.login_form').css("display", 'none');
        $('.page_content_website').css("display", 'block');
    })
})