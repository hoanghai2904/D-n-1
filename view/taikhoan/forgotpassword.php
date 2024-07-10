<div class="sum_form_login">
    <form action="index.php?act=forgotpassword" method="post">
        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; font-size: 30px;">
            Quên Mật Khẩu</h5>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example17">Email</label>
            <input type="email" name="email" id="form2Example17"
                class="form-control form-control-lg" />
                <span style="color:red;"><?php echo isset($_SESSION['email'])?$_SESSION['email']:''?></span>
        </div>

        <div class="pt-1 mb-4">
            <input name="guiemail" value="Gửi" class="btn btn-dark btn-lg btn-block"
                type="submit">
            <input type="reset" value="Nhập lại">
        </div>
    </form>
</div>