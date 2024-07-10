<div class="sum_form_login">
    <form action="index.php?act=sign" method="post">
        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; font-size: 30px;">
            Đăng ký
        </h5>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example17">Tên đăng nhập</label>
            <input type="text" name="user" id="form2Example17" class="form-control form-control-lg" />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example17">Địa chỉ Email</label>
            <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example27">Mật khẩu</label>
            <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example27"> Nhập Lại Mật khẩu</label>
            <input type="password" name="repassword" id="form2Example27" class="form-control form-control-lg" />
        </div>
        <div class="pt-1 mb-4">
            <input name="register" value="Đăng kí" class="btn btn-dark btn-lg btn-block" type="submit">
        </div>
        <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn đã có tài khoản? 
            <a href="?act=login" style="color: red;">Đăng nhập ở đây</a>
        </p>
    </form>
</div>