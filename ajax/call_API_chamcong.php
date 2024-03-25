
<?
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();
?>

<?php
$ID_cookie_value = $_COOKIE['UID'];
$type_cookie_value = $_COOKIE['UT'];
if ($ID_cookie_value){
    if($type_cookie_value==0){
        header("Location: ./home/login.php");
    }else{
        $id_cty = $ID_cookie_value;
    }
}else{
    header("Location: ./home/login.php");
}
?>
<?php 

$id_nv = $_POST['name'];
$timestamp = $_POST['timestamp'];
$type = $_POST['type'];
$date_cc = explode(" ",$timestamp);
$time_vao = 0;
$time_ra = 0;
$id_ca = 0;
$sql_ca = "SELECT * FROM ql_ca WHERE id_cty = $id_cty";
$result_ca = mysqli_query($conn, $sql_ca);
$time = $date_cc[1];
if (mysqli_num_rows($result_ca) > 0) {
	while ($row_ca = mysqli_fetch_assoc($result_ca)) {
		$khoangvao1 = new DateTime($row_ca["time_on"]);
		$time_v = $khoangvao1->modify('-30 minutes');
		$vao = $time_v->format('H:i:s');

		$khoangra = new DateTime($row_ca["time_out"]);
		$time_r = $khoangra->modify('+30 minutes');
		$ra = $time_r->format('H:i:s');
		if ($vao <= $time && $time <= $ra){
			if ($vao <= $time && $time <= $row_ca["time_out"]){
				$time_vao = 1;
				$id_ca = $row_ca["Stt_ca"];
			} elseif ($time >= $row_ca["time_out"]) {
				$time_ra = 1;
				$id_ca = $row_ca["Stt_ca"];
			} 
		}
	}
} else {
	echo "0 results";
}
if ($id_nv && $timestamp) {
	$date_cc = explode(" ",$timestamp);
	$currentDate = date("Y-m-d");
	$dem = 0;
	if($time_vao == 1){
		$sql_l = mysqli_query($conn, "SELECT COUNT(*) AS luot FROM ql_chamcong WHERE id_nv = $id_nv AND date_cc = '$date_cc[0]' AND Stt_ca = '$id_ca' AND ca_vao = 1");
		$result_t = mysqli_fetch_array($sql_l);
		$dem = $result_t['luot'];
	} elseif($time_ra == 1){
		$sql_l = mysqli_query($conn, "SELECT COUNT(*) AS luot FROM ql_chamcong WHERE id_nv = $id_nv AND date_cc = '$date_cc[0]' AND Stt_ca = '$id_ca' AND ca_ra = 1");
		$result_t = mysqli_fetch_array($sql_l);
		$dem = $result_t['luot'];
	}
	if($time_vao ==1 || $time_ra == 1){
		if($dem == 0){
			$data_user = mysqli_query($conn, "INSERT INTO ql_chamcong (id_nv, thoigian, id_cty, date_cc, ca_vao, ca_ra, Stt_ca) VALUES ('$id_nv', '$date_cc[1]', '$id_cty', '$date_cc[0]', '$time_vao', '$time_ra', '$id_ca')");
		}else{
			$data_user = mysqli_query($conn, "INSERT INTO ql_chamcong (id_nv, thoigian, id_cty, ca_vao, ca_ra, Stt_ca) VALUES ('$id_nv', '$date_cc[1]', '$id_cty', '$time_vao', '$time_ra', '$id_ca')");
		}
	}else{
		echo json_encode([
			'result' => false,
			'msg' => 'Không nhận diện được khuôn mặt'
		]);
	}
	$filePath = "C:/xampp/htdocs/web_qlns/rest-face/image_res.png";
	if (file_exists($filePath)) {
		unlink($filePath);
	}
} else {
	echo json_encode([
		'result' => false,
		'msg' => 'Không nhận diện được khuôn mặt'
	]);
}

?>