<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Danh sách đơn hàng</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pt-5 mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">fullname</th>
                            <th scope="col">email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($order as $all) :?>
                        <?php extract($all) ;
                                if($order_status == 1){
                                    $statusDiffirent = 'Chờ xác nhận';
                                }elseif ($order_status == 2){
                                    $statusDiffirent = 'Đang xử lí';
                                }elseif ($order_status == 3){
                                    $statusDiffirent = 'Đang vận chuyển';
                                }elseif ($order_status == 4){
                                    $statusDiffirent = 'Giao hàng thành công';
                                }elseif ($order_status == 5){
                                    $statusDiffirent = 'Huỷ bỏ';
                                }
                                ?>

                        <tr>
                            <td><?=$order_id ?></td>
                            <td><?=$order_code ?></td>
                            <td><?=$name?></td>
                            <td><?=$email?></td>
                            <td><?=$address?></td>
                            <td><?=$order_date?></td>
                            <td><?=$statusDiffirent ?></td>
                            <td>
                                <a href="?act=orderDetail&idOrder=<?=$order_code?>"><button type="button"
                                        class="btn btn-primary">Xem</button></a>
                                <?php if($order_status ==1)  { ?>
                                <a href="index.php?act=updateStatus&idOrder=<?=$order_code?>&status=<?=$order_status?>">
                                    <button type="button"
                                        onclick="return confirm('bạn có muốn xác nhận đơn hàng không')"
                                        class="btn btn-success">
                                        Xác Nhận
                                    </button>
                                </a>
                                <a href="?act=huy&idOrder=<?=$order_code?>">
                                <button type="button"
                                        onclick="return confirm('bạn có muốn hủy đơn hàng không')"
                                        class="btn btn-danger">Hủy</button></a>
                                <?php }elseif($order_status == 2) { ?>
                                <a href="index.php?act=updateStatus&idOrder=<?=$order_code?>&status=<?=$order_status?>">
                                    <button type="button"
                                        onclick="return confirm('bạn có muốn xác nhận đơn hàng không')"
                                        class="btn btn-success">
                                        Giao hàng
                                    </button>
                                </a>
                                <?php }elseif($order_status == 3) { ?>
                                <a href="index.php?act=updateStatus&idOrder=<?=$order_code?>&status=<?=$order_status?>">
                                    <button type="button"
                                        onclick="return confirm('bạn có muốn xác nhận đơn hàng không')"
                                        class="btn btn-success">
                                        Giao hàng thành công
                                    </button>
                                </a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2023 - Designed by DucNgoc<a href="#"> <i class="ti-heart"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>