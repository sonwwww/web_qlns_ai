
<div class="page-cham-cong" style="display: none">
    <div class="content-cc-video-wrap">
        <video id="camera" width="640" height="480" autoplay></video>
        <div id="countdown">5</div>
        <button onclick="startCountdown()">Start Countdown</button>
    </div>
</div>
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