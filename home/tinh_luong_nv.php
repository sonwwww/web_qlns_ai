<?php
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
        $id_nv = $ID_cookie_value;
    }else{
        header("Location: ./home/login.php");
    }
}else{
    header("Location: ./home/login.php");
}
?>

<?php
// Xử lý form nếu có
if (isset($_POST['loc-cong'])) {
    $selectedMonth = $_POST["months"];
    $currentYear = date("Y");
    $currentDate = date("d");
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $selectedMonth, $currentYear);
    $tinh_cong = 0;
    for ($i = 1; $i <= $daysInMonth; $i++) {
        $time = $currentYear."-".$selectedMonth."-".$i;
        $date = new DateTime($time);
        $sql_time = mysqli_query($conn, "SELECT * FROM ql_chamcong WHERE id_nv = $id_nv");
        $result_time = mysqli_fetch_array($sql_time);
        $date_db = new DateTime($result_time['date_cc']);
        if($date_db == $date){
            $sql_cong = mysqli_query($conn, "SELECT COUNT(*) AS luot FROM ql_chamcong WHERE id_nv = $id_nv AND date_cc = '$result_time[date_cc]'");
            $result_cong = mysqli_fetch_array($sql_cong);
            $tinh_cong = $tinh_cong + $result_cong['luot'];
            if($result_cong['luot'] == 4){
                $tinh_cong = $tinh_cong + 1;
            }elseif(2 <= $result_cong['luot'] && $result_cong['luot'] < 4){
                $tinh_cong = $tinh_cong + 0.5;
            }else{
                $tinh_cong = $tinh_cong + 0;
            }
        }
    }
}else{
    $selectedMonth = date("n");
    $currentYear = date("Y");
    $currentDate = date("d");
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $selectedMonth, $currentYear);
    $tinh_cong = 0;
    for ($i = 1; $i <= $daysInMonth; $i++) {
        $time = $currentYear."-".$selectedMonth."-".$i;
        $date = new DateTime($time);
        $sql_time = mysqli_query($conn, "SELECT * FROM ql_chamcong WHERE id_nv = $id_nv");
        $result_time = mysqli_fetch_array($sql_time);
        $date_db = new DateTime($result_time['date_cc']);
        if($date_db == $date){
            $sql_cong = mysqli_query($conn, "SELECT COUNT(*) AS luot FROM ql_chamcong WHERE id_nv = $id_nv AND date_cc = '$result_time[date_cc]'");
            $result_cong = mysqli_fetch_array($sql_cong);
            if($result_cong['luot'] == 4){
                $tinh_cong = $tinh_cong + 1;
            }elseif(2 <= $result_cong['luot'] && $result_cong['luot'] < 4){
                $tinh_cong = $tinh_cong + 0.5;
            }else{
                $tinh_cong = $tinh_cong + 0;
            }
        }
    }
}
?>
<!DOCTYPE html>

<head>
    <title>Roobi203</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="../css/view.css" type="text/css" />
    <link rel="stylesheet" href="../css/history_timekeeping.css" type="text/css" />
    <link rel="stylesheet" href="../css/register_company.css" type="text/css" />
    <link rel="stylesheet" href="../css/giaodien.css">
    <!-- //font-awesome icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div class="log-w3" style="display: block;">
        <div class="w3layouts-main">
            <?php
            include('../includes/header3.php');
            ?>
        </div>
    </div>
    <div class="page_content_website" style="display: block;">
        <?php
        include('./menu_uv.php');
        ?>
        <div class="form-content tinh-luong page_nv active" data-nv="2" style="display: block">
            <?php 
                $sql_luong = mysqli_query($conn, "SELECT * FROM ql_luong WHERE id_nv = $id_nv");
                $result_luong = mysqli_fetch_array($sql_luong);
            ?>
            <div class="page_tinh_luong">
                <form method="post" action="" class="form-loc">
                    <div class="loc-cham-cong">
                        <p class="title-loc">Lọc:  </p>
                        <select name="months" id="months">
                            <?php
                            // Duyệt qua các tháng từ 1 đến 12 và tạo các tùy chọn
                            for ($i = 1; $i <= 12; $i++) {
                                echo "<option value='$i'>Tháng $i</option>";
                            }
                            ?>
                        </select>
                        <button class="botton-loc" name="loc-cong">Lọc</button>
                    </div>
                </form>

                <form class="form-tinh-luong">
                    <div class="content-box-line exp1">
                        <p class="title-content-tinh-luong">Lương</p>
                        <div class="data-luong"><?php echo $result_luong['luong'] ?></div>
                    </div>
                    <div class="content-box-line exp2">
                        <p class="title-content-tinh-luong">Phần trăm lương</p>
                        <div class="data-phan-tram-luong"><?php echo $result_luong['phantram'] ?></div>
                    </div>
                    <div class="content-box-line exp3">
                        <p class="title-content-tinh-luong">Tổng số công</p>
                        <div class="data-cong">26</div>
                    </div>

                    <div class="content-box-line exp4">
                        <p class="title-content-tinh-luong">Công thực</p>
                        <div class="data-cong-thuc"><?php echo $tinh_cong ?></div>
                    </div>
                    <?php
                        $luong = (float)$result_luong['luong'] * ((float)$result_luong['phantram']/100) / 26 *(float)$tinh_cong;
                        $luong_t = round($luong);
                    ?>
                    <div class="content-box-line exp8">
                        <p class="title-content-tinh-luong">Tổng lương</p>
                        <div class="data-tong-luong"><?php echo $luong_t ?></div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <?php
    include('../includes/footer.php');
    ?>

</body>

<script src="../js/chamcong.js"></script>
<script src="../js/view.js"></script>

</html>

<?php
mysqli_close($conn);
?>