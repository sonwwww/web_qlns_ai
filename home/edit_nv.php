<?php
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();
?>

<?php
    if (isset($_POST['edit-nv-db'])) {
        $id = $_GET['id_nv'];
        $name_nv = $_POST['name_nv'];
        $idPhong = $_POST['name_phong'];
        $chucvuEdit = $_POST['chuc-vu'];
        $sql_sel_check_nv = mysqli_query($conn, "SELECT * FROM user_nv WHERE id_nv = $id AND id_cty = 10000");
        $row_all_check_nv = mysqli_fetch_assoc($sql_sel_check_nv);
        if ($row_all_check_nv["chucvu"] == 'Trưởng phòng') {
            $sql_up_phong = mysqli_query($conn, "UPDATE ql_phongban SET truongphong = ' ' WHERE id_phong = $row_all_check_nv[id_phong]");
        } elseif ($row_all_check_nv["chucvu"] == 'Phó phòng') {
            $sql_up_phong = mysqli_query($conn, "UPDATE ql_phongban SET phophong = ' ' WHERE id_phong = $row_all_check_nv[id_phong]");
        }
        if ($chucvuEdit == 0) {
            $chuvu = 'Nhân viên';
        } elseif ($chucvuEdit == 1){
            $chuvu = 'Trưởng phòng';
        } else {
            $chuvu = 'Phó phòng';
        }
        $sql_upd_nv = mysqli_query($conn, "UPDATE user_nv SET id_phong = '$idPhong', chucvu = '$chuvu' WHERE id_nv = $id");
        if ($chucvuEdit == 1) {
            $sql_upd_phong = mysqli_query($conn, "UPDATE ql_phongban SET truongphong = '$row_all_check_nv[name_nv]' WHERE id_phong = $idPhong");
        } elseif ($chucvuEdit == 2) {
            $sql_upd_phong = mysqli_query($conn, "UPDATE ql_phongban SET phophong = '$row_all_check_nv[name_nv]' WHERE id_phong = $idPhong");
        }
        // sql query execution function
        if ($sql_upd_nv) {
            ?>
            <script type="text/javascript">
                alert('Sửa thành công!');
                window.location.href='giaodien.php';
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert('Sửa chưa thành công!');
            </script>
            <?php
        }
        // sql query execution function
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
                if (isset($_GET['id_nv'])) {
                    $id_nv = $_GET['id_nv'];
                    $sql_sel_nv = mysqli_query($conn, "SELECT * FROM user_nv WHERE id_nv = $id_nv AND id_cty = 10000");
                    $row_all_nv = mysqli_fetch_assoc($sql_sel_nv);
                    // sql query execution function
                }
                ?>
                <div class="title-add-ca">
                    <p>Sửa thông tin nhân viên</p>
                </div>
                <form class="form-add-ca-st" action="" method="post">
                    <div class="form-edit-nv">
                        <div class="show_name_nv" name="name_nv"><?php echo $row_all_nv['name_nv']; ?></div>
                        <div class="add-name-ca">
                            <label for="name_ca">Nhập phòng ban<span>*</span></label>
                            <select name="name_phong" id="name_phong">
                                <?php
                                        $sql = "SELECT * FROM ql_phongban WHERE id_cty = 10000";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option class="list_name_nv" value="<?php echo $row["id_phong"]; ?>"><?php echo $row["name_phong"]; ?></option>
                                <?php 
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="edit-chu-vu">
                            <label for="time_out">Nhập chức vụ<span>*</span>:</label>
                            <!-- <input type="text" id="phan_tram_luong" name="chuc-vu" value="<?php echo $row_all_nv['chucvu']; ?>" required> -->
                            <select name="chuc-vu" id="phan_tram_luong">
                                <option class="list_name_nv" value="0">Nhân viên</option>
                                <option class="list_name_nv" value="1">Trưởng phòng</option>
                                <option class="list_name_nv" value="2">Phó phòng</option>
                            </select>
                        </div>
                        <div class="submit-ca">
                            <input type="submit" name="edit-nv-db" value="Sửa">
                            <p class="back_content_ca">
                                <a href="giaodien.php">Quay lại</a>
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