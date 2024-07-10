<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Cập nhật Tài Khoản</h3>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (is_array($getOne)) {
                extract($getOne);
            }
            ?>
            <div class="container pt-5 mt-5">
                <form action="?act=updateUser" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="id_user" id="exampleFormControlInput1" value="<?= $users_id?>">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label><br>
                        <input type="text" class="form-control mt-3" name="email" disabled id="exampleFormControlInput1" value="<?=$email?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Fullname</label>
                        <input type="text" class="form-control" name="fullname" id="exampleFormControlInput1" value="<?= $fullname ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleFormControlInput1" value="<?= $password ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image</label>
                        <img src="../uploads/<?=$image?>" alt="">
                        <input type="file" class="form-control" name="image" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="exampleFormControlInput1" value="<?= $phone ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"><?= $address ?></textarea>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" name="update" class="btn btn-success">Cập nhật</button>
                    </div>
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