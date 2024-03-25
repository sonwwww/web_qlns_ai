
<div class="contain_calamviec page_cty" data-cty="7">
    <div class="form-content-add-ca" style="display: block;">
        <?php
        // if(isset($_POST['add-ca-db']))
        // {
        //     $tenCa = $_POST['name_ca_lam_viec'];
        //     $timeOn = $_POST['time_on_ca'];
        //     $timeOut = $_POST['time_out_ca'];
            
        //     $sql_insert_ca =mysqli_query($conn,"INSERT INTO ql_calamviec(ten_ca, vao, ra, id_cty) values ('$tenCa', '$timeOn', '$timeOut', 10000)");
        //     // sql query execution function
        //     if($sql_insert_ca)
        //     {
        //         ?>
        //         <script type="text/javascript">
        //         alert('Thêm thành công!');
        //         window.location.href='ql_calamviec.php';

        //         </script>
        //         <?php
        //     }
        //     else
        //     {
        //         ?>
        //         <script type="text/javascript">
        //         alert('Thêm chưa thành công!');
        //         </script>
        //         <?php
        //     }
        //     // sql query execution function
        // }
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