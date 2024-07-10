 <!-- phần footer -->
 <footer>
     <div class="sum_footer">
         <div class="logo_footer">
             <img style="width: 150px;" src="" alt="">
             <ul>
                 <li>
                     <b style="color: #fca120;">Địa chỉ:</b>
                     <span style="font-weight: 500;color:aliceblue;">67 ngõ 2 đại lộ thăng long</span>
                 </li>
                 <li>
                     <b style="color: #fca120;">Điện thoại:</b>
                     <span style="font-weight: 500;color:aliceblue;">123456789</span>
                 </li>
                 <li>
                     <b style="color: #fca120;">Email:</b>
                     <span style="font-weight: 500;color:aliceblue;">anhvtlph@fpt.edu.vn</span>
                 </li>
             </ul>
             <h4 style="color: #fca120;">mạng xã hội</h4>
             <div class="Social_media">
                 <img src="./view/img/zalo.webp" alt="">
                 <img src="./view/img/facebook.webp" alt="">
                 <img src="./view/img/youtube.webp" alt="">
                 <img src="./view/img/google.webp" alt="">
             </div>
         </div>
         <div class="column_policy">
             <h2 style="color: #fca120; padding-top:20px ;">Chính sách</h2>
             <a href="">Mua hàng và thanh toán Online</a>
             <a href="">Chính sách giao hàng</a>
             <a href="">Trung tâm bảo hành chính hãng</a>
             <a href="">Tra thông tin bảo hành</a>
             <a href="">Mua hàng trả góp Online</a>
         </div>
         <div class="column_guide">
             <h2 style="color: #fca120;">Dịch vụ và thông tin khác</h2>
             <a href="">Ưu đãi thanh toán</a><a href="">Quy chế hoạt động</a>
             <a href="">Chính sách Bảo hành</a>
             <a href="">Dịch vụ bảo hành laptop</a>
             <a href="">Dịch vụ bảo hành mở rộng</a>
             <a href="">Khách hàng doanh nghiệp (B2B)</a>
         </div>
         <div class="column_Register">
             <h2 style="color: #fca120;">Đăng kí nhận tin</h2>
             <span style="color:aliceblue">Đăng kí để nhận ngay nhiều ưu đãi hập dẫn</span>
             <div class="footer_Register">
                 <input aria-label="Địa chỉ Email" type="email" class="form-control" placeholder="Nhập địa chỉ email" required="" autocomplete="off">
                 <button class="btn_Register" type="submit">ĐĂNG KÝ</button>
             </div>
             <div class="footer_pay">
                 <h4 style="color: #fca120;">Hình thức thanh toán</h4>
                 <img src="./view/img/payment_1.webp" alt="">
                 <img src="./view/img/payment_2.webp" alt="">
                 <img src="./view/img/payment_3.webp" alt="">
             </div>
         </div>
     </div>
 </footer>
<script src="javascript/main.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
 <script>
    var slideIndex = 0;
    var timeout;

    function slideshow() {
        var slides = document.querySelectorAll('.mySlides')
        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = 'none'
        }
        slideIndex++
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        if (slideIndex < 1) {
            slideIndex = slides.length
        }
        slides[slideIndex - 1].style.display = 'block'
        timeout = setTimeout(slideshow, 2000)
    }
    slideshow()

//     $(document).ready(function () {
//     $('.list_product').slick(
//         {
//             slidesToShow: 3,
//             slidesToScroll: 1,
//             autoplay: true,
//             autoplaySpeed: 2000,
//             arrows: false
//         }
//     );

// });
 </script>