<?php
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();
?>

<?php
if(isset($_GET['id_ca'])) {
    $id = $_GET['id_ca'];
    echo "id: ".$id;
    $sql_delete = "DELETE FROM ql_ca WHERE Stt_ca = $id";
    $result = mysqli_query($conn, $sql_delete);

    // Kiểm tra kết quả truy vấn và thông báo cho người dùng
    if ($result) {
        echo 'Dữ liệu đã được xóa thành công.';
    } else {
        echo 'Có lỗi xảy ra khi xóa dữ liệu: ' . mysqli_error($conn);
    }
} else {
    echo 'Không có ID được truyền vào.';
}

// Đóng kết nối cơ sở dữ liệu sau khi thực hiện
mysqli_close($conn);
?>
