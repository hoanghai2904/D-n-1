<?php
function loade_user()
{
    $sql = "SELECT * FROM users order by users_id";
    $listuser = pdo_query($sql);
    return $listuser;
}
function loadOneUser($id)
{
    $sql = "SELECT * FROM users WHERE users_id = $id";
    $listuser = pdo_query_one($sql);
    return $listuser;
}
function insert_taikhoan($user, $email, $password)
{
    $sql = "INSERT INTO `users`( `fullname`, `email`, `password`) VALUES ('$user','$email','$password')";
    pdo_execute($sql);
}
function updateUser($id, $fullname, $password, $image, $phone, $address)
{
    $sql = "UPDATE `users` SET fullname ='" . $fullname . "',password='" . $password . "'
    ,image='" . $image . "',phone='" . $phone . "',address='" . $address . "' 
    WHERE users_id = $id";
    pdo_execute($sql);
}
function checkuser($email, $password)
{
    $sql = "SELECT * FROM users where email = '$email' AND password = '$password'";
    $p = pdo_query_one($sql);
    return $p;
}

function checkuseremail($email){
    $sql = "SELECT * FROM users where email = '".$email."' ";
    return  pdo_query_one($sql); 
    
}

function getIdUser($email, $password){
    $sql = "SELECT users_id  FROM users where email = '$email' AND password = '$password'";
    $p = pdo_query_one($sql);
    return $p['users_id'];
}


function checkemail($email){
    $sql = "select * from users where email='".$email."'";
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}
function deleteUser($id,$status){
    $sql ="UPDATE `users` 
    SET `status` ='$status' 
    WHERE users_id = $id";
    pdo_execute($sql);
}


