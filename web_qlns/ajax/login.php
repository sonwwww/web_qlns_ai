<?
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();

$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);
$type = $_POST['type'];

if ($email != '' && $password != '') {
	if ($type == 0) {
		$data_user = mysqli_query($conn, "SELECT * FROM user_nv WHERE email_nv = '$email' AND passwords_nv = '$password' LIMIT 1");
	} else {
		$data_user = mysqli_query($conn, "SELECT * FROM user_cty WHERE email = '$email' AND password = '$password' LIMIT 1");
	}
	if ($data_user->num_rows > 0) {
		$data = mysqli_fetch_array($data_user);
		$id = ($type == 0) ? $data['id_nv'] : $data['id_cty'];
		setcookie("UID", $id, time() + 60 * 60 * 24 * 30, '/');
    	setcookie("UT", $type, time() + 60 * 60 * 24 * 30, '/');
    	echo json_encode([
			'result' => true,
			'msg' => 'Đăng nhập thành công'
		]);
	} else {
		echo json_encode([
			'result' => false,
			'msg' => 'Thông tin không đúng'
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