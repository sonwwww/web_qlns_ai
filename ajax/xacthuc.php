
<?php
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();

$ID_cookie_tk = $_COOKIE['IDUQMK'];
$type_cookie_tk = $_COOKIE['UTK'];
$ma_xt = $_POST['ma_xt'];
if($type_cookie_tk == 0) {
    $data_user = mysqli_query($conn, "SELECT * FROM user_nv WHERE id_nv = $ID_cookie_tk LIMIT 1");
    $data = mysqli_fetch_array($data_user);
    if($ma_xt == $data['otp']){
        echo json_encode([
			'result' => true,
			'msg' => 'Xác thực thành công'
		]);
    }else{
        echo json_encode([
            'result' => false,
            'msg' => 'Mã xác thực không chính xác hay nhập lại'
        ]);
    }
}else {
    $data_user = mysqli_query($conn, "SELECT * FROM user_cty WHERE id_cty = $ID_cookie_tk LIMIT 1");
    $data = mysqli_fetch_array($data_user);
    if($ma_xt == $data['otp']){
        echo json_encode([
			'result' => true,
			'msg' => 'Xác thực thành công'
		]);
    }else{
        echo json_encode([
            'result' => false,
            'msg' => 'Mã xác thực không chính xác hay nhập lại'
        ]);
    }
}
mysqli_close($conn);
?>