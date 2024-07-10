<style>
* {
    margin: 0;
    padding: 0;
    -webkit-font-smoothing: antialiased;
    -webkit-text-shadow: rgba(0, 0, 0, .01) 0 0 1px;
    text-shadow: rgba(0, 0, 0, .01) 0 0 1px
}

body {
    font-family: 'Rubik', sans-serif;
    font-size: 14px;
    font-weight: 400;
    color: #000000
}

ul {
    list-style: none;
    margin-bottom: 0px
}

.button {
    display: inline-block;
    background: #0e8ce4;
    border-radius: 5px;
    height: 48px;
    -webkit-transition: all 200ms ease;
    -moz-transition: all 200ms ease;
    -ms-transition: all 200ms ease;
    -o-transition: all 200ms ease;
    transition: all 200ms ease
}

.button a {
    display: block;
    font-size: 18px;
    font-weight: 400;
    line-height: 48px;
    color: #FFFFFF;
    padding-left: 35px;
    padding-right: 35px
}

.button:hover {
    opacity: 0.8
}

.cart_section {
    width: 100%;
    padding-top: 10px;
    padding-bottom: 50px
}

.cart_title {
    font-size: 30px;
    font-weight: 500
}

.cart_items {
    margin-top: 8px
}

.cart_list {
    border: solid 1px #e8e8e8;
    box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
    background-color: #fff
}

.cart_item {
    width: 100%;
    padding: 15px;
    padding-right: 46px;
    border-bottom: 1px solid grey;
}

.cart_item_image {
    width: 133px;
    height: 133px;
    float: left
}

.cart_item_image img {
    max-width: 150%
}

.cart_item_info {
    width: calc(100% - 133px);
    float: left;
    padding-top: 18px
}

.cart_item_name {
    margin-left: 7.53%
}

.cart_item_title {
    font-size: 14px;
    font-weight: 400;
    color: rgba(0, 0, 0, 0.5)
}

.cart_item_text {
    font-size: 18px;
    margin-top: 35px
}

.cart_item_text span {
    display: inline-block;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    margin-right: 11px;
    -webkit-transform: translateY(4px);
    -moz-transform: translateY(4px);
    -ms-transform: translateY(4px);
    -o-transform: translateY(4px);
    transform: translateY(4px)
}

.cart_item_price {
    text-align: right
}

.cart_item_total {
    text-align: right
}

.order_total {
    width: 100%;
    height: 60px;
    margin-top: 30px;
    border: solid 1px #e8e8e8;
    box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
    padding-right: 46px;
    padding-left: 15px;
    background-color: #fff
}

.order_total_title {
    display: inline-block;
    font-size: 14px;
    color: rgba(0, 0, 0, 0.5);
    line-height: 60px
}

.order_total_amount {
    display: inline-block;
    font-size: 18px;
    font-weight: 500;
    margin-left: 26px;
    line-height: 60px
}

.cart_buttons {
    padding-top: 50px;
}

.cart_button_clear {
    display: inline-block;
    border: none;
    font-size: 18px;
    font-weight: 400;
    line-height: 48px;
    color: rgba(0, 0, 0, 0.5);
    background: #FFFFFF;
    border: solid 1px #b2b2b2;
    padding-left: 35px;
    padding-right: 35px;
    outline: none;
    cursor: pointer;
    margin-right: 26px
}

.cart_button_clear:hover {
    border-color: #0e8ce4;
    color: #0e8ce4
}

