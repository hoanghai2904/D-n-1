
<h2 style="text-align: center;">SẢN PHẨM</h2>
 <div class="list_product">
     <?php foreach ($dssp as $sp) : ?>
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
                     <p class="card-text"><?= $price ?></p>
                     <a href="#" class="btn btn-primary">Mua</a>
                     <!-- <a href=""> -->
                     <input type="submit" class="btn btn-primary" name="addcart" value="Thêm vào giỏ hàng">
                     <!-- </a> -->
                 </div>
             </div>
             </div>

         </form>

     <?php endforeach ?>
 </div>