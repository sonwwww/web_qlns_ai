<?
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();

$email = $_POST['email'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$password = md5($password);
$address = $_POST['address'];
$id_cty = $_POST['id_cty'];

if ($email != '' && $username != '' && $password != '' && $address != '' && $id_cty > 0) {
	$insert = mysqli_query($conn, "INSERT INTO user_nv(id_cty, name_nv, sdt_nv, email_nv, passwords_nv, diachi) VALUES ('$id_cty', '$username', '$phone', '$email', '$password', '$address')");
	if ($insert) {
		echo json_encode([
			'result' => true,
			'msg' => 'Đăng ký thành công'
		]);
	} else {
		echo json_encode([
			'result' => false,
			'msg' => 'Đăng ký thất bại'
		]);
	}
} else {
	echo json_encode([
		'result' => false,
		'msg' => 'Thông tin không đầy đủ'
	]);
}

mysqli_close($conn);
?>