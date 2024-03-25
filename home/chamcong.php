<?php
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();
?>
<?php
$ID_cookie_value = $_COOKIE['UID'];
$type_cookie_value = $_COOKIE['UT'];
if ($ID_cookie_value){
    if($type_cookie_value==0){
        header("Location: ./home/login.php");
    }else{
        $id_cty = $ID_cookie_value;
    }
}else{
    header("Location: ./home/login.php");
}
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
    <style>
        .page-cham-cong {
            width: 100%;
            float: left;
            background-color: #4c5ad4;
        }

        #video-container {
            float: left;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #video-cham-cong {
            width: 900px;
            height: 772px;
            position: relative;
            z-index: 1;
        }

        #countdown {
            position: absolute;
            width: max-content;
            height: 39px;
            top: auto;
            right: auto;
            font-size: 20px;
            color: #fff;
            background-color: red;
            z-index: 2;
            border-radius: 5px;
            padding-top: 8px;
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="../css/view.css" type="text/css" />
    <link rel="stylesheet" href="../css/history_timekeeping.css" type="text/css" />
    <link rel="stylesheet" href="../css/register_company.css" type="text/css" />
    <link rel="stylesheet" href="../css/giaodien.css">
    <!-- //font-awesome icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div class="page-cham-cong" style="display: block">
        <div id="video-container">
            <video id="video-cham-cong" playsinline autoplay></video>
            <div id="countdown">Chấm công sau... </div>
        </div>
    </div>
    <?php
    $sql_sel_chamcong = mysqli_query($conn, "SELECT * FROM ql_chamcong ORDER BY STT DESC LIMIT 1");
    $row_chamcong = mysqli_fetch_assoc($sql_sel_chamcong);
    $id_nv = $row_chamcong["id_nv"];
    $sql_sel_name= mysqli_query($conn, "SELECT * FROM user_nv WHERE id_nv = $id_nv");
    $row_name = mysqli_fetch_assoc($sql_sel_name);
    ?>
    <div class="popup-content" style="display: none">
        <div class="form-popup-true">
            <div class="name_nv_cc"><?php echo  $row_name['name_nv']?></div>
            <div class="id_nv_cc" id="id_nv_cc"><?php echo $row_chamcong['id_nv'];?></div>
            <div class="tg_cham_cong" id="time_cc">
                <?php 
                if(!$row_chamcong['date_cc']){
                    echo $row_chamcong['date_cc']." ".$row_chamcong['thoigian']; 
                }else{
                    echo "Đã chấm công";
                }
                ?></div>
            <div class="confint-cc">
                <button class="confint-no-user">Không phải tôi</button>
                <button class="exit-cc">Thoát</button>
            </div>
        </div>
        <div class="form-popup-false">
            <div class="name_nv_cc">
                Không nhận diện được khuôn mặt!
            </div>
            <div class="confint-cc">
                <button class="confint-yes-user">Chấm công lại</button>
                <button class="exit-cc">Thoát</button>
            </div>
        </div>
    </div>
