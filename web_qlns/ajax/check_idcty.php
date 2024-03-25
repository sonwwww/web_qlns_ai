<?
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();

$id_cty = $_POST['id_cty'];
if ($id_cty) {
	$data_user = mysqli_query($conn, "SELECT * FROM user_cty WHERE id_cty = $id_cty LIMIT 1");

	if ($data_user->num_rows > 0) {
		echo json_encode([
			'result' => true,
		]);
	} else {
		echo json_encode([
			'result' => false,
			'msg' => 'Id công ty không tồn tại'
		]);
	}
}

mysqli_close($conn);
?>