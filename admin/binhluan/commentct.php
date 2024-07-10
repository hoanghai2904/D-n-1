<section class="main_content dashboard_part large_header_bg">
        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex align-items-center justify-content-between">
                            <div class="page_title_left">
                                <h3 class="f_s_30 f_w_700 text_white">Danh sách bình luận</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pt-5 mt-5">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">fullname</th>
                                <th scope="col">Nội Dung</th>
                                <th scope="col">Ngày Bình Luận</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $key=0; ?>
                            <?php foreach ($comments as $comment):?>
                                <?php extract($comment) ?>
                            <tr>
                                <td><?=$key+=1 ?></td>
                                <td><?=$fullname?></td>
                                <td><?=$noidung?></td>
                                <td><?=$ngaybinhluan ?></td>
                                <td>
                                    <a href="?act=xoacomment&id=<?=$id?>&idPro=<?=$_GET['idPro']?>"><button type="button" onclick="return confirm('Bạn có chắc chắn xóa')" class="btn btn-danger">Xóa</button></a>
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