<?php
include('database/connectdb.php');
ob_start();
session_start();
ob_end_flush();
?>
<!DOCTYPE html>

<head>
    <title>Roobi203</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="./css/view.css" type="text/css" />
    <link rel="stylesheet" href="./css/history_timekeeping.css" type="text/css" />
    <link rel="stylesheet" href="./css/register_company.css" type="text/css" />
    <link rel="stylesheet" href="./css/giaodien.css">
    <!-- //font-awesome icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div class="page-cham-cong" style="display: none">
        <div class="content-cc-video-wrap">
            <video id="camera" width="640" height="480" autoplay></video>
            <div id="countdown">5</div>
            <button onclick="startCountdown()">Start Countdown</button>
        </div>
    </div>
</body>
<script>
(function () 
{
    // BƯỚC 1: KHỞI TẠO CÁC BIẾN
    var video = document.getElementById('camera');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var vendoUrl = window.URL || window.webkitURL;
 
    // BƯỚC 2: XỬ LÝ HIỂN THỊ WEBCAM BAN ĐẦU
    canvas.style.display = 'none'; // Ẩn thẻ canvas khi vừa tải trang
 
    // Biến chưa hình ảnh webcam tuỳ theo loại từng trình duyệt
    navigator.getMedia = navigator.getUserMedia ||
            navigator.webkitGetUserMedia ||
            navigator.mozGetUserMedia ||
            navigator.msGetUserMedia;
 
    // Hàm lấy hình ảnh webcam
    navigator.getMedia({
        video: true, // Có hình ảnh
        audio: false // Không có âm thanh
                // Hàm chèn đường dẫn webcam vào thẻ video
    }, function (stream) {
        video.src = vendoUrl.createObjectURL(stream);
        video.play(); // Phát thẻ video
        // Hàm thông báo khi xảy lỗi hoặc không hỗ trợ trên trình duyệt này
    }, function (error) {
        alert('Rất tiếc đã xảy ra lỗi, có thể do trình duyệt của bạn không hỗ trợ chức năng này hoặc trang này chưa kết nối riêng tư https.');
    });
    
    // XỬ LÝ SỰ KIỆN CLICK VÀO NÚT CHỤP ẢNH
    // document.getElementById('capture').addEventListener('click', function () 
    // {
    function startCamera() {
        canvas.style.display = 'block'; // Hiện thẻ canas
        // In hình ảnh lên thẻ canvas ở x = 0, y = 0, width = 400, height = 300
        context.drawImage(video, 0, 0, 400, 300);
        data = canvas.toDataURL(); // Tạo một đường dẫn hình ảnh của canvas
        // Gửi dữ liệu ảnh đến file saveimg.php thông qua phương thức POST
        $.ajax({
            type: "POST",
            url: "saveimg.php",
            data: {
                imgBase64: data
            }
            // Sau khi gửi dữ liệu thành công thì sẽ thêm nút Đi tới link ảnh 
        });
        // .done(function (result) {
        //     $('.booth').append('<a href="' + result + '">Đi tới link ảnh</a>');
        // });
    };
    // Hàm để đếm ngược và chụp ảnh
    function startCountdown() {
        startCamera();

        const countdownInterval = setInterval(() => {
            countdownElement.textContent = countdown;
            countdown--;

            if (countdown < 0) {
                clearInterval(countdownInterval);
                takePhoto();
            }
        }, 1000);
    }
})();
</script>
<script src="./js/chamcong.js"></script>
<script src="./js/view.js"></script>

</html>

<?php
mysqli_close($conn);
?>