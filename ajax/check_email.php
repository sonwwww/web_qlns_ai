<?
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();

$email = $_POST['email'];
$email = preg_replace('/\s+/', '', $email);

$type = $_POST['type'];

if ($email != '') {
	if ($type == 0) {
		$data_user = mysqli_query($conn, "SELECT * FROM user_nv WHERE email_nv = '$email' LIMIT 1");
	} else {
		$data_user = mysqli_query($conn, "SELECT * FROM user_cty WHERE email = '$email' LIMIT 1");
	}
	if ($data_user->num_rows > 0) {
		echo json_encode([
			'result' => false,
		]);
	} else {
		echo json_encode([
			'result' => true,
		]);
	}
}

mysqli_close($conn);
?>