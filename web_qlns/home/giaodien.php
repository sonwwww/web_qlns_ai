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
    <script>
        function id_delete(id) {
            var confirmation = confirm("Bạn có chắc muốn xóa?");
            if (confirmation) {
                // Thực hiện AJAX request
                $.ajax({
                    url: 'delete_nv.php?id_nv=' + id, // Đường dẫn đến file PHP cần chạy
                    type: 'GET', // Hoặc 'POST' tùy thuộc vào cách bạn muốn gửi dữ liệu
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
        function id_edit_nv(id) {
            if (confirmation) {
                // Thực hiện AJAX request
                $.ajax({
                    url: 'edit_nv.php?id_nv=' + id, // Đường dẫn đến file PHP cần chạy
                    type: 'GET', // Hoặc 'POST' tùy thuộc vào cách bạn muốn gửi dữ liệu
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

        <div class="ctn_right_qly page_cty active" data-cty="1" style="display: block">
            <div class="ctn_res_qly">
                <div class="left_header_qly">
                    <p class="share_clr_one font_14">Quản lý nhân viên / <span class="thay_doi">Tất cả nhân viên</span>
                    </p>
                </div>
                <div class="list_all_qly">
                    <div class="ctn_nv_one top_share">
                        <div class="tab_sett_one tab_bor_bottom">
                            <div class="tab_titl">
                                <label class="tab_label nv_tatca active">
                                    <p class="share_clr_one font_14">
                                        <a href="#" class="share_clr_one font_14">Tất cả nhân viên</a>
                                        <span class="all_nv_cty">(13)</span>
                                    </p>
                                </label>
                            </div>
                            <div class="tab_titl">
                                <label class="tab_label nv_quantri">
                                    <p class="share_clr_one  font_14">
                                        <a href="#" class="share_clr_one font_14">Nhân viên quản trị</a>
                                        <span class="count_nv_qtri"></span>
                                    </p>
                                </label>
                            </div>
                        </div>
                        <div class="tab_sett_tow tab_bor_bottom">
                            <div class="tab_titl">
                                <label class="tab_label nv_online">
                                    <p class="share_fsize_one share_clr_one">
                                        <a href="#" class="share_clr_one" target="_blank">Nhân viên chờ duyệt</a>
                                    </p>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="ctn_chile_tow">
                        <div class="ctn_selt">
                            <div class="content_selt">
                                <select name="name_cty" class="select_one select2-hidden-accessible" data="1763"
                                    tabindex="-1" aria-hidden="true" data-select2-id="select2-data-22-2pgi">
                                    <option value="114042">123abc </option>
                                    <option value="1763" selected="" data-select2-id="select2-data-24-zyp4">le anh
                                        tuan12
                                    </option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                    data-select2-id="select2-data-23-o9gb" style="width: 100%;"><span
                                        class="selection"><span class="select2-selection select2-selection--single"
                                            role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-disabled="false" aria-labelledby="select2-name_cty-o1-container"
                                            aria-controls="select2-name_cty-o1-container"><span
                                                class="select2-selection__rendered" id="select2-name_cty-o1-container"
                                                role="textbox" aria-readonly="true" title="le anh tuan12">le anh
                                                tuan12</span><span class="select2-selection__arrow"
                                                role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <div class="content_selt">
                                <select name="name_dep" class="select_tow select2-hidden-accessible" data=""
                                    tabindex="-1" aria-hidden="true" data-select2-id="select2-data-32-rdzd">
                                    <option value="" data-select2-id="select2-data-34-ll2w">Nhập tên phòng ban</option>

                                    <option class="dep_hh" value="2807">phòng IT</option>
                                    <option class="dep_hh" value="4032">phòng nhân sự</option>
                                    <option class="dep_hh" value="4213">Phòng 13</option>
                                    <option class="dep_hh" value="4249">phòng sale</option>
                                    <option class="dep_hh" value="4568">phòng 1121</option>
                                    <option class="dep_hh" value="4570">phòng 3 con voi</option>
                                    <option class="dep_hh" value="4573">2211</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                    data-select2-id="select2-data-33-azlf" style="width: 100%;"><span
                                        class="selection"><span class="select2-selection select2-selection--single"
                                            role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-disabled="false" aria-labelledby="select2-name_dep-sr-container"
                                            aria-controls="select2-name_dep-sr-container"><span
                                                class="select2-selection__rendered" id="select2-name_dep-sr-container"
                                                role="textbox" aria-readonly="true" title="Nhập tên phòng ban">Nhập tên
                                                phòng
                                                ban</span><span class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="search_qly">
                        <form action="" method="" enctype="multipart/form-data" class="form_timkiem">
                            <div class="tim-kiem share_form_select">
                                <select name="search" class="form-serach select2-hidden-accessible" data=""
                                    tabindex="-1" aria-hidden="true" data-select2-id="select2-data-48-ahmt">
                                    <option value="" data-select2-id="select2-data-50-nrhx">Nhập tên cần tìm</option>
                                    <?php
                                    $sql = "SELECT name_nv, id_nv FROM user_nv WHERE user_nv.id_cty=10000";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row["id_nv"] . '">(' . $row["id_nv"] . ')' . $row["name_nv"] . '</option>';
                                        }
                                    } else {
                                        echo "0 results";
                                    }

                                    // mysqli_close($conn);
                                    
                                    ?>

                                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                    data-select2-id="select2-data-49-anm5" style="width: 100%;"><span
                                        class="selection"><span class="select2-selection select2-selection--single"
                                            role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-disabled="false" aria-labelledby="select2-search-3z-container"
                                            aria-controls="select2-search-3z-container"><span
                                                class="select2-selection__rendered" id="select2-search-3z-container"
                                                role="textbox" aria-readonly="true" title="Nhập tên cần tìm">Nhập tên
                                                cần
                                                tìm</span><span class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                <span class="share_search"><img src="https://quanlychung.timviec365.vn/img/tim-kiem.png"
                                        alt=""></span>
                            </div>
                        </form>
                    </div>
                    <div class="ctn_chile_three" data="1">
                        <div class="detl_nv_table">
                            <div class="ctn_delt_table">
                                <table class="page_table_one" data="13">
                                    <thead class="share_thead share_bgr_one tabl_thead_one">
                                        <tr>
                                            <th class="share_clr_tow tex_center share_fsize_tow cr_weight">ID
                                            </th>
                                            <th class="share_clr_tow tex_center share_fsize_tow cr_weight">Họ
                                                tên</th>
                                            <th class="share_clr_tow tex_center share_fsize_tow cr_weight">SĐT
                                            </th>
                                            <th class="share_clr_tow tex_center share_fsize_tow cr_weight">Tài khoản
                                                đăng nhập
                                            </th>
                                            <th class="share_clr_tow tex_center share_fsize_tow cr_weight">Phòng
                                                ban</th>
                                            <th class="share_clr_tow tex_center share_fsize_tow cr_weight">Chức
                                                vụ</th>
                                            <th class="share_clr_tow tex_center share_fsize_tow cr_weight">Tùy
                                                chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sql = "SELECT * FROM user_nv WHERE id_cty = 10000 AND duyet = 1";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr data="">
                                                    <td class="share_fsize_one share_clr_one tex_center com_rd_id" data="1763">
                                                        <?php echo $row["id_nv"]; ?>
                                                    </td>
                                                    <td class="share_fsize_one share_clr_one cr_weight tex_left ep_rd_id"
                                                        data="1072756">
                                                        <a href="#">
                                                            <?php echo $row["name_nv"]; ?>
                                                        </a>
                                                    </td>
                                                    <td class="share_fsize_one share_clr_one tex_center">
                                                        <?php echo $row["sdt_nv"]; ?>
                                                    </td>
                                                    <td class="share_fsize_one share_clr_one tex_left">
                                                        <?php echo $row["email_nv"]; ?>
                                                    </td>
                                                    <td class="share_fsize_one share_clr_one tex_left dep_rd_id" data="2807">
                                                        <?php
                                                        $sql_p = mysqli_query($conn, "SELECT * FROM ql_phongban WHERE ql_phongban.id_cty = $row[id_cty] AND ql_phongban.id_phong = $row[id_phong]");
                                                        $row_p = mysqli_fetch_array($sql_p);
                                                        echo $row_p['name_phong'];
                                                        ?>
                                                    </td>
                                                    <td class="share_fsize_one share_clr_one tex_left">
                                                        <?php echo $row["chucvu"]; ?>
                                                    </td>
                                                    <td class="tabl_tuyc tex_center">
                                                        <p class="tuy_chinh share_clr_four share_cursor d_flex dflex_jc"
                                                            data-id="<?php echo $row["id_nv"]; ?>">
                                                            <span><img src="https://quanlychung.timviec365.vn/img/tc_clk.png"
                                                                    alt=""></span>
                                                            Tùy chỉnh
                                                        </p>
                                                        <div class="detl_tuychinh" data-show="0"
                                                            id="<?php echo $row["id_nv"]; ?>">
                                                            <div class="content_pop">
                                                                <ul class="navbar-nav">
                                                                    <a href="./edit_nv.php?id_nv=<?php echo $row["id_nv"]; ?>">
                                                                        <li class="nav-item" data-id="<?php echo $row["id_nv"]; ?>"
                                                                            onclick="id_edit_nv(<?php echo $row['id_nv']; ?>)">
                                                                            <div
                                                                                class="nav-child-item share_fsize_one share_clr_one d_flex">
                                                                                <span class="item_ic"><img
                                                                                        src="https://quanlychung.timviec365.vn/img/chinh-sua.png"
                                                                                        alt=""></span>
                                                                                Chỉnh sửa thông tin tài khoản
                                                                            </div>
                                                                        </li>
                                                                    </a>
                                                                    <li class="nav-item btx_delete_nv" data="1072756"
                                                                        data1="hehee" onclick="id_delete(<?php echo $row['id_nv']; ?>)">
                                                                        <div name="del_nv"
                                                                            class="nav-child-item share_fsize_one share_clr_one d_flex">
                                                                            <span class="item_ic"><img
                                                                                    src="https://quanlychung.timviec365.vn/img/xoa-tv.png"
                                                                                    alt=""></span>
                                                                            Xóa thành viên
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
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
                        <div class="table_page">
                            <ul class="ctn_page_table">
                                <li class="active"><a rel="nofollow">1</a></li>
                                <li><a rel="nofollow" href="/quan-ly-nhan-vien.html?cp=1763&amp;page=2" class="">2</a>
                                </li>
                                <li><a rel="nofollow" href="/quan-ly-nhan-vien.html?cp=1763&amp;page=2" class=" next"
                                        title="Next page">&gt;</a></li>
                            </ul>
                        </div>
                        <script type="text/javascript" src="/js/style.js"></script>
                        <script type="text/javascript" src="/js/qly_nhanvien.js"></script>
                        <script type="text/javascript" src="/js/validate_dat.js"></script>
                        <script type="text/javascript">
                            var a = $('.page_table_one').attr('data');
                            $('.tab_titl p .all_nv_cty').append('(' + a + ')');

                            var tuy_chinh = $(".tuy_chinh");
                            var detl_tuychinh = $(".detl_tuychinh");
                            tuy_chinh.click(function () {
                                var ep_id = $(this).attr("data-id");
                                detl_tuychinh.removeClass("active");
                                $('#' + ep_id).addClass("active");
                            });
                        </script>
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