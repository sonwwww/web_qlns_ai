<?php
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();
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
                if (isset($_POST['edit-phong-db'])) {
                    $id_phong = $_GET['id_phong'];
                    $tenPhong = $_POST['name_phong_ban'];
                    $ID_TP = $_POST['name_tp'];
                    $moTa = $_POST['mota_phong'];
                    $sql_sel_nv = mysqli_query($conn, "SELECT name_nv FROM user_nv WHERE id_nv = $ID_TP AND id_cty = 10000");
                    $row_name_nv = mysqli_fetch_assoc($sql_sel_nv);
                    $sql_upd_phong = mysqli_query($conn, "UPDATE ql_phongban SET name_phong = '$tenPhong', mota = '$moTa', truongphong = '$row_name_nv[name_nv]' WHERE id_phong = $id_phong AND id_cty = 10000");
                    $sql_upd_nv = mysqli_query($conn, "UPDATE user_nv SET id_phong = $id_phong, chucvu = 'Trưởng phòng' WHERE id_nv = $ID_TP AND id_cty = 10000");
                    // sql query execution function
                    if ($sql_upd_phong) {
                        ?>
                        <script type="text/javascript">
                            alert('Sửa thành công!');
                            window.location.href='ql_phongban.php';
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
                <div class="title-add-ca">
                    <p>Sửa phòng ban:</p>
                </div>
                <?php
                if (isset($_GET['id_phong'])) {
                    $id_phong = $_GET['id_phong'];
                    $sql_sel_phong = mysqli_query($conn, "SELECT * FROM ql_phongban WHERE id_phong = $id_phong AND id_cty = 10000");
                    $row_all_phong = mysqli_fetch_assoc($sql_sel_phong);
                    // sql query execution function
                }
                ?>
                <form class="form-add-ca-st" action="" method="post">
                    <div class="form-add-ca">
                        <div class="add-name-ca">
                            <label for="name_phong">Nhập tên phòng<span>*</span>:</label>
                            <input type="text" id="name_ca" name="name_phong_ban" value="<?php echo $row_all_phong['name_phong']; ?>" required>
                        </div>
                        <div class="add-name-tp">
                            <label for="name_tp">Nhập trưởng phòng<span>*</span>:</label>
                            <select name="name_tp" id="name_tp">
                                <?php
                                        $sql = "SELECT * FROM user_nv WHERE id_cty = 10000 AND duyet = 1";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option class="list_name_nv" value="<?php echo $row["id_nv"]; ?>"><?php echo $row["name_nv"]; ?> (<?php echo $row["id_nv"]; ?>) </option>
                                <?php 
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="add-mota">
                            <label for="mota">Mô tả công việc của phòng<span>*</span>:</label>
                            <input type="text" id="mota_phong" name="mota_phong" value="<?php echo $row_all_phong["mota"]; ?>" required>
                        </div>
                        <div class="submit-ca">
                            <input type="submit" name="edit-phong-db" value="Sửa">
                            <p class="back_content_ca">
                                <a href="ql_phongban.php">Quay lại</a>
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