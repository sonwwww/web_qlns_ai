<?php
include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();
?>

<?php 
if(isset($_POST['xt_email'])){
    if($_POST['loai_tk'] === 0){
        $email = $_POST['email_mk'];
        $sql_sel_u = mysqli_query($conn, "SELECT email_nv FROM user_nv WHERE email_nv = $email");
        if(mysqli_num_rows($sql_sel_u) > 0){
            header("Location: ./xacthuc.php");
        }else{
            echo "Email không chính xác hay nhập lại";
        }
    }
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
            include('../includes/header.php');
            ?>
        </div>
    </div>
    <div class="page_log" style="display: block;">
        <div class="contain_register_company">
            <div class="content_register_company">
                <form class="register_form_dmk" id="form-quen-dmk" method="POST">
                    <div class="one_page_qmk man-3">
                        <div class="header_qmk">
                            <h1 class="qlc_tieude_moi">Đổi mật khẩu</h1>
                        </div>
                        <div class="ctn_form form_group">
                            <div class="form-group-1">
                                <label class="form_label">Nhập mật khẩu mới</label>
                                <input type="text" name="makhau1" id="makhau1" class="form-control"
                                    placeholder="Nhập mật khẩu mới">
                            </div>
                        </div>
                        <div class="ctn_form form_group">
                            <div class="form-group-2">
                                <label class="form_label">Nhập lại mật khẩu</label>
                                <input type="text" name="makhau2" id="makhau2" class="form-control"
                                    placeholder="Nhập nhập lại mật khẩu">
                            </div>
                        </div>
                        <div class="form-butt-one">
                            <input type="submit" class="tiep_tuc_one" value="Tiếp theo" id="doi_mk">
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
<script src="/js/jquery-3.4.1.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/doi_mk.js"></script>

</html>

<?php
mysqli_close($conn);
?>