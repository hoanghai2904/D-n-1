<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Danh sách sản phẩm</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pt-5 mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Ngày Cập nhật</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $key = 0;
                        foreach ($listAllsp as $sp) :
                            extract($sp);
                        ?>
                            <tr>
                                <td><?= $key+=1 ?></td>
                                <td><?= $name ?></td>
                                <td><img src="../uploads/<?= $img ?>" width="70" ></td>
                                <td><?= $price ?></td>
                                <td> <textarea style="border: none;" name="" id="" cols="30" rows="3"><?= $description ?></textarea> </td>
                                <td><?= $category_id ?></td>
                                <td><?= $added_on?></td>
                                <td><?= ($status ==0 )?"Show":"Hidden" ?></td>
                                <td>
                                    <a href="index.php?act=updatesp&product_id=<?= $product_id ?>"><button type="button" class="btn btn-success">Sửa</button></a>
                                    <?php if($status == 0) : ?>
                                        <a href="index.php?act=xoasp&product_id=<?= $product_id ?>"><button type="button" onclick="return confirm('bạn có muốn xóa sản phẩm này không')" class="btn btn-danger" >Xóa</button></a>
                                    <?php else :?>
                                        <a href="index.php?act=xoasp&product_id=<?= $product_id ?>"><button type="button" onclick="return confirm('bạn có muốn khôi phục lại sản phẩm này không')" class="btn btn-danger" >Khôi phục</button></a>
                                    <?php endif ?>
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
<script src="../../js/jquery1-3.4.1.min.js"></script>

<script src="../../js/metisMenu.js"></script>

<script src="../../js/custom.js"></script>