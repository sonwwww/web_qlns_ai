<?php
include('../database/connectdb.php');
ob_start();
// session_start();
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
    <script>
        function confirmDelete(id) {
            var confirmation = confirm("Bạn có chắc muốn xóa?");
            if (confirmation) {
                // Chuyển hướng đến trang xử lý xóa trên server (PHP)
                window.location.href = 'delete.php?id=' + id;
            }
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
        <div class="form-content cham-cong page_nv active" data-nv="1" style="display: block">
            <div class="loc-cham-cong" style="display: none;">
                <p class="title-loc">Lọc: </p>
                <div class="box-pick ngay"> ngày 1
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo '<option value=' . $i . '>Ngày ' . $i . '</option>';
                    }
                    ?>
                </div>
                <div class="box-pick thang"> tháng 1
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        echo '<option value=' . $i . '>Ngày ' . $i . '</option>';
                    }
                    ?>
                </div>
                <button class="botton-loc">Lọc</button>
            </div>
            <form class="form-cham-cong">
                
                <div class="header-form-cham-cong">
                    <div class="content-header-cham-cong date">Ngày/tháng</div>
                    <div class="content-header-cham-cong time">Thời gian chấm công</div>
                    <div class="content-header-cham-cong ca">Ca làm việc</div>
                    <div class="content-header-cham-cong tinh-trang">Tình trạng</div>
                </div>
                
                <div class="content-form-cham-cong">
                <?php
                    $ID_nv = $_COOKIE['UID'];
                    $sql_cc = "SELECT * FROM ql_chamcong WHERE id_nv = $ID_nv ORDER BY STT DESC";
                    $result_cc = mysqli_query($conn, $sql_cc);
                    if (mysqli_num_rows($result_cc) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result_cc)) {
                            if(strlen($row["date_cc"]) > 0){
                            ?>
                    <div class="content-line ex1">
                        <div class="content-data-cham-cong date"><?php echo $row["date_cc"]; ?></div>
                        <div class="content-data-cham-cong data-time"><?php echo $row["thoigian"]; ?></div>
                        <div class="content-data-cham-cong data-ca">
                            <?php
                                if ($row["ca_vao"] == 1) {
                                    echo 'Ca vào';
                                } elseif ($row["ca_ra"] == 1) {
                                    echo 'Ca ra';
                                }
                            ?>
                        </div>
                        <div class="content-data-cham-cong data-tinh-trang">
                            <?php
                                $sql_ca = "SELECT * FROM ql_ca WHERE id_cty = 10000";
                                $result_ca = mysqli_query($conn, $sql_ca);
                                if (mysqli_num_rows($result_ca) > 0) {
                                    while ($row_ca = mysqli_fetch_assoc($result_ca)) {
                                        $khoangvao1 = new DateTime($row_ca["time_on"]);
                                        $time_vao = $khoangvao1->modify('-30 minutes');
                                        $vao = $time_vao->format('H:i:s');

                                        $khoangra = new DateTime($row_ca["time_out"]);
                                        $time_ra = $khoangra->modify('+30 minutes');
                                        $ra = $time_ra->format('H:i:s');

                                        $time = $row["thoigian"];
                                        if ($row["ca_vao"] == 1){
                                            if ($vao <= $time && $time <= $row_ca['time_on']){
                                                echo 'Đúng giờ';
                                            } elseif ($time >= $row_ca['time_on'] && $time <= $row_ca["time_out"]) {
                                                echo 'Đi muộn về sớm';
                                            }
                                        } elseif ($row["ca_ra"] == 1) {
                                            if ($time <= $ra && $time >= $row_ca['time_out']){
                                                echo 'Đúng giờ';
                                            } elseif ($time >= $row_ca['time_on'] && $time <= $row_ca["time_out"]) {
                                                echo 'Đi muộn về sớm';
                                            }
                                        }
                                    }
                                } else {
                                    echo "0 results";
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                        }}
                    } else { ?>
                        <div class="content-line ex1">
                        <div class="content-data-cham-cong date">-</div>
                        <div class="content-data-cham-cong data-time">-</div>
                        <div class="content-data-cham-cong data-ca"> - </div>
                        <div class="content-data-cham-cong data-tinh-trang">-</div>
                    </div>
                    <?php }
                ?>
                </div>
            </form>
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
// mysqli_close($conn);
?>