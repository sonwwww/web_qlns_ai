<?
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();

$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$password = md5($password);
$address = $_POST['address'];

if ($email != '' && $name != '' && $password != '' && $address != '') {
	$insert = mysqli_query($conn, "INSERT INTO user_cty(name_cty, email, sdt, password, diachi) VALUES ('$name', '$email', '$phone', '$password', '$address')");
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