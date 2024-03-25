<?php
// Đường dẫn đến folder chứa ảnh
$folderPath = '../rest-face';

// Địa chỉ API của ứng dụng Flask
$apiUrl = 'http://127.0.0.1:8083/identified';

// Lấy danh sách các tệp trong folder
$imageFiles = scandir($folderPath);

// Tạo một mảng để lưu kết quả
$results = array();

// Lặp qua từng tệp ảnh
foreach ($imageFiles as $imageFile) {
    // Bỏ qua các tệp "." và ".."
    if ($imageFile != "." && $imageFile != "..") {
        // Đường dẫn đầy đủ đến ảnh
        $imagePath = $folderPath . '/' . $imageFile;

        // Đọc nội dung của ảnh và chuyển đổi sang base64
        $imageData = base64_encode(file_get_contents($imagePath));

        // Gửi ảnh qua API '/recog_folder' để nhận tên
        $postData = array(
            'image' => $imageData,
            'w' => 0,
            'h' => 0
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        // Lưu kết quả vào mảng
        $results[] = array('image' => $imageFile, 'name' => $response);
    }
}

// In kết quả
print_r($results);
?>