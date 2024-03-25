<?php
if (isset($_POST['image'])) {
    // Nhận dữ liệu ảnh từ request và giải mã base64
    $imageData = $_POST['image'];
    $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));

    // Tạo tên file ngẫu nhiên để tránh trùng lặp
    $filename = 'image_res.png';

    // Đường dẫn đến thư mục lưu trữ ảnh
    $folderPath = '../rest-face';

    // Lưu ảnh vào thư mục
    file_put_contents($folderPath .'/'. $filename, $decodedImage);

    echo 'success';
} else {
    echo 'error';
}
?>