<?php
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();
?>

<?php
if(isset($_GET['id_nv'])) {
    $id = $_GET['id_nv'];
    $sql_delete = "DELETE FROM user_nv WHERE id_nv = $id";
    $result = mysqli_query($conn, $sql_delete);
    $sql_delete_db_luong = "DELETE FROM ql_luong WHERE id_nv = $id";
    $result_luong = mysqli_query($conn, $sql_delete_db_luong);
    $sql_delete_db_chamcong = "DELETE FROM ql_chamcong WHERE id_nv = $id";
    $result_chamcong = mysqli_query($conn, $sql_delete_db_chamcong);

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
