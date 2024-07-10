<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/sales-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 18:12:16 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin GROUP9</title>
    <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
    <link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />
    <link rel="stylesheet" href="../view/css/metisMenu.css">
    <link rel="stylesheet" href="../css/style1.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="crm_body_bg">
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include "header.php";
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/user.php";
    include "../model/comment.php";
    include "../model/donhang.php";
    include "../model/thongke.php";
    $listuser = loade_user();
    $listdm =loadAlldmhome();
    $thongke = thongkedoanhthu()
    ?>
    <?php
    if ((isset($_GET['act'])) && ($_GET['act']) != "") {
        $act = $_GET['act'];
        switch ($act) {
            case 'adddm':
                if(isset($_POST['submit'])){
                    $name = $_POST['name'];
                    if(empty($name)){
                    $thongbaoname = "Trường bắt buộc không được bỏ trống";
                    }else{
                        insert_danhmuc($name);
                        $thongbao = "Thêm thành công";
                    }
                 
                }
                include("category/addCategory.php");
                break;
            case 'listdm':
                $listAlldm =  loadAlldm();
                include("category/listcategory.php");
                break;
            case 'updatedm':
                if(isset($_GET['categorys_id'])&& ($_GET['categorys_id']>0)){
                    $id = $_GET['categorys_id'];
                     $getOne = loadOnedm($id);
                }
                if(isset($_POST['capnhat']) &&($_POST['capnhat'])){
                    $name = $_POST['name'];
                    $id = $_POST['iddm'];
                    update_danhmuc($name,$id);
                    header("location:?act=listdm");
                }
                include("category/updateCategory.php");
                break;
            case 'xoadm':
                if(isset($_GET['categorys_id']) && $_GET['categorys_id']>0){
                    $id = $_GET['categorys_id'];
                    $status = loadOnedm($id)['status'];
                    if($status==0){
                        $status=1;
                    }else{
                        $status=0;
                    }
                    delete_danhmuc($id,$status);
                    header("location:?act=listdm");
                }
                break;
                case 'addsp':
                    if(isset($_POST['themmoi'])){
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $mota = $_POST['mota'];
                        $image = $_FILES['image']['name'];
                        $iddm = $_POST['iddm'];
                        if(empty($name) || empty($price) || empty($image)){
                            $thongbaoName = "Vui lòng nhập tên sản phẩm";
                            $thongbaoPrice = "Vui lòng nhập giá sản phẩm";
                            $thongbaoImage = "Vui lòng chọn ảnh";
                        }else{
                            $target_dir = "../uploads/";
                            $target_file = $target_dir.basename($image);
                            move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
                            insert_sanpham($name,$price,$image,$mota,$iddm);
                            $thongbao ="thêm mới thành công";
                        }
                       
                    }
                    include("product/addProduct.php");
                 
                break;
            case 'listsp':
                $listAlldm =  loadAlldm();
                $listAllsp = loadAllsp();
                include("product/listProducts.php");
                break;
            case 'updatesp':
                if(isset($_GET['product_id'])&& $_GET['product_id']>0){
                    $id = $_GET['product_id'];
                    $getOne = loadone_sanpham($id);
                }
                if(isset($_POST['update'])){
                    $idsp = $_POST['idsp'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $image = $_FILES['image']['name'];
                    $mota = $_POST['mota'];
                    $iddm = $_POST['iddm'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir.basename($image);
                    move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
                    update_sanpham($idsp,$name,$price,$image,$mota,$iddm);
                    header("location:?act=listsp");
                }
                include("product/updateProduct.php");
                break;
            case 'xoasp':
                 if(isset($_GET['product_id'])&& $_GET['product_id']>0){
                    $id = $_GET['product_id'];
                    $status = loadone_sanpham($id)['status'];
                    if($status==0){
                        $status=1;
                    }else{
                        $status = 0;
                    }
                    delete_sanpham($id,$status);
                    header("location:?act=listsp");
                }
            case 'listUser':
                $listuser = loade_user();
                include("taikhoan/account.php");
                break;
            case 'updateUser':
                if(isset($_GET['id'])&& $_GET['id']>0){
                $id = $_GET['id'];
                $getOne = loadOneUser($id);
                }
                if(isset($_POST['update'])){
                    $id = $_POST['id_user'];
                    $fullname = $_POST['fullname'];
                    $password = $_POST['password'];
                    $image = $_FILES['image']['name'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir.basename($image);
                    move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
                    updateUser($id, $fullname, $password, $image, $phone, $address);
                    header("location:?act=listUser");
                }
                include("taikhoan/updateUser.php");
                break;
            case 'deleteUser':
                if(isset($_GET['id'])&& $_GET['id']>0){
                    $id = $_GET['id'];
                    $status = loadOneUser($id)['status'];
                    if($status==0){
                        $status= 1;
                    }else{
                        $status = 0;
                    }
                    deleteUser($id,$status);
                    header("location:?act=listUser");
                }
                break;
            case 'listComment':
                $comments = commentGetAll();
                include("binhluan/comment.php");
                break;
            case'Commentct':
                if(isset($_GET['idPro'])&& $_GET['idPro']>0){
                    $id = $_GET['idPro'];
                 $comments =commentchitiet($id);;

                }
                include("binhluan/commentct.php");
                break;
            case'xoacomment':
                if(isset($_GET['id']) && isset($_GET['idPro'])){
                    $idPro = $_GET['idPro'];
                    $id = $_GET['id'];
                    commentDelete($id);
                    header("location:?act=Commentct&idPro=$idPro");
                }
            case'dsdh':
                $order = tatca_donhang();
                include("orders/order.php");
                break;
            case 'orderDetail':
                if(isset($_GET['idOrder'])){
                    $code_order = $_GET['idOrder'];
                $listOrders = selectALlOrdersDetail($code_order);
                }
                include('orders/orderDetail.php');
                break;
            case 'updateStatus':
                if(isset($_GET['idOrder'])){
                    $code_order = $_GET['idOrder'];
                }
                if(isset($_GET["status"])){
                    $status = $_GET["status"];
                }
                updateStatus($status,$code_order);
                    header("location:?act=dsdh");
                break;
            case 'huy':
                if(isset($_GET['idOrder'])){
                    $code_order = $_GET['idOrder'];
                    updatedonhangStatus(5,$code_order);
                    header("location:?act=dsdh");
                }
                case 'thongke':
                    $listtk  =loadall_thongke();
                    include "thongke/list.php";
                        break;
                case 'bieudo':
                    $listtk =loadall_thongke();
                    include "thongke/bieudo.php";
                        break;
        
        }
    } else {
        include "home.php";
    }
    ?>
    <script src="../js/jquery1-3.4.1.min.js"></script>

    <script src="../js/popper1.min.js"></script>

    <script src="../js/bootstrap.min.html"></script>

    <script src="../js/metisMenu.js"></script>

    <script src="../js/chart.min.js"></script>
    <script src="vendors/count_up/jquery.waypoints.min.js"></script>

    <script src="vendors/chartlist/Chart.min.js"></script>

    <script src="vendors/count_up/jquery.counterup.min.js"></script>

    <script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>

    <script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>

    <script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatable/js/buttons.flash.min.js"></script>
    <script src="vendors/datatable/js/jszip.min.js"></script>
    <script src="vendors/datatable/js/pdfmake.min.js"></script>
    <script src="vendors/datatable/js/vfs_fonts.js"></script>
    <script src="vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="vendors/datatable/js/buttons.print.min.js"></script>

    <script src="vendors/datepicker/datepicker.js"></script>
    <script src="vendors/datepicker/datepicker.en.js"></script>
    <script src="vendors/datepicker/datepicker.custom.js"></script>
    <script src="vendors/chartjs/roundedBar.min.js"></script>

    <script src="vendors/progressbar/jquery.barfiller.js"></script>

    <script src="vendors/tagsinput/tagsinput.js"></script>

    <script src="vendors/text_editor/summernote-bs4.js"></script>
    <script src="vendors/am_chart/amcharts.js"></script>

    <script src="vendors/scroll/perfect-scrollbar.min.js"></script>
    <script src="vendors/scroll/scrollable-custom.js"></script>

    <script src="vendors/vectormap-home/vectormap-2.0.2.min.js"></script>
    <script src="vendors/vectormap-home/vectormap-world-mill-en.js"></script>

    <script src="vendors/apex_chart/apex-chart2.js"></script>
    <script src="vendors/apex_chart/apex_dashboard.js"></script>
    <script src="vendors/echart/echarts.min.js"></script>
    <script src="vendors/chart_am/core.js"></script>
    <script src="vendors/chart_am/charts.js"></script>
    <script src="vendors/chart_am/animated.js"></script>
    <script src="vendors/chart_am/kelly.js"></script>
    <script src="vendors/chart_am/chart-custom.js"></script>

    <script src="../js/dashboard_init.js"></script>
    <script src="../js/custom.js"></script>
</body>


</html>