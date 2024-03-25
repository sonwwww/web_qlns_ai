<?php
include('../database/connectdb.php');
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
    <link rel="stylesheet" href="../css/view.css" type="text/css" />
    <link rel="stylesheet" href="../css/history_timekeeping.css" type="text/css" />
    <link rel="stylesheet" href="../css/register_company.css" type="text/css" />
    <link rel="stylesheet" href="../css/giaodien.css">
    <!-- //font-awesome icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div class="log-w3" style="display: block;">
        <div class="w3layouts-main">
            <?php
            include('../includes/header3.php');
            ?>
        </div>
    </div>
    <div class="page_content_website" style="display: block;">
        <?php
        include('../home/menu_uv.php');
        ?>
        <div class="update-face page_nv active">
            <div class="content-video-wrap">
                <video id="video" playsinline autoplay></video>
                <div class="controller">
                    <button id="snap">Chụp Ảnh</button>
                </div>
            </div>
            <div class="content-face-img">
                <div class="face-img">
                    <p class="title-controller-face">Ảnh đã chụp</p>
                    <div id="img-show" style="width: 100%; float:left;"></div>
                    <!-- <canvas id="canvas" width="310px" height="250px"></canvas> -->
                </div>
                <div class="bt-closs-upd">
                    <a href="./content_update_face.php"><button id="out-upd">Thoát</button></a>
                    <a href="#"><button id="closs-upd">Lưu</button></a>
                </div>
            </div>
        </div>


    </div>
    <?php
    include('../includes/footer.php');
    ?>

</body>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const captureButton = document.getElementById('snap');
            const imageContainer = document.getElementById('img-show');
            const saveButton = document.getElementById('closs-upd');
            let imageIndex = 1;
            let capturedImages = [];

            // Mở camera và chụp ảnh
            captureButton.addEventListener('click', function () {
                const videoConstraints = {
                    video: {
                        facingMode: 'user',
                        width: { ideal: 640 },
                        height: { ideal: 480 }
                    }
                };
                const video = document.getElementById('video');

                // Kiểm tra xem trình duyệt có hỗ trợ getUserMedia hay không
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    // Mở camera
                    navigator.mediaDevices.getUserMedia({ video: true })
                        .then(function (stream) {
                            video.srcObject = stream;
                        })
                        .catch(function (error) {
                            console.error('Error accessing camera:', error);
                        });
                } else {
                    alert('Sorry, your browser does not support getUserMedia.');
                }

                navigator.mediaDevices.getUserMedia(videoConstraints)
                    .then(function (stream) {
                        const video = document.createElement('video');
                        video.srcObject = stream;
                        video.play();

                        // Tạo canvas để vẽ hình ảnh từ video
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');

                        // Chụp ảnh khi nhấn nút
                        captureButton.onclick = function () {
                            canvas.width = video.videoWidth;
                            canvas.height = video.videoHeight;
                            context.drawImage(video, 0, 0, canvas.width, canvas.height);

                            // Hiển thị ảnh đã chụp
                            if (imageIndex <= 6) {
                                const capturedImage = document.createElement('img');
                                capturedImage.src = canvas.toDataURL('image/png');
                                capturedImage.classList.add('captured-image');
                                capturedImage.alt = 'Captured Image ' + imageIndex++;

                                capturedImages.push(canvas.toDataURL('image/png'));

                                imageContainer.appendChild(capturedImage);
                            } else {
                                $(".captured-image:first").remove();
                                const capturedImage = document.createElement('img');
                                capturedImage.src = canvas.toDataURL('image/png');
                                capturedImage.classList.add('captured-image');
                                capturedImage.alt = 'Captured Image ' + imageIndex++;

                                capturedImages.push(canvas.toDataURL('image/png'));

                                imageContainer.appendChild(capturedImage);
                            }
                        };
                    })
                    .catch(function (error) {
                        console.error('Error accessing camera:', error);
                    });
            });

            // Lưu ảnh khi nhấn nút Save
            saveButton.addEventListener('click', function () {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'save_images.php', true);
                xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText);
                    }
                };
                xhr.send(JSON.stringify({ images: capturedImages }));
                alert('Cập nhật data khuôn mặt thành công');
                window.location.href = './content_update_face.php';
                callApiUd()
            });

            function callApiUd() {
                fetch('http://127.0.0.1:8083/cut_img', {
                    method: 'POST'
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('API 1 request failed');
                    }
                    return response.json();
                })
                .then(data => {
                    //console.log('API 1 response:', data);
                    // Gọi API 2 sau khi API 1 hoàn thành
                    return callApiTrain();
                })
                .then(data => {
                    //onsole.log('API 2 response:', data);
                    console.log('Cập nhật data khuôn mặt thành công');
                    // Đã hoàn thành cả hai API
                    
                })
                .catch(error => {
                    console.error(error.message);
                });
                
            }
            function callApiTrain() {
                return fetch('http://127.0.0.1:8083/train_model', {
                    method: 'POST'
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('API 2 request failed');
                    }
                    return response.json();
                });
            }
        });
    </script>
<!-- <script src="../js/chamcong.js"></script> -->
<script src="../js/view.js"></script>

</html>

<?php
mysqli_close($conn);
?>