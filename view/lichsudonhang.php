<style>
    .sub-banner {
        display: none;
    }

    .bartop {
        display: none;
    }

    body {
        color: #566787;
        font-family: 'Roboto', sans-serif;
    }

    .table-responsive {
        margin: 30px 0;
    }

    .table-wrapper {
        min-width: 1000px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
        min-width: 100%;
    }

    .table-title h2 {
        margin: 8px 0 0;

    }

    .search-box {
        position: relative;
        float: right;
    }

    .search-box input {
        height: 34px;
        border-radius: 20px;
        padding-left: 35px;
        border-color: #ddd;
        box-shadow: none;
    }

    .search-box input:focus {
        border-color: #3FBAE4;
    }

    /*  */

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }

    table.table th i {

        margin: 0 5px;
        cursor: pointer;
    }

    table.table td:last-child {
        width: 130px;
    }

    table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
    }

    table.table td a.view {
        color: #03A9F4;
    }

    table.table td a.edit {
        color: #FFC107;
    }

    table.table td a.delete {
        color: #E34724;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }

    .pagination li a {
        border: none;

        width: 30px;
        height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 30px !important;
        text-align: center;
        padding: 0;
    }

    .pagination li a:hover {
        color: #666;
    }

    .pagination li.active a {
        background: #03A9F4;
    }

    .pagination li.active a:hover {
        background: #0397d6;
    }

    .pagination li.disabled i {
        color: #ccc;
    }

    .pagination li i {

        padding-top: 6px
    }

    .hint-text {
        float: left;
        margin-top: 6px;

    }

    .order_customer {
        height: auto;
        font-size: 1.6rem;
        padding-bottom: 100px;
    }

    .content {
        background-color: white;
    }
</style>

<head>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <?php
    $allDonHang = tatca_donhang($customer_id);
    ?>
    <div class="container order">
        <div class="row">
        </div>
        <div class="container-xl order_customer">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2 style="font-size: 17px;"> ĐƠN MUA HÀNG</h2>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 text-left">
                                <h7 class="tm-block-title d-inline-block" style="color: red;">
                                    <?php
                                    ?>
                                </h7>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" style="font-size: 17px;">
                            <thead>
                                <tr>
                                    <th>Mã hóa đơn</th>
                                    <!-- <th>Tổng giá tiền</th> -->
                                   
                                    <!-- <th>Hoàn thành</th>
                                <th>Đã hủy</th> -->
                                    <!-- <th>Tình trạng đơn hàng</th> -->
                                    <th>Ngày đặt hàng</th>
                                    <th>Trạng thái</th>
                                    <th>Xem đơn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allDonHang as $ord) : ?>
                                    <?php extract($ord) ?>
                                    <tr>
                                        <td><?php echo $order_code; ?></td>
                                       
                                            <?php
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
                                        
                                        <td><?php echo $order_date; ?></td>
                                        <td><?php echo  $statusDiffirent ?></td>
                                        
                                        <td>
                                                <a href="?act=view_order_details&order_code=<?= $order_code ?>" class="edit" title="View" data-toggle="tooltip"><i class="fa-regular fa-file-lines" style="color: red;"></i></a>
                                                <?php if($statusDiffirent == "Chờ xác nhận") :?>
                                                    <a href="?act=tuchoi&order_code=<?=$order_code?>"><button type="submit" style="width:70px; margin-left: 0;border-radius: 7px;padding: 5px; background-color: red; font-size: 16px;" class="btn-1 btn-primary btn-lg btn-block">Hủy</button></a> 
                                                  <?php endif; ?>  
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="clearfix">
                            <div class="hint-text" style="font-size: 17px;"><b>1</b> trên tổng <b>1</b> trang</div>
                            <ul class="pagination" style="font-size: 17px;">
                                <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                <li class="page-item active"><a href="#" class="page-link" style="z-index: 3;color: rgb(255, 255, 255);background-color: red;border-color: red;">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>

</body>

</html>