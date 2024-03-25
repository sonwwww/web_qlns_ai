<div class="page_content_register">
    <div class="form-content-register">
        <form id="registrationForm" action="register.php" method="post">
            <h2>Đăng ký</h2>
            <div class="group-control name_m">
                <label for="username" class="control-label"><span style="color:red">*</span>Tên nhân viên:</label>
                <div class="form-control">
                    <input type="text" id="username" name="username" value="" required
                        placeholder="Nhập số tên nhân viên">
                </div>
            </div>
            <div class="group-control mail_m">
                <label for="email" class="control-label"><span style="color:red">*</span>Email:</label>
                <div class="form-control">
                    <input type="email" id="email" name="email" required placeholder="Nhập email">
                </div>
            </div>
            <div class="group-control pass_m">
                <label for="password" class="control-label"><span style="color:red">*</span>Mật khẩu:</label>
                <div class="form-control">
                    <input type="password" id="password" name="password" value="" required placeholder="Nhập mật khẩu">
                </div>
            </div>
            <div class="group-control repass_m">
                <label for="password" class="control-label"><span style="color:red">*</span>Mật lại khẩu:</label>
                <div class="form-control">
                    <input type="password" id="repassword" name="repassword" required placeholder="Nhập lại mật khẩu">
                </div>
            </div>
            <div class="group-control id_cty_m">
                <label for="id_cty" class="control-label"><span style="color:red">*</span>ID công ty:</label>
                <div class="form-control">
                    <input type="text" id="id_cty" name="id_cty" required placeholder="Nhập ID công ty">
                </div>
            </div>
            <div class="group-control phone_m">
                <label for="phone" class="control-label"><span style="color:red">*</span>Số điện thoại:</label>
                <div class="form-control">
                    <input type="text" id="number_phone" name="phone" required placeholder="Nhập số điện thoại">
                </div>
            </div>
            <div class="group-control address_m">
                <label for="address" class="control-label"><span style="color:red">*</span>Địa chỉ:</label>
                <div class="form-control">
                    <input type="text" id="address" name="address" required placeholder="Nhập địa chỉ">
                </div>
            </div>

            <button type="button" id="register_web">Đăng ký</button>
        </form>
    </div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}
?>