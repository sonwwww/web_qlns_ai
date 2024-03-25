<script>
    function confirmDelete(id) {
        var confirmation = confirm("Bạn có chắc muốn xóa?");
        if (confirmation) {
            // Chuyển hướng đến trang xử lý xóa trên server (PHP)
            window.location.href = 'delete.php?id=' + id;
        }
    }
</script>
<div class="contain_calamviec page_cty" data-cty="7" style="display: none">
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
                <button class="add-ca">+ Thêm ca làm việc</button>
            </div>
            <div class="form_content_ca">
                <?php 
                    $dem = 1;
                    $sql_ca = "SELECT * FROM ql_ca WHERE id_cty = 10000";
                    $result_ca = mysqli_query($conn, $sql_ca);
                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row_ca = mysqli_fetch_assoc($result_ca)) {
                ?>
                    <div class="content_ca exp-ca-<?php echo $dem; ?>">
                        <div class="content-name-ca">
                            <div class="name-ca">
                                <p><?php echo $row_ca["name_ca"]; ?></p>
                            </div>
                        </div>
                        <div class="content-time-ca">
                            <div class="time-ca-vao">
                                <p>Ca vào: <?php echo $row_ca["time_on"]; ?></p>
                            </div>
                            <div class="time-ca-ra">
                                <p>Ca ra: <?php echo $row_ca["time_out"]; ?></p>
                            </div>
                        </div>
                        <form action="" method="post" class="form-content-edit-ca">
                            <div class="edit-ca"><input type="submit" name="edit-ca-db" value="Sửa"></div>
                            <div class="delete-ca"><button onclick="confirmDelete('<?php echo $row_ca['Stt_ca']; ?>')">Xóa</button></div>
                        </form>
                    </div>
                <?php
                    $dem = $dem + 1;
                    }
                    } else {
                    echo "0 results";
                    }
                    
                ?>
            </div>
        </div>
    </div>
    <div class="form-content-add-ca" style="display: none;">
        <?php
        if(isset($_POST['add-ca-db']))
        {
            $tenCa = $_POST['name_ca_lam_viec'];
            $timeOn = $_POST['time_on_ca'];
            $timeOut = $_POST['time_out_ca'];
            $sql_sel_ca =mysqli_query($conn,"SELECT name_ca FROM ql_ca WHERE id_cty = 10000");
            $row_all_ca = mysqli_fetch_assoc($sql_sel_ca);
            $sql_insert_ca =mysqli_query($conn,"INSERT INTO ql_ca(name_ca, time_on, time_out, id_cty) values ('$tenCa', '$timeOn', '$timeOut', 10000)");
            // sql query execution function
            if($sql_insert_ca && $tenCa != $row_all_ca['name_ca'])
            {
                ?>
                <script type="text/javascript">
                alert('Thêm thành công!');
                // window.location.href='lietkedanhmucsp.php';
                </script>
                <?php
            }
            else
            {
                ?>
                <script type="text/javascript">
                alert('Thêm chưa thành công!');
                </script>
                <?php
            }
            // sql query execution function
        }
        ?>
        <div class="title-add-ca">
            <p>Thêm ca làm việc</p>
        </div>
        <form class="form-add-ca-st" action="" method="post">
            <div class="form-add-ca">
                <div class="add-name-ca">
                    <label for="name_ca">Nhập tên ca làm việc<span>*</span></label>
                    <input type="text" id="name_ca" name="name_ca_lam_viec"  required>
                </div>
                <div class="add-time-ca">
                    <div class="add-time-ca-on">
                        <label for="time_on">Nhập thời gian vào<span>*</span>:</label>
                        <input type="time" id="time_on" name="time_on_ca" required>
                    </div>
                    <div class="add-time-ca-out">
                        <label for="time_out">Nhập thời gian ra<span>*</span>:</label>
                        <input type="time" id="time_out" name="time_out_ca" required>
                    </div>
                </div>
                <div class="submit-ca">
                    <input type="submit" name="add-ca-db" value="Thêm">
                </div>
            </div>
        </form>
    </div>
</div>