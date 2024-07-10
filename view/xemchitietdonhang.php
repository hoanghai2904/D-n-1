<style>
    .sub-banner {
        display: none;
    }

    .bartop {
        display: none;
    }

    .vieworder_customer {
        height: auto;
        margin-bottom: 100px;
        font-size: 1.6rem;


    }

    .content {
        background-color: white;

    }
</style>

<div class="container-xl vieworder_customer">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2 style="margin-top:25px ; margin-bottom: 20px; font-size: 20px;">Chi tiết đơn mua</h2>
                    </div>

                </div>
                <?php
                // echo '<pre>';
                // print_r($order_details);
                // echo '</pre>';
                use function PHPSTORM_META\type;
                ?>
                <table class="table table-striped table-hover table-bordered" style="font-size: 20px;">
                    <thead>
                        <tr>
                            <th>Thứ tự</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_prices = 0;
                        $i = 0;
                        ?>

                        <!-- @foreach($order_details as $key => $details) -->
                        <?php foreach ($order_details as $sp) : ?>

                            <?php
                            extract($sp)

                            ?>
                            <tr>
                                <td>
                                    <?php
                                    $i++;
                                    echo $i;
                                    ?>
                                </td>
                                <td><?= $name ?></td>
                                <td>
                                    <img src="./uploads/<?= $img ?>" height="100" width="100" alt="">
                                </td>
                                <td>
                                    <input type="text" disabled value="<?= $product_quantity ?>" name="product_quantity">
                                </td>
                                <!-- echo number_format($product_price) . ' VNĐ';  -->
                                <td><?= $total_price ?></td>
                                <td><?php echo number_format($product_quantity * $total_price) . ' VNĐ'; ?></td>
                            </tr>
                            <?php
                            $total_prices += $product_quantity * $total_price;
                            ?>

                        <?php endforeach ?>


                    <tfoot>
                        <tr>
                            <td colspan="5"><strong>Tổng đơn hàng:</strong></td>
                            <td><strong><?php echo number_format($total_prices) . ' VNĐ'; ?></strong></td>
                        </tr>
                    </tfoot>


                </table>
            </div>
        </div>
    </div>
</div>