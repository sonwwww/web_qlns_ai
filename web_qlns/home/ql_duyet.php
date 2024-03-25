<?php
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();
?>

<?php 
if (isset($_POST['duyet_nv'])) {
    $ID_nv = $_POST['Id_nv'];
    $sql_upd_nv = mysqli_query($conn, "UPDATE user_nv SET duyet = 1 WHERE id_nv = $ID_nv AND id_cty = 10000");
  
    // sql query execution function
    if ($sql_upd_nv) {
        ?>
        <script type="text/javascript">
            alert('Duyệt thành công!');
            window.location.href='ql_duyet.php';
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert('Duyệt chưa thành công!');
        </script>
        <?php
    }
    
    // sql query execution function
}

if (isset($_POST['del_nv0'])) {
    $ID_nv = $_POST['Id_nv'];
    $sql_del_nv = mysqli_query($conn, "DELETE FROM user_nv WHERE id_nv = $ID_nv AND id_cty = 10000");
  
    // sql query execution function
    if ($sql_del_nv) {
        ?>
        <script type="text/javascript">
            alert('Xóa thành công!');
            window.location.href='ql_duyet.php';
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
        <div class="contain_timekeeping page_cty active" data-cty="6" style="display: block">
            <div class="content_timekeeping content_ql_duyet">
                <div class="box_table_history">
                    <div class="ant-card">
                        <div class="ant-card-head">
                            <div class="ant-card-head-title">
                                <h2>Danh sách phê duyệt </h2>
                            </div>
                        </div>
                        <div class="ant-card-body">
                            <div class="ant-table-wrapper">
                                <table class="table_history">
                                    <thead class="ant-table-thead">
                                        <tr>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>ID</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Tên ứng viên</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Công việc ứng tuyển</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Chức năng</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="ant-table-tbody">
                                        <?php
                                        $dem = 1;
                                        $sql_nv0 = "SELECT * FROM user_nv WHERE id_cty = 10000 AND duyet = 0";
                                        $result_nv0 = mysqli_query($conn, $sql_nv0);
                                        if (mysqli_num_rows($result_nv0) > 0) {
                                            // output data of each row
                                            while ($row_nv0 = mysqli_fetch_assoc($result_nv0)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $dem; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row_nv0["name_nv"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row_nv0["congviec"]; ?>
                                                    </td>
                                                    <td class="td_padd">
                                                        <form action="" method="post">
                                                            <input type="hidden" id="custId" name="Id_nv" value="<?php echo $row_nv0["id_nv"]; ?>">
                                                            <input type="submit" class="show_form_edit" name="duyet_nv" value="Duyệt">
                                                            <input type="submit" class="show_form_del" name="del_nv0" value="Xóa">
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                                $dem = $dem + 1;
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