</body>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const video = document.getElementById('video-cham-cong');
            const countdown = document.getElementById('countdown');
            let countdownValue = 5; // Thời gian đếm ngược (s)

            const folderPath = 'rest-face';
            // Kiểm tra xem trình duyệt có hỗ trợ getUserMedia hay không
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                // Mở camera
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function (stream) {
                        video.srcObject = stream;

                        // Bắt đầu đếm ngược
                        startCountdown();
                    })
                    .catch(function (error) {
                        console.error('Error accessing camera:', error);
                    });
            } else {
                alert('Sorry, your browser does not support getUserMedia.');
            }

            var reloadButtons = document.getElementsByClassName('confint-no-user');
            if (reloadButtons.length > 0) {
                // Chuyển HTMLCollection hoặc NodeList thành mảng
                reloadButtons = Array.from(reloadButtons);
            
                // Gắn sự kiện click cho mỗi button
                reloadButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        // Load lại trang khi click vào button
                        location.reload();
                        // deleteFiles()
                    });
                });
            } else {
                console.error('No buttons with class "reload-button" found.');
            }

            var outButtons = document.getElementsByClassName('exit-cc');
            if (outButtons.length > 0) {
                // Chuyển HTMLCollection hoặc NodeList thành mảng
                outButtons = Array.from(outButtons);
            
                // Gắn sự kiện click cho mỗi button
                outButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        // Load lại trang khi click vào button
                        // deleteFiles()
                        window.location.href = './content_cham_cong.php';
                        
                    });
                });
            } else {
                console.error('No buttons with class "reload-button" found.');
            }

            var doneButtons = document.getElementsByClassName('confint-yes-user');
            if (doneButtons.length > 0) {
                // Chuyển HTMLCollection hoặc NodeList thành mảng
                doneButtons = Array.from(doneButtons);
            
                // Gắn sự kiện click cho mỗi button
                doneButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        // Load lại trang khi click vào button
                        // deleteFiles()
                        location.reload();
                        
                    });
                });
            } else {
                console.error('No buttons with class "reload-button" found.');
            }
            function deleteFiles() {
                fetch('../rest-face', { method: 'DELETE' })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error deleting files');
                    }
                    return response.text();
                })
                .then(message => {
                console.log(message);
                })
                .catch(error => {
                console.error('Error:', error.message);
                });

                // Gửi yêu cầu DELETE đến server
                xhr.send();
            }
            // Hàm bắt đầu đếm ngược
            function startCountdown() {
                let timer = setInterval(function () {
                    countdown.innerText = countdownValue;

                    if (countdownValue === 0) {
                        clearInterval(timer);
                        countdown.innerText = 'Capturing...';
                        setTimeout(() => {
                            $('#countdown').css("display", 'none');
                        }, 2000);
                        // Thực hiện các hành động khi kết thúc đếm ngược
                        captureImage();
                        callApi();
                        
                    }

                    countdown.innerText = 'Chấm công sau... ' + countdownValue--;
                }, 1000);
            }

            // Hàm chụp ảnh khi kết thúc đếm ngược
            function captureImage() {
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;

                context.drawImage(video, 0, 0, canvas.width, canvas.height);

                // Chuyển canvas thành dạng base64 để có thể lưu thành ảnh
                const imageDataURL = canvas.toDataURL('image/png');
                // Sử dụng XMLHttpRequest để gửi dữ liệu ảnh lên máy chủ PHP
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'save_img_rest.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                // Gửi dữ liệu ảnh lên server
                xhr.send('image=' + encodeURIComponent(imageDataURL));
            }
            function callApi() {
                // Sử dụng XMLHttpRequest để gọi API
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Parse JSON và hiển thị kết quả lên màn hình
                        var response = JSON.parse(xhr.responseText);
                        leg = response.result.length;
                        if(leg != 0){
                            var resultID = document.getElementById('id_nv_cc');
                            var resultTime = document.getElementById('time_cc');
                            // fetch(`/delete-files?folderPath=${folderPath}`, {
                            //     method: 'DELETE'
                            // })
                            // Lấy thông tin từ JSON và hiển thị
                            var name = response.result[0].name;
                            var timestamp = response.result[0].timestamp;
                            $.ajax({
                                type: "POST",
                                url: "../ajax/call_API_chamcong.php",
                                data: { name, timestamp, type: 1},
                                dataType: 'JSON',
                                success: function(data) {
                                    if (data.result) {
                                        location.href = "/web_qlns/home/chamcong.php";
                                    } else {
                                        alert(data.msg);
                                    }
                                },
                            });
                            $('.popup-content').css("display", 'block');
                            $('.form-popup-false').css("display", 'none');
                            // resultID.innerHTML = 'ID: ' + name;
                            // resultTime.innerHTML = 'Thời gian chấm công: ' + timestamp;
                            setTimeout(() => {
                                $('.popup-content').css("display", 'none');
                                $('.form-popup-false').css("display", 'block');
                                location.reload();
                            }, 6000);
                            
                        }else{
                            $('.popup-content').css("display", 'block');
                            $('.form-popup-true').css("display", 'none');
                            // $('.popup-content').css("display", 'none');
                        }
                    }
                };
                
                // Gọi API
                xhr.open('POST', 'http://127.0.0.1:8083/identified', true);
                xhr.send();
            }

            function postResultToServer(resultData) {
                fetch('http://localhost:8998/web_qlns/home/chamcong.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(resultData)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error posting result to server');
                    }
                    console.log('Result posted to server successfully');
                })
                .catch(error => {
                    console.error("Error posting result to server:", error.message);
                });
            }
        });
        
    </script>
<script src="../js/view.js"></script>

</html>

<?php
mysqli_close($conn);
?>