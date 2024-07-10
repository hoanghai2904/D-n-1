<?php
function insert_danhmuc($tenloai)
{
    $sql = "INSERT INTO `categorys`(`name`) VALUES ('$tenloai')";
    pdo_execute($sql);
}
function loadAlldm()
{
    $sql = "SELECT * FROM categorys order by categorys_id";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadAlldmhome()
{
    $sql = "SELECT * FROM categorys where status = '0' order by categorys_id";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function delete_danhmuc($id,$status)
{
    $sql = "UPDATE categorys 
    SET status = '$status'
    WHERE categorys_id = '$id';";
    pdo_execute($sql);
}
function loadOnedm($id)
{
    $id = $_GET['categorys_id'];
    $sql = "SELECT * FROM categorys WHERE categorys_id = '$id';";
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($tenloai, $id)
{
    $sql = "UPDATE `categorys` SET `name`='$tenloai' where categorys_id='$id';";
    pdo_execute($sql);
}
?>