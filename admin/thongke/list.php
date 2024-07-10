<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Danh sách thống kê</h3>
                        </div>
                    </div>
                </div>
            </div>
                <div class="container pt-5 mt-5">
                <table class="table table-bordered text-center">
            <tr>
                <th>MÃ DANH MỤC</th>
                <th>TÊN DANH MỤC</th>
                <th>SỐ LƯỢNG SẢN PHẨM </th>
                <th>GIÁ THẤP NHẤT</th>
                <th>GIÁ CAO NHẤT</th>
                <th>GIÁ TRUNG BÌNH</th>
            </tr>

            <?php
            foreach ($listtk as $tk) {
                extract($tk);             
                echo '
                    <tr>
                    <td>'.$madm.'</td>
                    <td>'.$tendm.'</td>
                    <td> '.$countsp.' </td>
                    <td> '.$minprice.' </td>
                    <td> '.$maxprice.' </td>
                    <td> '.$avgprice.' </td>
                    </tr>
        ';
            }
            ?>
                </table>
            </div>
            <div class="row2">
       <a href="index.php?act=bieudo"><input type="submit" value="Xem biểu đồ"></a>
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

    <style>
    .row2 input {
        width: 100px;
        height: 35px;
        
        margin-top: 10px;
        margin-left: 440px;
        background-color: black;
        color: white;
        border: 1px solid gray;
    }

    .row2 input:hover {
        background-color: white;
        color: black;
    }
    </style>