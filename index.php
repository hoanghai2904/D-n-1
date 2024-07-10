<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/user.php";
include "model/pdo.php";
include "model/binhluan.php";
include "model/donhang.php";
include "model/customers.php";
include "model/giohang.php";
// include "model/sanpham.php";


$alldm = loadAlldmhome();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<div class="wraper">
    <?php
    require 'view/layout/header.php';
    ?>

    <?php
    $spnew = loalspnew();
    $spnb =  loalspnb();



    if (isset($_GET['act']) && $_GET['act'] != "") {
        $act = $_GET['act'];
        switch ($act) {
            case 'sign':
                if (isset($_POST['register'])) {
                 $user=$_POST['user'];
                 $email=$_POST['email'];
                 $password=$_POST['password'];
                 $repassword=$_POST['repassword'];
                if($password==$repassword){
                  $checkuser= checkuseremail($email);
                  if(is_array($checkuser)){
                    echo "email da ton tai";
                    
                  }else{
                    insert_taikhoan($user, $email, $password);
                    header("location:?act=login");
                  }

                }else{
                    echo "password phai trung voi reopassword";
                }


                }
                include "view/taikhoan/sign.php";
                break;
            case 'login':
                if (isset($_POST['login']) && $_POST['login']) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $checkuser = checkcustomer($email, $password);
                    if (is_array($checkuser)) {
                        $_SESSION['user'] = $checkuser;
                        header('location: index.php');
                        echo '<script>window.location.replace("index.php");</script>';

                    } else {
                        $thongbao = "Tai khoan khong ton tai";
                    }
                }
                include 'view/taikhoan/login.php';
                break;

            case 'logout':
                unset($_SESSION["user"]);
                // header('location: index.php');
                echo '<script>window.location.replace("index.php");</script>';
                break;
            case 'forgotpassword':
                if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                    $email = $_POST['email'];
                    $user = checkemail($email);
                    if (is_array($user)) {
                        echo "Mật khẩu của bạn là: " . $user['password'];
                    } else {
                        echo "Email này không tồn tại";
                    }
                }
                include "view/taikhoan/forgotpassword.php";
                break;
            case 'product':
                include 'view/products.php';
                break;

            case 'checkout':
                include 'view/thanhtoan.php';
                break;

            case 'view_order_details':
                if (isset($_GET['order_code'])) {
                    // $product_id = $_GET['product_id'];
                    $order_details = xem_chitiet_donhang($_GET['order_code']);
                    // $binhluan = load_cmt($product_id);
                } 
                
                include 'view/xemchitietdonhang.php';
                break;
                
            case 'order_history':
                
                $customer_id = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
                
                include 'view/lichsudonhang.php';
                break;
                case 'thongtinthanhtoan':
                    include 'view/hienthilaithongtinthanhtoan.php';
                    break;
                    
            case 'tuchoi':
                if(isset($_GET['order_code'])){
                    $id = $_GET['order_code'];
                    updatedonhangStatus('5',$id);
                    header("location:?act=order_history");
                }
        break;
            case 'order':
                if(isset($_POST['order'])){
                    // $table_order = "order";
                    // $table_order_details = "order_detail";
                    $name = $_POST["name"];
                    $sodienthoai = $_POST["sodienthoai"];
                    $email = $_POST["email"];
                    $noidung = isset($_POST["noidung"]) && !empty($_POST["noidung"]) ? $_POST["noidung"] : "Không có ghi chú";
                    $diachi = $_POST["diachi"];
                    $customer_id = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
                    date_default_timezone_set('asia/ho_chi_minh');
                    $order_code = rand(0, 9999);
                    $date = date("d/m/Y");
                    $hour = date("h:i:sa");
                    insert_orders($order_code, $date, $name, $sodienthoai, $email, $noidung, $diachi, $_SESSION['total']);
                        foreach ($_SESSION["shopping_cart"] as $key => $cart) {
                            $idProduct = $cart['product_id'];
                            $quantity = $cart['product_quantity'];
                            $price = $cart['product_price'] * $quantity;
                            insert_detailOrders($order_code, $idProduct ,$quantity,$price);
                            
                        }
                        unset($_SESSION["shopping_cart"]);
                        unset($_SESSION["total"]);
                        delete_giohang($customer_id);
                        header("location:index.php?act=cart");
                    }
                    include 'view/hienthilaithongtinthanhtoan.php';
    

                break;
                // them vao gio hang
            case 'cart':
                // session_start();
                // Session::init();
                // session_destroy();
            
                $customer_id_for_nologin = rand(0, 10000);
                $customer_id = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

                if (isset($_POST['product_id'], $_POST['product_quantity'])) {
                    if (isset($_SESSION["shopping_cart"])) {
                        $avaiable = 0;
                        foreach ($_SESSION["shopping_cart"] as $key => $value) {
                            if ($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['product_id']) {
                                $avaiable++;
                                $_SESSION["shopping_cart"][$key]['product_quantity'] =  $_SESSION["shopping_cart"][$key]['product_quantity'] + $_POST['product_quantity'];
                                update_quantity_soluong_giohang($_POST['product_id'], $customer_id);
                            }
                        }
                        if ($avaiable == 0) {
                            $item = array(
                                'product_id'    => $_POST["product_id"],
                                'product_title' => $_POST["product_title"],
                                'product_price' => $_POST["product_price"],
                                'product_image' => $_POST["product_image"],
                                'product_quantity' => $_POST["product_quantity"],
                                'customer_id' => $customer_id,
                            );

                            insert_giohang($item);
                            $_SESSION["shopping_cart"][] = $item;
                        }
                    } else {
                        // $_SESSION["shopping_cart"] = array_filter($_SESSION["shopping_cart"], function ($item) {

                        //     return !empty($item['product_id']) && !empty($item['product_title']) && !empty($item['product_price']) && !empty($item['product_image']) && !empty($item['product_quantity']);
                        // });

                        $item = array(
                            'product_id'    => $_POST["product_id"],
                            'product_title' => $_POST["product_title"],
                            'product_price' => $_POST["product_price"],
                            'product_image' => $_POST["product_image"],
                            'product_quantity' => $_POST["product_quantity"],
                            'customer_id' => $customer_id,
                        );
                        insert_giohang($item);
                        $_SESSION["shopping_cart"][] = $item;
                    }
                }

                include 'view/cart.php';
                break;

            case 'update-cart':
                $customer_id = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
                $cart = show_giohang($customer_id);

                if (isset($_POST['delete_cart'])) {
                    if (isset($_SESSION["shopping_cart"])) {
                        foreach ($_SESSION["shopping_cart"] as $key => $value) {
                            if ($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['delete_cart']) {
                                unset($_SESSION["shopping_cart"][$key]);
                                delete_sanpham_giohang($_POST['delete_cart'], $customer_id);
                            }
                            // include 'view/cart.php';
                        }
                    } else {
                        // include 'view/cart.php';
                    }
                } else {
                    foreach ($_POST["qty"] as $key => $qty) {
                        foreach ($_SESSION["shopping_cart"] as $session => $value) {
                            if ($value['product_id'] == $key && $qty >= 1) {
                                $_SESSION["shopping_cart"][$session]['product_quantity'] = $qty;
                                thaydoisoluong_sanpham_giohang($key, $customer_id, $qty);
                                                                
                            } elseif ($value['product_id'] == $key && $qty <= 0) {
                                unset($_SESSION["shopping_cart"][$session]);
                                delete_sanpham_giohang($value['product_id'], $customer_id);
                            }
                        }
                    }
                }

                include 'view/cart.php';
                break;

            case 'sanpham':
                if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                    $iddm = $_GET['iddm'];
                } else {
                    $iddm = 0;
                }
                $dssp = loadlist_sanpham($iddm);
                $alldm = loadAlldm();
                include "view/sanpham.php";
                break; 
            case 'productdetail':
                if (isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
                    $id_customers = $_SESSION['user']['users_id'];
                    $date = date('Y-m-d');
                    $id_pro = $_POST['idpro'];
                    $noidung = $_POST['noidung'];
                    insert_cmt($id_pro, $id_customers, $noidung, $date);
                    header("location:?act=productdetail&product_id=$id_pro");
                }

                if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                    $product_id = $_GET['product_id'];
                    $onesp = loadone_sanpham($product_id);
                    $binhluan = load_cmt($product_id);
                    $sp_cung_loai = loalspcl();
                } else {
                    include "view/main.php";
                }
                include 'view/spct.php';
                break;
            case 'lienhe':
                    include "view/lienhe.php";
                    break;
            case 'thongke':
                $listtk = loadall_thongke();
                include "thongke/list.php";
                break;
            case 'bieudo':
                $listtk = loadall_thongke();
                include "thongke/bieudo.php";
                break;

            default:

                break;
        }
    } else {
        include "view/main.php";
    }
    ?>
    <?php
    require 'view/layout/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>