.cart_button_checkout {
    display: inline-block;
    border: none;
    font-size: 18px;
    font-weight: 400;
    line-height: 48px;
    color: #FFFFFF;
    padding-left: 35px;
    padding-right: 35px;
    outline: none;
    cursor: pointer;
    vertical-align: top
}
</style>
<?php
$cart = show_giohang($customer_id);
?>
<div class="cart_section cart">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container">
                    <div class="cart_title">Giỏ hàng</div>
                    <!-- <small> (1 item in your cart) </small> -->

                    <div class="cart_items">
                        <ul class="cart_list">
                            <?php

                            // echo '<pre>';
                            // print_r($cart);
                            // echo '</pre>';

                            use function PHPSTORM_META\type;

                            ?>

                            <?php
                            $total = 0;
                            ?>

                            <?php

                            if (!isset($_SESSION['username'])) {

                                if (isset($_SESSION['shopping_cart'])) {
                                    $total = 0;
                                    foreach ($_SESSION['shopping_cart'] as $key => $value) {
                                        if ($value['product_quantity'] == 0)
                                            continue;
                                        $subtotal = $value['product_price'] * $value['product_quantity'];
                                        $total += $subtotal;
                                        $_SESSION['total'] =$total;
                            ?>
                            <form action="?act=update-cart" method="post">
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img
                                            src="view/img/<?php echo $value['product_image']; ?>" alt=""></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col" style="width: 200px;">
                                            <div class="cart_item_title">Tên sản phẩm</div>
                                            <div class="cart_item_text"><?php echo $value['product_title']; ?></div>
                                        </div>
                                        <div class="cart_item_price cart_info_col" style="">
                                            <div class="cart_item_title">Số tiền</div>
                                            <div class="cart_item_text">
                                                <?php echo number_format($value['product_price']); ?> VNĐ</div>
                                        </div>
                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Số lượng</div>
                                            <div style="margin-top: 35px;">
                                                <input type="text" name="qty[<?php echo $value['product_id']; ?>]"
                                                    value="<?php echo $value['product_quantity']; ?>"
                                                    style="width: 50px">
                                                <input type="hidden" value="" name="rowId_cart">
                                                <!-- <input type="submit" value="Cập nhật" name="update_cart" class=""> -->
                                                <button style="width: 100px; height: 50px;" type="submit"
                                                    value="<?php echo $value['product_id']; ?>" name="update_cart">Cập
                                                    nhật</button>
                                            </div>
                                        </div>
                                        <div class="cart_item_price cart_info_col" style="">
                                            <div class="cart_item_title">Tổng tiền</div>
                                            <div class="cart_item_text"><?php echo number_format($subtotal); ?> VNĐ
                                            </div>
                                        </div>
                                        <div class="cart_item_total cart_info_col" style="width: 60px">
                                            <div class="cart_item_title">Thao tác</div>
                                            <div class="cart_item_text">
                                                <input type="hidden" name="">
                            
                                                <button type="submit" class="btn btn-sm btn-warning"
                                                    value="<?php echo $value['product_id']; ?>" name="delete_cart"
                                                    style="width: 90px;">Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </form>
                            <?php
                                    }
                                } else {
                                    // Hiển thị thông báo khi giỏ hàng trống
                                    echo '<li>Giỏ hàng trống</li>';
                                }
                            }
                            ?>







                            <!-- hien thi gio hang cho khach hang da dang nhap -->
                            <?php

                            if (isset($_SESSION['username'])) {

                                if (isset($cart)) {
                                    $total = 0;
                                    foreach ($cart as $key => $value) {
                                        if ($value['product_quantity'] == 0)
                                            continue;
                                        $subtotal = $value['product_price'] * $value['product_quantity'];
                                        $total += $subtotal;
                            ?>
                            <form action="?act=update-cart" method="post">
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img
                                            src="view/img/<?php echo $value['product_image']; ?>" alt=""></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col" style="width: 200px;">
                                            <div class="cart_item_title">Tên sản phẩm</div>
                                            <div class="cart_item_text"><?php echo $value['product_title']; ?></div>
                                        </div>
                                        <div class="cart_item_price cart_info_col" style="">
                                            <div class="cart_item_title">Số tiền</div>
                                            <div class="cart_item_text">
                                                <?php echo number_format($value['product_price']); ?> VNĐ</div>
                                        </div>
                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Số lượng</div>
                                            <div style="margin-top: 35px;">
                                                <input type="text" name="qty[<?php echo $value['product_id']; ?>]"
                                                    value="<?php echo $value['product_quantity']; ?>"
                                                    style="width: 50px">
                                                <input type="hidden" value="" name="rowId_cart">
                                                <!-- <input type="submit" value="Cập nhật" name="update_cart" class=""> -->
                                                <button style="width: 100px; height: 50px;" type="submit"
                                                    value="<?php echo $value['product_id']; ?>" name="update_cart">Cập
                                                    nhật</button>
                                            </div>
                                        </div>
                                        <div class="cart_item_price cart_info_col" style="">
                                            <div class="cart_item_title">Tổng tiền</div>
                                            <div class="cart_item_text"><?php echo number_format($subtotal); ?> VNĐ
                                            </div>
                                        </div>
                                        <div class="cart_item_total cart_info_col" style="width: 60px">
                                            <div class="cart_item_title">Thao tác</div>
                                            <div class="cart_item_text">
                                                <!-- Thêm các thao tác cần thiết, ví dụ: -->
                                                <!-- <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" href="?act=delete-cart" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-x fa-sm"></i></a> -->
                                                <!-- <input type="hidden" value="" name="delete_id"> -->
                                                <!-- <input type="submit" value="Xóa" class="btn btn-sm btn-warning" name="delete-cart"> -->
                                                <button type="submit" class="btn btn-sm btn-warning"
                                                    value="<?php echo $value['product_id']; ?>" name="delete_cart"
                                                    style="width: 90px;">Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </form>
                            <?php
                                    }
                                } else {
                                    // Hiển thị thông báo khi giỏ hàng trống
                                    echo '<li>Giỏ hàng trống</li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Tổng hóa đơn:</div>
                            <div class="order_total_amount">
                                <!-- {{Cart::subtotal().' '.'VNĐ'}} -->
                                <?php echo number_format($total) . ' VNĐ'; ?>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>



        <!--  -->
        <div class="cart_buttons">
            <a href="">
                <button type="button" class="button cart_button_clear" style="width: 200px;float: left;">Trang
                    chủ</button>
            </a>

            <a href="?act=checkout" class="button cart_button_checkout" style="float: right">
                Thanh toán
            </a>

        </div>
    </div>
</div>