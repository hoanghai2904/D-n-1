<style>
    .bartop_checkout {
        display: none;
    }

    .content {
        padding: 20px 0 70px 0;
    }
</style>

<?php if(isset($_SESSION['user'])) : ?>
    <?php extract($_SESSION['user']) ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 order-md-1" style="font-size: 15px;">
            <h3 class="mb-3">Thông tin thanh toán</h3>
            <form class="needs-validation was-validated" action="?act=thongtinthanhtoan" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <label for="firstName">Họ và tên</label>
                        <input name="name" type="text" class="form-control form-control-lg validate" id="firstName" placeholder="Nhập họ tên" value="<?=$fullname?>" required>
                        <div class="invalid-feedback">
                            Yêu cầu tên hợp lệ.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control form-control-lg validate" id="email" placeholder="you@example.com" value="<?=$email?>" required>
                    <div class="invalid-feedback">
                        Vui lòng nhập địa chỉ email hợp lệ để cập nhật thông tin vận chuyển.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address">Địa chỉ</label>
                    <input name="diachi" type="text" class="form-control form-control-lg validate" id="diachi" placeholder="13 Trịnh Văn Bô" value="<?=$address?>" required>
                    <div class="invalid-feedback">
                        Vui lòng nhập địa chỉ vận chuyển của bạn.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username">Điện thoại</label>
                    <div class="input-group">
                        <input name="sodienthoai" type="text" class="form-control form-control-lg validate" id="username" placeholder="0367754896" value="<?=$phone?>"  required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Vui lòng nhập số điện thoại của bạn
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username" required>Ghi chú giao hàng</label>
                    <div class="input-group">
                        <textarea name="noidung" id="" cols="70" rows="5"></textarea>
                    </div>
                </div>
                <!-- <div class="mb-3">
                    <h5 class="mb-3">Phương thức thanh toán</h5>
                    <input type="radio" id="phuongthucthanhtoan" name="phuongthucthanhtoan" value="Thanh toán khi nhận hàng" required checked>
                    <label for="phuongthucthanhtoan">Thanh toán khi nhận hàng</label>
                </div> -->
                <hr class="mb-4">
                <button name="send_order" class="btn btn-primary btn-lg btn-block" style="width: 300px;margin-left: 0; font-size: 16px;" type="submit">Ghi nhận thanh toán</button>
                <br><br>
            </form>
        </div>
    </div>
</div>
<?php else : ?>
    <div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6 order-md-1" style="font-size: 15px;">
            <h3 class="mb-3">Thông tin thanh toán</h3>

            <form class="needs-validation was-validated" action="?act=thongtinthanhtoan" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <label for="firstName">Họ và tên</label>
                        <input name="name" type="text" class="form-control form-control-lg validate" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Yêu cầu tên hợp lệ.
                        </div>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control form-control-lg validate" id="email" placeholder="you@example.com" required>
                    <div class="invalid-feedback">
                        Vui lòng nhập địa chỉ email hợp lệ để cập nhật thông tin vận chuyển.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Địa chỉ</label>
                    <input name="diachi" type="text" class="form-control form-control-lg validate" id="diachi" placeholder="13 Trịnh Văn Bô" required>
                    <div class="invalid-feedback">
                        Vui lòng nhập địa chỉ vận chuyển của bạn.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username">Điện thoại</label>
                    <div class="input-group">

                        <input name="sodienthoai" type="text" class="form-control form-control-lg validate" id="username" placeholder="0367754896" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Vui lòng nhập số điện thoại của bạn
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username" required>Ghi chú giao hàng</label>
                    <div class="input-group">
                        <textarea name="noidung" id="" cols="70" rows="5"></textarea>

                    </div>
                </div>
                <!-- <div class="mb-3">
                    <h5 class="mb-3">Phương thức thanh toán</h5>

                    <input type="radio" id="phuongthucthanhtoan" name="phuongthucthanhtoan" value="Thanh toán khi nhận hàng" required checked>
                    <label for="phuongthucthanhtoan">Thanh toán khi nhận hàng</label>
                </div> -->

                <hr class="mb-4">


                <button name="send_order" class="btn btn-primary btn-lg btn-block" style="width: 300px;margin-left: 0; font-size: 16px;" type="submit">Ghi nhận thanh toán</button>


                <br><br>
            </form>
        </div>
    </div>

</div>
    <?php endif; ?>