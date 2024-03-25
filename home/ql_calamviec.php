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
        function confirmDelete_ca(id) {
            var confirmation = confirm("Bạn có chắc muốn xóa?");
            if (confirmation) {
                // Thực hiện AJAX request
                $.ajax({
                    url: 'delete_ca.php?id_ca=' + id, // Đường dẫn đến file PHP cần chạy
                    type: 'POST', // Hoặc 'POST' tùy thuộc vào cách bạn muốn gửi dữ liệu
                    dataType: 'html',
                    success: function(response){
                        // Xử lý kết quả trả về từ file PHP
                        console.log(response);
                    },
                    error: function(xhr, status, error){
                        // Xử lý lỗi nếu có
                        console.error("Lỗi AJAX: " + status + ", " + error);
                    }
                });
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
            <div class="form-content-ca" style="display: block;">
                <div class="contnet-title-ca">
                    <div class="title-ca">
                        <p>
                            Quản lý ca làm viêc:
                        </p>
                    </div>
                </div>
                <div class="content_ql_ca">
                    <div class="content_add_ca">
                        <a href="add_ca.php" class="add-ca"><input type="submit" name="add-ca" value="+ Thêm ca làm việc"></a>
                    </div>
                    <div class="form_content_ca">
                        <?php
                        $dem = 1;
                        $sql_ca = "SELECT * FROM ql_ca WHERE id_cty = $id_cty";
                        $result_ca = mysqli_query($conn, $sql_ca);
                        if (mysqli_num_rows($result_ca) > 0) {
                            // output data of each row
                            while ($row_ca = mysqli_fetch_assoc($result_ca)) {
                                ?>
                                <div class="content_ca exp-ca-<?php echo $dem; ?>">
                                    <div class="content-name-ca">
                                        <div class="name-ca">
                                            <p>
                                                <?php echo $row_ca["name_ca"]; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="content-time-ca">
                                        <div class="time-ca-vao">
                                            <p>Ca vào:
                                                <?php echo $row_ca["time_on"]; ?>
                                            </p>
                                        </div>
                                        <div class="time-ca-ra">
                                            <p>Ca ra:
                                                <?php echo $row_ca["time_out"]; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <form action="" method="get" class="form-content-edit-ca">
                                        <div class="edit-ca"><a href="./edit_ca.php?id_ca=<?php echo $row_ca['Stt_ca']; ?>">Sửa</a></div>
                                        <div class="delete-ca"><button
                                                onclick="confirmDelete_ca('<?php echo $row_ca['Stt_ca']; ?>')">Xóa</button></div>
                                    </form>
                                </div>
                                <?php
                                $dem = $dem + 1;
                            }
                        }else {
                        ?>
                            <div class="content_ca exp-ca">
                                <div class="content-name-ca">
                                    <div class="name-ca">
                                        <p>
                                            Ca làm viêc
                                        </p>
                                    </div>
                                </div>
                                <div class="content-time-ca">
                                    <div class="time-ca-vao">
                                        <p>Ca vào: --:--
                                        </p>
                                    </div>
                                    <div class="time-ca-ra">
                                        <p>Ca ra: --:--
                                        </p>
                                    </div>
                                </div>
                                <form action="" method="get" class="form-content-edit-ca">
                                    <div class="edit-ca"><a href="./edit_ca.php?id_ca=<?php echo $row_ca['Stt_ca']; ?>">Sửa</a></div>
                                    <div class="delete-ca"><button>Xóa</button></div>
                                </form>
                            </div>
                        <?php } ?>
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