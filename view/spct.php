<?php
extract($onesp)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    <form action="?act=cart" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $product_id ?>" name="product_id">
        <input type="hidden" value="<?php echo $name ?>" name="product_title">
        <input type="hidden" value="<?php echo $img ?>" name="product_image">
        <input type="hidden" value="<?php echo $price ?>" name="product_price">
        <input type="hidden" value="1" name="product_quantity">
        <div style="display: flex; gap: 60px; justify-content: center; margin: 90px;" class="sum">
            <div style="width: 595px;" id="carouselExampleFade" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img href="spct.php" src="./uploads/<?= $img ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img href="spct.php" src="./uploads/<?= $img ?>" class="card-img-top" alt="...">
                    </div>
                </div>
                <button style="height: 476px;" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button style="height: 476px;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="info_product" style="width: 50%;">
                <div class="name_product">
                    <h3><?= $name ?></h3>
                </div>
                <div class="Status">
                    <b>Tình trạng:</b>
                    <?php if ($status == 0) {
                        echo 'Hết hàng';
                    } else {
                        echo 'Còn hàng';
                    }
                    ?>
                    <br>
                    <b>Mã hàng:</b>
                    <span><?= $product_id ?></span>
                </div>
                <div class="pirce_product">
                    <span class="price_sp"><?= $price ?>đ</span>
                </div>
                <div class="describe_product">
                    <h4>Mô tả: <?= $description ?> </h4>
                </div>
                <div class="quantity-container">
                    <div class="product-details" style="margin-left: -23px;">
                        <div class="quantity-controls">
                            <button style="background: white; color:black;" class="quantity-btn" onclick="decreaseQuantity()">-</button>
                            <input type="text" id="quantityInput" value="1" readonly>
                            <button style="background: white; color:black;" class="quantity-btn" onclick="increaseQuantity()">+</button>
                        </div>
                    </div>
                </div>
                <div>
                    
                    <!-- <button class="but1" style="width: 108px;" type="button" class="btn btn-warning  mt-4">Add cart</button> -->

                    <input type="submit" class="btn btn-primary" name="addcart" value="Thêm Vào Giỏ Hàng">

                </div>

            </div>

        </div>

    </form>


    <div>
        <div class="mb">
            <div class="">BÌNH LUẬN</div>
            <table>

                <?php
                foreach ($binhluan as $key) {
                    extract($key);
                   
                    echo '<tr>
                                <td>' . $noidung . '</td>
                                <td>' . $fullname . '</td>
                                <td>' . date("d-m-Y", strtotime($ngaybinhluan)) . '</td>
                              </tr>';
                }
                ?>
            </table>
        </div>
        <?php
      
        // echo $_SESSION['user']['users_id'];
        if (isset($_SESSION['user']['users_id']) and $_SESSION['user']['users_id'] > 0) {
        ?>
            <div class="box_search">
                <form action="index.php?act=productdetail" method="POST">
                <input type="hidden" name="idpro" value="<?= $_GET['product_id'] ?>">
                    <input type="text" name="noidung">
                    <input type="submit" name="guibinhluan" value="Gửi bình luận">
                </form>
            </div>
        <?php
        } else {
        ?>
            <a href="" style="color: red; padding-top: 10px; text-decoration: none;">Đăng nhập để bình luận !</a>
        <?php
        }
        ?>
        <br><br>

    </div>
    <h2 style="text-align: center;">SẢN PHẨM CÙNG LOẠI</h2>
 <div class="list_product">
     <?php foreach ($sp_cung_loai as $sp) : ?>
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


    </div>