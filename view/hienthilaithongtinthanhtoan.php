<style>
.container {
    max-width: 960px;
}

.lh-condensed {
    line-height: 1.25;
}

.list-group {
    max-height: 400px;
    overflow-y: auto;
}
</style>

<?php
$table_order = "order";
$table_order_details = "order_detail";

// $name = $_POST["name"];
$name = isset($_POST["name"]) && !empty($_POST["name"]) ? $_POST["name"] : "";

// $sodienthoai = $_POST["sodienthoai"];
$sodienthoai = isset($_POST["sodienthoai"]) && !empty($_POST["sodienthoai"]) ? $_POST["sodienthoai"] : "";

// $email = $_POST["email"];
$email = isset($_POST["email"]) && !empty($_POST["email"]) ? $_POST["email"] : "";

// $noidung = $_POST["noidung"];
$noidung = isset($_POST["noidung"]) && !empty($_POST["noidung"]) ? $_POST["noidung"] : "Không có ghi chú";

// $diachi = $_POST["diachi"];
$diachi = isset($_POST["diachi"]) && !empty($_POST["diachi"]) ? $_POST["diachi"] : "";

// $customer_id = $_SESSION['user_id'];

$customer_id = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
// bien toan bo trong gio hang
$cart = show_giohang($customer_id);

?>
<div class="container" style="margin-top: -50px;">
    <div class="py-5 text-center">

        <h2>Kiểm tra thông tin đơn hàng</h2>

    </div>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Thông tin sản phẩm</span>
                <!-- <span class="badge badge-secondary badge-pill">3</span> -->
            </h4>
            <ul class="list-group mb-3 sticky-top">
                <?php
                $total_price = 0;
                $i = 0;
                ?>
                <?php
                if(isset($_SESSION['shopping_cart'])){

                foreach ($_SESSION['shopping_cart'] as $sp) : ?>
                <?php
                    extract($sp)

                    ?>

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><?= $product_title ?></h6>
                        <small class="text-muted">Số lượng: <?= $product_quantity ?></small>
                        <img src="./uploads/<?= $product_image ?>" width="50px" alt="">
                        <br>
                        <small class="text-muted">Giá tiền: <?= number_format($product_price) . ' ' . 'VNĐ' ?></small>

                    </div>
                    <span
                        class="text-muted"><?= number_format($product_price * $product_quantity) . ' ' . 'VNĐ' ?></span>
                </li>
                <?php
                    $total_price += $product_quantity * $product_price;
                    ?>

                </li>

                <?php endforeach ?>
                <?php } ?>


                <li class="list-group-item d-flex justify-content-between">
                    <span>Tổng hóa đơn</span>
                    <strong>

                        <?php echo number_format($total_price) . ' VNĐ'; ?>

                    </strong>
                </li>
            </ul>

        </div>

        <div class="col-md-8 order-md-1">
            <?php
            if ($name == "") {
                echo 'Trang vừa tải lại. Vui lòng quay lại giỏ hàng và vào thanh toán.';
                echo '<a href="?act=cart">Trở lại trang giỏ hàng</a>';
            }
            ?>


            <h4 class="mb-3">Thông tin khách hàng</h4>
            <!-- <form class="needs-validation" novalidate=""> -->
            <form action="?act=order" method="post" enctype="multipart/form-data" id="order"
                onsubmit="return validateForm()">
                <input type="hidden" value="<?php echo $name ?>" name="name">
                <input type="hidden" value="<?php echo $sodienthoai ?>" name="sodienthoai">
                <input type="hidden" value="<?php echo $email ?>" name="email">
                <input type="hidden" value="<?php echo $noidung ?>" name="noidung">
                <input type="hidden" value="<?php echo $diachi ?>" name="diachi">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Họ tên</label>
                        <input type="text" class="form-control" id="firstName" placeholder=""
                            value="<?php echo $name; ?>">
                        <!-- <div class="invalid-feedback"> Valid first name is required. </div> -->
                    </div>

                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>
                    <input type="email" class="form-control" id="email" value="<?php echo $email; ?>">
                    <!-- <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div> -->
                </div>
                <div class="mb-3">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" value="<?php echo $diachi; ?>">
                    <!-- <div class="invalid-feedback"> Please enter your shipping address. </div> -->
                </div>
                <div class="mb-3">
                    <label for="sodienthoai">Số điện thoại <span class="text-muted"></span></label>
                    <input type="text" class="form-control" id="sodienthoai" value="<?php echo $sodienthoai; ?>">
                    <!-- <div class="invalid-feedback"> Please enter a valid phone number for shipping updates. </div> -->
                </div>
                <div class="mb-3">
                    <label for="ghichu">Ghi chú <span class="text-muted"></span></label>
                    <input type="text" class="form-control" id="ghichu" value="<?php echo $noidung; ?>">
                    <!-- <div class="invalid-feedback"> Please enter a valid phone number for shipping updates. </div> -->
                </div>

                <hr class="mb-4">

                <h4 style="font-size: 20px;font-weight: bold">Chọn hình thức thanh toán:</h4>

                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input type="checkbox" name="payment_option" value="2" required> Thanh toán khi nhận hàng
                    </label>
                </div>

                <?php
                if ($name == "") {
                ?>
                <a href="?act=cart" type="button" class="button cart_button_checkout"
                    style="width: 300px; font-size: 16px; margin-left: 640px">Trở lại trang giỏ hàng</a>
                <?php
                } else {
                ?>
                <button name="order" type="submit" class="button cart_button_checkout"
                    style="width: 300px; font-size: 16px; margin-left: 640px;">Xác nhận thanh toán</button>
                <?php
                }
                ?>


            </form>
        </div>
    </div>

</div>


<script>
(function() {
    'use strict'

    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation')

        // Loop over them and prevent submission
        Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    }, false)
}())
</script>