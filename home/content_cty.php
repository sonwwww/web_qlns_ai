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
        <div class="page_contnet_show page_cty active" data-cty="0">
            <div class="ant-row">
                <div class="ant-col col-1">
                    <a href="./giaodien.php">
                        <div class="ant-col-item">
                            <div class="ant-col-icon">
                                <img src="../images/sb_item_21.png" />
                            </div>
                            <div class="ant-col-item-contnet">
                                <div class="col-title">Quản lý nhân viên</div>
                                <div class="col-chitiet">
                                    <img src="../images/right.png" />
                                    <span>Xem chi tiết</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="ant-col col-2">
                    <a href="./content_cham_cong.php">
                        <div class="ant-col-item">
                            <div class="ant-col-icon">
                                <img src="../images/icon_update_face.png" />
                            </div>
                            <div class="ant-col-item-contnet">
                                <div class="col-title">Chấm công</div>
                                <div class="col-chitiet">
                                    <img src="../images/right.png" />
                                    <span>Xem chi tiết</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="ant-col col-3">
                    <a href="./history_timekeeping.php">
                        <div class="ant-col-item">
                            <div class="ant-col-icon">
                                <img src="../images/icon_history.png" />
                            </div>
                            <div class="ant-col-item-contnet">
                                <div class="col-title">Lịch sử chấm công</div>
                                <div class="col-chitiet">
                                    <img src="../images/right.png" />
                                    <span>Xem chi tiết</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="ant-col col-4">
                    <a href="./ql_luong.php">
                        <div class="ant-col-item">
                            <div class="ant-col-icon">
                                <img src="../images/icon_tinhluong.png" />
                            </div>
                            <div class="ant-col-item-contnet">
                                <div class="col-title">Quản lý lương</div>
                                <div class="col-chitiet">
                                    <img src="../images/right.png" />
                                    <span>Xem chi tiết</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="ant-col col-5">
                    <a href="./ql_phongban.php">
                        <div class="ant-col-item">
                            <div class="ant-col-icon">
                                <img src="../images/icon-phong-ban.png" />
                            </div>
                            <div class="ant-col-item-contnet">
                                <div class="col-title">Quản lý phòng ban</div>
                                <div class="col-chitiet">
                                    <img src="../images/right.png" />
                                    <span>Xem chi tiết</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="ant-col col-6">
                    <a href="./ql_duyet.php">
                        <div class="ant-col-item">
                            <div class="ant-col-icon">
                                <img src="../images/sb_item_5.png" />
                            </div>
                            <div class="ant-col-item-contnet">
                                <div class="col-title">Phê duyệt</div>
                                <div class="col-chitiet">
                                    <img src="../images/right.png" />
                                    <span>Xem chi tiết</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="ant-col col-7">
                    <a href="./ql_calamviec.php">
                        <div class="ant-col-item">
                            <div class="ant-col-icon">
                                <img src="../images/sb_item_18.png" />
                            </div>
                            <div class="ant-col-item-contnet">
                                <div class="col-title">Cài đặt ca làm việc</div>
                                <div class="col-chitiet">
                                    <img src="../images/right.png" />
                                    <span>Xem chi tiết</span>
                                </div>
                            </div>
                        </div>
                    </a>
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