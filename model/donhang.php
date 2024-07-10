<?php

function insert_detailOrders($order_code, $product_id ,$product_quantity,$total_price)
{
        $sql = "INSERT INTO `order_detail` (order_code, product_id ,product_quantity,total_price) 
        VALUES ('$order_code', '$product_id' ,'$product_quantity','$total_price')";
        pdo_execute($sql);

}

function insert_orders($order_code, $order_date, $name, $phone, $email, $note, $address, $total)
{
    
        $sql = "INSERT INTO `order` (order_code, order_date, name, phone, email, note, address, total)
                VALUES ('$order_code', '$order_date', '$name', '$phone', '$email', '$note', '$address', '$total')";
        pdo_execute($sql);
} 
function tatca_donhang()
{
    $sql = "SELECT * FROM `order`
    ORDER BY order_id  DESC";
    $listAll = pdo_query($sql);
    return $listAll;
}

function xem_chitiet_donhang($order_code)
{
    // $sql = "SELECT * FROM `order_detail` WHERE order_code = $order_code";
    $sql = " SELECT order_detail.*, products.*
FROM order_detail
JOIN products ON order_detail.product_id = products.product_id
WHERE order_detail.order_code = $order_code;
    ";
    $listAll = pdo_query($sql);
    return $listAll;
}
function updateStatus($status,$code_order)
{
    if($status == 1){
        $sql = "update `order` set order_status = 2 where order_code = '$code_order'";
}elseif ($status == 2){
        $sql = "update `order` set order_status = 3 where order_code = '$code_order'";
    }elseif ($status == 3){
        $sql = "update `order` set order_status = 4 where order_code = '$code_order'";
    }elseif ($status == 4){
        $sql = "update `order` set order_status = 5 where order_code = '$code_order'";
    }elseif ($status == 5){
        $sql = "update `order` set order_status = 6 where order_code = '$code_order'";
    }
    pdo_execute($sql);
}
function updatedonhangStatus($status,$code_order){
    $sql = "update `order` set order_status = '$status' where order_code = $code_order";
    pdo_execute($sql);
}

function selectALlOrdersDetail($code_order){
    $sql = "Select *, name,img from order_detail inner join products
                       on order_detail.product_id = products.product_id
                       where order_code = '$code_order'";
    $list = pdo_query($sql);
    return $list;
}
function thongkedoanhthu(){
    $sql = "SELECT
    MONTH(added_on) AS month,
    COUNT(*) AS total_orders,
    SUM(total) AS total_revenue
FROM
    `order`
WHERE
    order_status = '4'
GROUP BY
    month
ORDER BY
    month";
    return pdo_query($sql);
}