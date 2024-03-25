<?php
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();
?>
<?php
if (isset($_GET['del_phong'])) {
    $ID_phong = $_GET['Id_phong'];
    $sql_del_phong = mysqli_query($conn, "DELETE FROM ql_phongban WHERE id_phong = $ID_phong AND id_cty = 10000");
    $sql_upd_nv = mysqli_query($conn, "UPDATE user_nv SET id_phong = 0, chucvu = 'Nhân viên' WHERE id_phong = $ID_phong AND id_cty = 10000");
    // sql query execution function
    if ($sql_del_phong) {
        ?>
        <script type="text/javascript">
            alert('Xóa thành công!');
            window.location.href='ql_phongban.php';
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert('Xóa chưa thành công!');
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
        <div class="contain_timekeeping page_cty active" data-cty="5" style="display: block">
            <div class="content_timekeeping content_ql_nv">
                <div class="content-botton-add-phong">
                    <div class="botton-add-phong">
                        <a href="add_phong.php" class="add-phong">Thêm phòng ban</a>
                    </div>
                </div>
                <div class="box_table_history">
                    <div class="ant-card">
                        <div class="ant-card-head">
                            <div class="ant-card-head-title">
                                <h2>Danh sách Phòng ban </h2>
                            </div>
                        </div>
                        <div class="ant-card-body">
                            <div class="ant-table-wrapper">
                                <table class="table_history">
                                    <thead class="ant-table-thead">
                                        <tr>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>ID Phòng</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Tên phòng</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Trưởng phòng</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Phó phòng</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Số lượng nhân viên</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Chức năng</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="ant-table-tbody">
                                        <?php
                                        $sql = "SELECT * FROM ql_phongban WHERE id_cty = 10000";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row["id_phong"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["name_phong"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["truongphong"]; ?>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <?php
                                                        $so_nv = mysqli_query($conn, "SELECT COUNT(id_nv) AS soluongnv FROM user_nv WHERE user_nv.id_phong = $row[id_phong] AND user_nv.id_cty = 10000");
                                                        $row_so_nv = mysqli_fetch_array($so_nv);
                                                        echo $row_so_nv["soluongnv"];
                                                        ?>
                                                    </td>
                                                    <td class="td_padd">
                                                        <form action="" method="get">
                                                            <input type="hidden" id="custId" name="Id_phong" value="<?php echo $row['id_phong']; ?>">
                                                            <a href="./edit_phong.php?id_phong=<?php echo $row["id_phong"]; ?>" class="show_form_edit">
                                                                Sửa
                                                            </a>
                                                            <input type="submit" class="show_form_del" name="del_phong" value="Xóa">
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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