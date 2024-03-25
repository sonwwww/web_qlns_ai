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
        $id_cty = $ID_cookie_value;
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
            include('../includes/header2.php');
            ?>
        </div>
    </div>
    <div class="page_content_website" style="display: block;">
        <?php
        include('./menu_cty.php');
        ?>
        <div class="contain_calamviec page_cty active" data-cty="7" style="display: block">
            <div class="form-content-add-ca" style="display: block;">
                <?php
                if (isset($_POST['add-ca-db'])) {
                    $tenCa = $_POST['name_ca_lam_viec'];
                    $timeOn = $_POST['time_on_ca'];
                    $timeOut = $_POST['time_out_ca'];
                    $sql_sel_ca = mysqli_query($conn, "SELECT name_ca FROM ql_ca WHERE id_cty = 10000");
                    $row_all_ca = mysqli_fetch_assoc($sql_sel_ca);
                    if ($tenCa != $row_all_ca['name_ca']){
                        $sql_insert_ca = mysqli_query($conn, "INSERT INTO ql_ca(name_ca, time_on, time_out, id_cty) values ('$tenCa', '$timeOn', '$timeOut', 10000)");
                        // sql query execution function
                        if ($sql_insert_ca) {
                            ?>
                            <script type="text/javascript">
                                alert('Thêm thành công!');
                                window.location.href='ql_calamviec.php';
                            </script>
                            <?php
                        } else {
                            ?>
                            <script type="text/javascript">
                                alert('Thêm chưa thành công!');
                            </script>
                            <?php
                        }
                    }
                    // sql query execution function
                }
                ?>
                <div class="title-add-ca">
                    <p>Thêm ca làm việc</p>
                </div>
                <form class="form-add-ca-st" action="" method="post">
                    <div class="form-add-ca">
                        <div class="add-name-ca">
                            <label for="name_ca">Nhập tên ca làm việc<span>*</span></label>
                            <input type="text" id="name_ca" name="name_ca_lam_viec" required>
                        </div>
                        <div class="add-time-ca">
                            <div class="add-time-ca-on">
                                <label for="time_on">Nhập thời gian vào<span>*</span>:</label>
                                <input type="time" id="time_on" name="time_on_ca" required cvo-placeholder="Nhập tên ca làm việc">
                            </div>
                            <div class="add-time-ca-out">
                                <label for="time_out">Nhập thời gian ra<span>*</span>:</label>
                                <input type="time" id="time_out" name="time_out_ca" required>
                            </div>
                        </div>
                        <div class="submit-ca">
                            <input type="submit" name="add-ca-db" value="Thêm">
                            <p class="back_content_ca">
                                <a href="ql_calamviec.php">Quay lại</a>
                            </p>
                        </div>
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