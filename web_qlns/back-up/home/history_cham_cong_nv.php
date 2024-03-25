<div class="form-content cham-cong page_nv" data-nv="1" style="display: none">
    <div class="loc-cham-cong" style="display: none;">
        <p class="title-loc">Lọc: </p>
        <div class="box-pick ngay"> ngày 1
            <?php
            for ($i = 1; $i <= 31; $i++) {
                echo '<option value=' . $i . '>Ngày ' . $i . '</option>';
            }
            ?>
        </div>
        <div class="box-pick thang"> tháng 1
            <?php
            for ($i = 1; $i <= 12; $i++) {
                echo '<option value=' . $i . '>Ngày ' . $i . '</option>';
            }
            ?>
        </div>
        <button class="botton-loc">Lọc</button>
    </div>
    <form class="form-cham-cong">
        <div class="header-form-cham-cong">
            <div class="content-header-cham-cong date">Ngày/tháng</div>
            <div class="content-header-cham-cong time">Thời gian chấm công</div>
            <div class="content-header-cham-cong ca">Ca làm việc</div>
            <div class="content-header-cham-cong tinh-trang">Tình trạng</div>
        </div>
        <div class="content-form-cham-cong">
            <div class="content-line ex1">
                <div class="content-data-cham-cong date"> 13/12</div>
                <div class="content-data-cham-cong data-time">11:00</div>
                <div class="content-data-cham-cong data-ca">Ra ca sáng</div>
                <div class="content-data-cham-cong data-tinh-trang">Đúng giờ</div>
            </div>
            <div class="content-line ex2">
                <div class="content-data-cham-cong date"> 13/12</div>
                <div class="content-data-cham-cong data-time">7:00</div>
                <div class="content-data-cham-cong data-ca">Vào ca sáng</div>
                <div class="content-data-cham-cong data-tinh-trang">Đúng giờ</div>
            </div>
        </div>
    </form>
</div>