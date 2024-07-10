<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Thêm sản phẩm</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pt-5 mt-5">
                <form action="?act=addsp" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
                        <span style="color: red;"><?php if(isset($thongbaoName)&&($thongbaoName!="")) echo $thongbaoName ?> </span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                        <span style="color: red;"><?php if(isset($thongbaoImage)&&($thongbaoImage!="")) echo $thongbaoImage ?> </span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Giá sản phẩm</label>
                        <input type="text" name="price" class="form-control" id="exampleFormControlInput1">
                        <span style="color: red;"><?php if(isset($thongbaoPrice)&&($thongbaoPrice!="")) echo $thongbaoPrice ?> </span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="mota" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Danh mục</label>
                        <select class="form-select" name="iddm" aria-label="Default select example">
                            <?php
                            foreach ($listdm as $dm) {
                                extract($dm);
                                echo '<option value="'.$categorys_id.'">'.$name.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <button type="reset" class="btn btn-secondary mx-2">Nhập lại</button>
                        <button type="submit" name="themmoi" class="btn btn-success mx-2">Thêm mới</button>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>
    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2023 - Designed by Quang<a href="#"> <i class="ti-heart"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="../../js/jquery1-3.4.1.min.js"></script>

<script src="../../js/metisMenu.js"></script>

<script src="../../js/custom.js"></script>