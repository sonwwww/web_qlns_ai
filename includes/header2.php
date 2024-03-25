<?php
include('../database/connectdb.php');
ob_start();
// session_start();
ob_end_flush();
?>

<?php 
    $ID_CTY_cookie_value = $_COOKIE['UID'];
    $sql_sel_cty = mysqli_query($conn, "SELECT * FROM user_cty WHERE id_cty = $ID_CTY_cookie_value");
    $row_cty = mysqli_fetch_assoc($sql_sel_cty);
    if (isset($_GET['logout'])) {
        setcookie("UID", "", time() - 3600, "/");
        setcookie("UV", "", time() - 3600, "/");
    }
?>
<div id="header_pc">
    <div class="m_header_pc">
        <div class="m_hd_left">
            <div class="logo_header">
                <a href="../home/content_cty.php" title="Trang chủ">
                    <img src="../images/icon_web.png" class="icon_logo lazyloaded" data-src="../images/icon_web.png"
                        alt="vieclam88.vn">
                </a>
            </div>
        </div>
        <div class="m_hd_right">
            <div id="boxlogin">
                <div class="user-login">
                    <div class="user-header" id="user_header">
                        <div class="dang-xuat"><a href="../home/login.php" name="logout"></a></div>
                        <a href="../home/thongtin.php">
                            <div class="name-user-header">
                                <p class="header-user-name"><?php echo $row_cty["name_cty"]; ?></p>
                                <p class="header-user-id">ID: <?php echo $row_cty["id_cty"]; ?> </p>
                            </div>
                            <div class="header-user-image">
                                <img src="../images/icon_avt.png" alt="avata" />
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
