
<?php
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();

$ID_cookie_tk = $_COOKIE['IDUQMK'];
$type_cookie_tk = $_COOKIE['UTK'];
$matkhau1 = $_POST['matkhau1'];
$matkhau2 = $_POST['matkhau2'];

if($type_cookie_tk == 0) {
    if($matkhau1 == $matkhau2){
        $matkhau = md5($matkhau2);
        $data_user = mysqli_query($conn, "UPDATE user_nv SET passwords_nv = '$matkhau' WHERE id_nv = $ID_cookie_tk");
        echo json_encode([
			'result' => true,
			'msg' => 'Đổi mật khẩu thành công'
		]);
        setcookie("IDUQMK", "", time() - 3600, "/");
        setcookie("UTK", "", time() - 3600, "/");
    }else{
        echo json_encode([
            'result' => false,
            'msg' => 'Không thể đổi mật khẩu'
        ]);
    }
}else {
    if($matkhau1 == $matkhau2){
        // $matkhau = md5($matkhau2);
        $data_user = mysqli_query($conn, "UPDATE user_cty SET passwords_cty = '$matkhau2' WHERE id_cty = $ID_cookie_tk");
        echo json_encode([
			'result' => true,
			'msg' => 'Đổi mật khẩu thành công'
		]);
        setcookie("IDUQMK", "", time() - 3600, "/");
        setcookie("UTK", "", time() - 3600, "/");
    }else{
        echo json_encode([
            'result' => false,
            'msg' => 'Mã xác thực không chính xác hay nhập lại'
        ]);
    }
}
mysqli_close($conn);
?>