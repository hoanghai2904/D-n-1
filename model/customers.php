<?php
function loade_customer()
{
    $sql = "SELECT * FROM customers order by customer_id";
    $listcustomer = pdo_query($sql);
    return $listcustomer;
}
function loadOnecustomer($id)
{   
    $sql = "SELECT * FROM customers WHERE customer_id = $id";
    $listcustomer = pdo_query_one($sql);
    return $listcustomer;
}

function insert_customer($customer, $email, $password)
{
    $sql = "INSERT INTO `customers`( `customer_name`, `customer_email`, `customer_password`) VALUES ('$customer','$email','$password')";
    pdo_execute($sql);
}
function updatecustomer($id, $fullname, $password, $image, $phone, $address)
{
    $sql = "UPDATE `customers` SET customer_name ='" . $fullname . "',customer_password='" . $password . "'
    ,image='" . $image . "',phone='" . $phone . "',address='" . $address . "' 
    WHERE customer_id = $id";
    pdo_execute($sql);
}
function checkcustomer($email, $password)
{
    $sql = "SELECT * FROM users where `email` = '".$email."' AND `password` = '$password' ";
    $p = pdo_query_one($sql);
    return $p;
}

function getNamecustomer($email, $password){
    $sql = "SELECT customer_name FROM customers where customer_email = '$email' AND customer_password = '$password'";
    $p = pdo_query_one($sql);
    return $p['customer_name'];
}

function getIdcustomer($email, $password){
    $sql = "SELECT customer_id  FROM customers where customer_email = '$email' AND customer_password = '$password'";
    $p = pdo_query_one($sql);
    return $p['customer_id'];
}

// function checkemail($email){
//     $sql = "select * from customers where customer_email='".$email."'";
//     $sanpham = pdo_query_one($sql);
//     return $sanpham;
// }
function deletecustomer($id,$status){
    $sql ="UPDATE `customers` 
    SET `status` ='$status' 
    WHERE customer_id = $id";
    pdo_execute($sql);
}


