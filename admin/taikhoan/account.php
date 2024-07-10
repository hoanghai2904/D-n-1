<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Danh sách tài khoản</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pt-5 mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Email</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Mật khẩu</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Vai Trò</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <?php
                    $key=0; 
                    foreach ($listuser as $user) : ?>
                        <?php extract($user) ?>
                        <tbody>
                            <tr>
                                <th><?= $key+=1 ?></th>
                                <th><?= $email ?></th>
                                <th><?= $fullname ?></th>
                                <th><?= $password ?></th>
                                <th> <img src="../uploads/<?=$image?>" width="50px" alt=""></th>
                                <th><?= $phone ?></th>
                                <th><?= $address ?></th>
                                <th><?= ($role==0)?"Khách Hàng" : "Admin" ?></th>
                                <th><?= ($status ==0)? "Action" : "Block" ?></th>
                                <td>
                                    <a href="?act=updateUser&id=<?=$users_id?>"><button type="button" class="btn btn-success">Sửa</button></a>
                                <?php if($status ==0 ) :?>                                   
                                    <a href="?act=deleteUser&id=<?=$users_id?>">
                                    <button type="button" class="btn btn-danger" onclick="return confirm('Bạn có muốn khóa tài khoản này không')">Khóa</button>
                                    </a>
                                 <?php else : ?>
                                    <a href="?act=deleteUser&id=<?=$users_id?>">
                                    <button type="button" class="btn btn-danger" onclick="return confirm('Bạn có muốn kích hoạt lại tài khoản này không')" >Kích hoạt</button>
                                    </a>
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