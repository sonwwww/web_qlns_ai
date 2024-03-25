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

<?php
    if (isset($_POST['edit-tt-user'])) {
        // $targetDirectory = "../avt/"; // Thư mục lưu trữ ảnh
        // $targetFile = $targetDirectory . basename($_FILES["edit_avt_user"]["name"]);
        $uploadOk = 0;
        // $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        
        $name_u = $_POST['name_user'];
        $phone_u = $_POST['phone_user'];
        $add_u = $_POST['add_user'];
        // $avt_u = $_FILES['avt_user']['name'];
        // $avt_tmp = $_FILES['avt_user']['tmp_name'];
        if ($uploadOk == 1) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Nếu mọi thứ đều ok, tiến hành tải lên
            if ($uploadOk == 1) {
                // Lưu thông tin vào cơ sở dữ liệu
                // $imageName = basename($_FILES["image"]["name"]);
                if ($type_cookie_value==0){
                    $sql_ud_user = mysqli_query($conn, "UPDATE user_nv SET name_nv = '$name_u', sdt_nv = '$phone_u', diachi = '$add_u' WHERE id_nv = $ID_cookie_value");
                }else{
                    $sql_ud_user = mysqli_query($conn, "UPDATE user_cty SET name_cty = '$name_u', sdt = '$phone_u', diachi = '$add_u' WHERE id_cty = $ID_cookie_value");
                }
                // if ($conn->query($sql) === TRUE) {
                //     echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded and saved to the database.";
                // } else {
                //     echo "Error: " . $sql . "<br>" . $conn->error;
                // }
            } else {
                if ($type_cookie_value==0){
                    $sql_ud_user = mysqli_query($conn, "UPDATE user_nv SET name_nv = '$name_u', sdt_nv = '$phone_u', diachi = '$add_u' WHERE id_nv = $ID_cookie_value");
                }else{
                    $sql_ud_user = mysqli_query($conn, "UPDATE user_cty SET name_cty = '$name_u', sdt = '$phone_u', diachi = '$add_u' WHERE id_cty = $ID_cookie_value");
                }
            }
        }
        // sql query execution function
        if ($sql_ud_user) {
            ?>
            <script type="text/javascript">
                alert('Sửa thành công!');
                window.location.href='thongtin.php';
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
        <div class="contain_thongtin">
            <div class="form-content-edit-user">
                <?php
                if ($type_cookie_value == 0) {
                    $id_user = $_GET['id_nv'];
                    $sql_sel_user = mysqli_query($conn, "SELECT * FROM user_nv WHERE id_nv = $id_user");
                    $row_user = mysqli_fetch_assoc($sql_sel_user);
                    $name_user = $row_user['name_nv'];
                    $phone_user = $row_user['sdt_nv'];
                    $add_user = $row_user['diachi'];
                    // sql query execution function
                }else{
                    $id_user = $_GET['id_cty'];
                    $sql_sel_user = mysqli_query($conn, "SELECT * FROM user_cty WHERE id_cty = $id_user");
                    $row_user = mysqli_fetch_assoc($sql_sel_user);
                    $name_user = $row_user['name_cty'];
                    $phone_user = $row_user['sdt'];
                    $add_user = $row_user['diachi'];
                }
                ?>
                <form class="form-edit-thongtin-us" action="" method="post">
                    <div class="title-edit-user">
                        <p>Sửa thông tin:</p>
                    </div>
                    <div class="form-edit-user">
                        <div class="show_name_user">
                            <label for="name_user">Nhập tên<span>*</span>:</label>
                            <input type="text" id="name_user" name="name_user" value="<?php echo $name_user ?>" required>
                        </div>
                        <div class="edit_avt_us">
                            <label for="avt_us">Nhập avatar</label>
                            <input type="file" id="edit_avt_user" name="avt_user" onchange="previewFile(this);" >
                            <img src="../images/no-avt.png" width="20%" id="previewImg" >
                        </div>
                        <div class="edit_phone_us">
                            <label for="phone_us">Nhập số điện thoại<span>*</span>:</label>
                            <input type="text" id="phone_user" name="phone_user" value="<?php echo $phone_user ?>" required>
                        </div>
                        <div class="edit_add_us">
                            <label for="add_us">Nhập địa chỉ<span>*</span>:</label>
                            <input type="text" id="add_user" name="add_user" value="<?php echo $add_user ?>" required>
                        </div>
                        <div class="submit-user">
                            <input type="submit" name="edit-tt-user" value="Lưu">
                            <p class="back_content_ca">
                                <a href="thongtin.php">Quay lại</a>
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
<script type="text/javascript"> 
    function previewFile(input)
    {
        var file =$(".image-preview").get(0).files[0];
        console.log(file)
        if(file)
        {
            var read = new FileReader();
            read.onload = function(){
                $('#previewImg').attr("src", read.result);
            }
            read.readAsDataURL(file);
        }
    }
</script>
<script src="../js/chamcong.js"></script>
<script src="../js/view.js"></script>

</html>

<?php
mysqli_close($conn);
?>