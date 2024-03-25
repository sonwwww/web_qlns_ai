<?php
// header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_cookie_value = $_COOKIE['UID'];
    // Đường dẫn thư mục lưu trữ ảnh
    $uploadPath = '../data/'. $ID_cookie_value;
    $folderPath = 'C:/xampp/htdocs/web_qlns/data'.$ID_cookie_value.'/';
    // Kiểm tra nếu thư mục không tồn tại, tạo mới
    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }else{
        $files = scandir($folderPath);
        var_dump($files);
        // Lặp qua từng file và xóa nó
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                $filePath = $folderPath . $file;

                // Kiểm tra xem là file không phải là thư mục
                if (is_file($filePath)) {
                    // Thực hiện xóa file
                    unlink($filePath);
                }
            }
        }
    }

    // Lấy dữ liệu từ 'php://input'
    $data = json_decode(file_get_contents('php://input'), true);

    if ($data && isset($data['images'])) {
        $imageArray = $data['images'];

        foreach ($imageArray as $key => $dataURL) {
            // Chuyển dữ liệu base64 thành dữ liệu binh thường
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $dataURL));

            // Tạo tên tệp ảnh mới
            $filename = $uploadPath . '/image_' . $key . '_' . time() . '.png';

            // Lưu ảnh vào thư mục
            file_put_contents($filename, $imageData);
        }

        echo 'Images saved successfully!';
    } else {
        // Dữ liệu không hợp lệ hoặc không đúng định dạng
        echo 'Invalid or missing image data.';
    }
} else {
    echo 'Invalid request.';
}
?>