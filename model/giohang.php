<?php

function insert_giohang($data_cart)
{
    if (
        isset($data_cart['product_id']) &&
        isset($data_cart['product_title']) &&
        isset($data_cart['product_price']) &&
        isset($data_cart['product_image']) &&
        isset($data_cart['product_quantity']) &&
        isset($data_cart['customer_id'])
    ) {
        $product_id = $data_cart['product_id'];
        $product_title = $data_cart['product_title'];
        $product_price = $data_cart['product_price'];
        $product_image = $data_cart['product_image'];
        $product_quantity = $data_cart['product_quantity'];
        $customer_id = $data_cart['customer_id'];

        $sql = "INSERT INTO `cart` (product_id, product_title, product_price, product_image, product_quantity, customer_id) 
                VALUES ('$product_id', '$product_title', '$product_price', '$product_image', '$product_quantity', '$customer_id')";

        pdo_execute($sql);
    } else {
        echo "Lỗi: Dữ liệu không đủ.";
    }
}


function update_quantity_soluong_giohang($product_id, $customer_id)
{
    $sql = "UPDATE `cart`
        SET product_quantity = product_quantity + 1
        WHERE product_id = $product_id AND customer_id = $customer_id";
    pdo_execute($sql);
}

function delete_sanpham_giohang($product_id, $customer_id)
{
    $sql = "DELETE FROM `cart`
        WHERE product_id = $product_id AND customer_id = $customer_id";

    pdo_execute($sql);
}

function delete_giohang($customer_id)
{
    $sql = "DELETE FROM `cart`
        WHERE customer_id = $customer_id";
    pdo_execute($sql);
}


function thaydoisoluong_sanpham_giohang($product_id, $customer_id, $qty)
{
    $sql = "UPDATE `cart`
        SET product_quantity = $qty;
        WHERE product_id = $product_id AND customer_id = $customer_id";
    pdo_execute($sql);
}

function show_giohang($customer_id)
{
    $sql = "SELECT * FROM cart WHERE customer_id = $customer_id";
    $listAll = pdo_query($sql);
    return $listAll;
}

