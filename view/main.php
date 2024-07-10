 <!-- slide show -->
 <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides ">
        <div class="numbertext"></div>
        <img src="./view/img/banner.jpeg" style="width:100%;height: 620px;">
        
        </div>

        <div class="mySlides ">
        <div class="numbertext"></div>
        <img src="./view/img/banner5.jpg" style="width:100%;height: 620px;">
        
        </div>

        <div class="mySlides ">
        <div class="numbertext"></div>
        <img src="./view/img/banner4.jpg" style="width:100%;height: 620px;">
        
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)"></a>
        <a class="next" onclick="plusSlides(1)"></a>
</div>

 <!-- menu phân loại sản phẩm -->
 <section>
     <div class="product_classification">
         <div class="category_classification">
             <div class="classification">
                 <img style="width: 89px; height: 90px" src="./view/img/HP3.jpg" alt="">
                 <h6 style="margin-top:30px; width:80px;">Macbook</h6>
             </div>
             <div class="classification">
                 <img style="width: 89px; height: 90px" src="./view/img/HP2.jpg" alt="">
                 <h6 style="margin-top:30px; width:80px;">ASUS</h6>
             </div>
             <div class="classification">
                 <img style="width: 89px; height: 90px" src="./view/img/ANHT5.jpg" alt="">
                 <h6 style="margin-top:30px; width:80px;">MSI</h6>
             </div>
             <div class="classification">
                 <img style="width: 89px; height: 90px" src="./view/img/ANHT3.jpg" alt="">
                 <h6 style="margin-top:30px; width:80px;">LENOVO</h6>
             </div>
             <div class="classification">
                 <img style="width: 89px; height: 90px" src="./view/img/ANHT4.jpg" alt="">
                 <h6 style="margin-top:30px; width:80px;">HP</h6>
             </div>
             <div class="classification">
                 <img style="width: 89px; height: 90px" src="./view/img/ANHT5.jpg" alt="">
                 <h6 style="margin-top:30px; width:80px;">ACER</h6>
             </div>
             <div class="classification">
                 <img style="width: 89px; height: 90px" src="./view/img/ANHT6.jpg" alt="">
                 <h6 style="margin-top:30px; width:80px;">DELL</h6>
             </div>
             <div class="classification">
                 <img style="width: 89px; height: 90px" src="./view/img/anht2.jpg" alt="">
                 <h6 style="margin-top:30px; width:80px;">GIGABYTE</h6>
             </div>
             <div class="classification">
                 <img style="width: 89px; height: 90px" src="./view/img/ANHT5.jpg" alt="">
                 <h6 style="margin-top:30px; width:80px;">LG</h6>
             </div>
         </div>
     </div>
 </section>

 <!-- danh sách sản phẩm-->
 <h2 style="text-align: center;">SẢN PHẨM MỚI</h2>
 <div id="frame" class="list_product">


     <?php foreach ($spnew as $sp) : ?>
         <?php extract($sp) ?>
         <form action="?act=cart" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $product_id?>" name="product_id">
            <input type="hidden" value="<?php echo $name?>" name="product_title">
            <input type="hidden" value="<?php echo $img?>" name="product_image">
            <input type="hidden" value="<?php echo $price?>" name="product_price">
            <input type="hidden" value="1" name="product_quantity">
            
            <!-- <input type="hidden" value="<?php ?>" name="product_quantity"> -->
    <div class="frame">
             <div class="card" style="width: 18rem;">

                 <a href="?act=productdetail&product_id=<?= $product_id ?>"><img href="spct.php" src="./uploads/<?= $img ?>" class="card-img-top" alt="..."> </a>
                 <div class="card-body">
                     <a href="?act=productdetail&product_id=<?= $product_id ?>">
                         <h5 class="card-title"><?= $name ?></h5>
                     </a>
                     <p class="card-text"> GIÁ TIỀN  : <?= $price ?></p>
                     <a href="thanhtoan.php" class="btn btn-primary">Mua</a>
                     <!-- <a href=""> -->
                     <input type="submit" class="btn btn-primary" name="addcart" value="Thêm vào giỏ hàng">
                     <!-- </a> -->
                 </div>
             </div>
             </div>
         </form>

     <?php endforeach ?>
 </div>

 <h2 style="text-align: center;">SẢN PHẨM NỔI BẬT</h2>
 <div class="list_product">


     <?php foreach ($spnb as $sp) : ?>
         <?php extract($sp) ?>
         <form action="?act=cart" method="post" enctype="multipart/form-data">
         <input type="hidden" value="<?php echo $product_id?>" name="product_id">
            <input type="hidden" value="<?php echo $name?>" name="product_title">
            <input type="hidden" value="<?php echo $img?>" name="product_image">
            <input type="hidden" value="<?php echo $price?>" name="product_price">
            <input type="hidden" value="1" name="product_quantity">
            <div class="frame">
         <div class="card" style="width: 18rem;">
             <a href="?act=productdetail&product_id=<?= $product_id ?>"> <img href="spct.php" src="./uploads/<?= $img ?>" class="card-img-top" alt="..."></a>
             <div class="card-body">
                 <a href="?act=productdetail&product_id=<?= $product_id ?>">
                     <h5 class="card-title"><?= $name ?></h5>
                 </a>
                 <p class="card-text">GIÁ TIỀN : <?= $price ?></p>
                 <a href="thanhtoan.php" class="btn btn-primary">Mua</a>
                 <input type="submit" class="btn btn-primary" name="addcart" value="Thêm vào giỏ hàng">
             </div>
         </div>
         </div>
         </form>

     <?php endforeach ?>
     <!-- <div class="card" style="width: 18rem;">
         <img href="spct.php" src="img/sp6.webp" class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title">Laptop Dell Inspirion 15 3511 PDP3H</h5>
             <p class="card-text">13.490.000đ</p>
             <a href="#" class="btn btn-primary">Mua</a>
             <a href="spct.php" class="btn btn-primary">Thêm vào giỏ hàng</a>
         </div>
     </div>

     <div class="card" style="width: 18rem;">
         <img href="spct.php" src="img/sp7.webp" class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title">Laptop Lenovo Ideapad Gaming 3 15ARH7 82SB00BBVN</h5>
             <p class="card-text">18.290.000đ</p>
             <a href="#" class="btn btn-primary">Mua</a>
             <a href="spct.php" class="btn btn-primary">Thêm vào giỏ hàng</a>
         </div>
     </div>

     <div class="card" style="width: 18rem;">
         <img href="spct.php"  src="img/sp8.webp" class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title">Laptop Asus VivoBook X515KA-EJ135W</h5>
             <p class="card-text">7.549.000đ</p>
             <a href="#" class="btn btn-primary">Mua</a>
             <a href="spct.php" class="btn btn-primary">Thêm vào giỏ hàng</a>
         </div> -->
     <!-- </div> -->
 </div>