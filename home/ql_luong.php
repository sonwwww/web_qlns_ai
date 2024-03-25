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
        header("Location: ./home/login.php");
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
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
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
        <div class="contain_timekeeping page_cty active" data-cty="4" style="display: block">
            <div class="content_timekeeping content_ql_duyet">
                <div class="box_table_history">
                    <div class="ant-card">
                        <div class="ant-card-head">
                            <div class="ant-card-head-title">
                                <h2>Danh sách lương nhân viên</h2>
                            </div>
                        </div>
                        <div class="ant-card-body">
                            <div class="ant-table-wrapper">
                                <table class="table_history">
                                    <thead class="ant-table-thead">
                                        <tr>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>STT</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Tên ứng viên</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Lương</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Phần trăm lương</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Chức năng</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="ant-table-tbody">
                                        <?php
                                        $sql_luong = "SELECT * FROM user_nv, ql_luong WHERE ql_luong.id_nv = user_nv.id_nv AND id_cty = $id_cty AND duyet = 1";
                                        $result_luong = mysqli_query($conn, $sql_luong);
                                        if (mysqli_num_rows($result_luong) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result_luong)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row["STT"]; ?></td>
                                                <td><?php echo $row["name_nv"]; ?></td>
                                                <td><?php echo $row["luong"]; ?></td>
                                                <td><?php echo $row["phantram"]; ?></td>
                                                <td class="td_padd">
                                                    <a href="./edit_luong.php?id_nv=<?php echo $row['id_nv']; ?>" class="show_form_edit">Sửa</a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        } else { ?>
                                            <tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td class="td_padd">
                                                    <a href="#" class="show_form_edit">Sửa</a>
                                                </td>
                                            </tr>
                                        <?php
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