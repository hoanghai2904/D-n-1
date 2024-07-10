<section class="main_content dashboard_part large_header_bg">
        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex align-items-center justify-content-between">
                            <div class="page_title_left">
                                <h3 class="f_s_30 f_w_700 text_white">Danh sách danh mục</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pt-5 mt-5">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Ngày cập nhật</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $key =0 ?>
                            <?php foreach ($listAlldm as $dm):?>
                                <?php extract($dm)?>
                            <tr>
                                <td><?=$key+=1?></td>
                                <td><?=$name?></td>
                                <td><?=$added_on?></td>
                                <td><?= ($status==0) ?"show" :"hidden" ?></td>
                                <td>
                                    <a href="index.php?act=updatedm&categorys_id=<?=$categorys_id ?>"><button type="button" class="btn btn-success">Sửa</button></a>
                                    <?php if($status ==0 ) :?>
                                    <a href="index.php?act=xoadm&categorys_id=<?=$categorys_id ?>"><button type="button" onclick="return confirm('Bạn có muốn xóa danh mục này không')" class="btn btn-danger">Xóa</button></a>
                                    <?php else :?>
                                        <a href="index.php?act=xoadm&categorys_id=<?=$categorys_id ?>"><button type="button" onclick="return confirm('Bạn có muốn khôi phục lại tài khoản này không?')" class="btn btn-danger">Khôi phục</button></a>
                                    <?php endif ?>
                               </td>
                            </tr>
                            <?php endforeach; ?>
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
                            <p>2023 - Designed by Quang<a href="#"> <i class="ti-heart"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>