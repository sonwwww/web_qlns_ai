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

        <div class="contain_timekeeping page_cty active" data-cty="3" style="display: block">
            <div class="content_timekeeping">
                <div class="box_table_history">
                    <div class="ant-card">
                        <div class="ant-card-head">
                            <div class="ant-card-head-title">
                                <h2>Danh sách lịch sử chấm công </h2>
                            </div>
                        </div>
                        <div class="ant-card-body">
                            <div class="ant-table-wrapper">
                                <table class="table_history">
                                    <thead class="ant-table-thead">
                                        <tr>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Họ và tên</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Phòng</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Ca làm việc</p>
                                            </th>
                                            <th class="ant-table-cell" scope="col" style="text-align: center;">
                                                <p>Thời gian chấm công</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="ant-table-tbody">
                                        <?php
                                        $sql_cc = "SELECT * FROM ql_chamcong WHERE id_cty = 10000";
                                        $result_cc = mysqli_query($conn, $sql_cc);
                                        if (mysqli_num_rows($result_cc) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result_cc)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        $sql_nv = mysqli_query($conn, "SELECT * FROM user_nv WHERE user_nv.id_cty = $row[id_cty] AND user_nv.id_nv = $row[id_nv]");
                                                        $row_nv = mysqli_fetch_array($sql_nv);
                                                        echo $row_nv['name_nv'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $sql_p = mysqli_query($conn, "SELECT * FROM user_nv, ql_phongban WHERE user_nv.id_cty = $row[id_cty] AND ql_phongban.id_cty = $row[id_cty] AND user_nv.id_nv = $row[id_nv] AND ql_phongban.id_phong = user_nv.id_phong");
                                                        $row_p = mysqli_fetch_array($sql_p);
                                                        echo $row_p['name_phong'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["thoigian"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row["ca_vao"] == 1) {
                                                            echo 'Ca vào';
                                                        } elseif ($row["ca_ra"] == 1) {
                                                            echo 'Ca ra';
                                                        }
                                                        ?>
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