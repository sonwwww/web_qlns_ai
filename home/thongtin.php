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
            if ($type_cookie_value==0){
                include('../includes/header3.php');
            }else {
                include('../includes/header2.php');
            }
            ?>
        </div>
    </div>
    <div class="page_content_website" style="display: block;">
        <?php
        if ($type_cookie_value==0){
            include('./menu_uv.php');
        }else {
            include('./menu_cty.php');
        }
        ?>
        <div class="contain_thongtin"style="display: block">
            <?php
            if ($type_cookie_value==0){
                $sel_nv_db = mysqli_query($conn, "SELECT * FROM user_nv WHERE id_nv = $id_nv");
                $row_nv = mysqli_fetch_array($sel_nv_db);
            ?>
            <div class="ql-thongtin">
                <div class="content-avt-user">
                    <div class="avt-user">
                        <img src="../images/no-avt.png" />
                    </div>
                </div>
                <div class="content-tt-user">
                    <div class="t-name-user">Họ và tên: <?php echo $row_nv["name_nv"] ?></div>
                    <div class="t-id-user">ID: <?php echo $row_nv["id_nv"] ?></div>
                    <div class="t-email-user">Email: <?php echo $row_nv["email_nv"] ?></div>
                    <div class="t-phone-user">Số điện thoại: <?php echo $row_nv["sdt_nv"] ?></div>
                    <div class="t-add-user">Địa chỉ: <?php echo $row_nv["diachi"] ?></div>
                    <div class="edit-tt-user">
                        <a href="./edit_thongtin.php?id_nv=<?php echo $row_nv['id_nv'] ?>"><button type="submit" class="edit-user">Sửa thông tin</button><a>
                    </div>
                </div>
            </div>
            <?php }else{ 
                $sel_cty_db = mysqli_query($conn, "SELECT * FROM user_cty WHERE id_cty = $id_cty");
                $row_cty = mysqli_fetch_array($sel_cty_db);
            ?>
            <div class="ql-thongtin">
                <div class="content-avt-user">
                    <div class="avt-user">
                        <img src="../images/no-avt.png" />
                    </div>
                </div>
                <div class="content-tt-user">
                    <div class="t-name-user">Tên công ty: <?php echo $row_cty["name_cty"] ?></div>
                    <div class="t-id-user">ID: <?php echo $row_cty["id_cty"] ?></div>
                    <div class="t-email-user">Email: <?php echo $row_cty["email"] ?></div>
                    <div class="t-phone-user">Số điện thoại: <?php echo $row_cty["sdt"] ?></div>
                    <div class="t-add-user">Địa chỉ: <?php echo $row_cty["diachi"] ?></div>
                    <div class="edit-tt-user">
                        <a href="./edit_thongtin.php?id_cty=<?php echo $row_cty['id_cty'] ?>"><button type="submit" class="edit-user">Sửa thông tin</button><a>
                    </div>
                </div>
            </div>
            <?php } ?>
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