
<div class="sum_form_login">
    <form action="index.php?act=login" method="post">
        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; font-size: 30px;">
            Đăng nhập
        </h5>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example17">Địa chỉ Email</label>
            <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example27">Mật khẩu</label>
            <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" />
        </div>

        <div class="pt-1 mb-4">
            <input name="login" value="Đăng nhập" class="btn btn-dark btn-lg btn-block" type="submit">
        </div>
        <a class="small text-muted" href="?act=forgotpassword">Quên mật khẩu?</a>
        <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn chưa có tài khoản?
            <a href="?act=register" style="color: red;">Đăng ký ở đây</a>
        </p>
    </form>
</div>
