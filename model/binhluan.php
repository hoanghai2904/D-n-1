<?php
// function load_cmt($product_id)
// {
//     $sql = "SELECT comments.noidung,comments.ngaybinhluan, users.user_id FROM comments
//     JOIN users on comments.id_user= users.users_id
//     JOIN products on comments.id_pro= products.id
//     WHERE products.id=$product_id";
//     $result = pdo_query($sql);
//     return $result;
// }


function load_cmt($product_id)
{
    $sql = "SELECT comments.noidung, comments.ngaybinhluan, users.fullname 
            FROM comments
            JOIN users ON comments.id_user = users.users_id
            JOIN products ON comments.id_pro = products.product_id
            WHERE products.product_id = $product_id";
    $result = pdo_query($sql);
    return $result;
}


function insert_cmt($id_pro, $id_user, $noidung, $date)
{
    $sql="insert into comments(noidung,id_user,id_pro,ngaybinhluan) values('$noidung','$id_user','$id_pro','$date')";
    pdo_execute($sql);
}

function load_all_cmt($id_pro)
{
    $sql = "SELECT * FROM comments";
    if ($id_pro > 0) {
        $sql .= " AND id_pro='" . $id_pro . "'";
    }
    $sql .= " ORDER BY id desc";
    $result = pdo_query($sql);
    return $result;
}
function delete_cmt($id)
{
    $sql = "delete from comments where id=" . $id;
    $result = pdo_execute($sql);
}
?>
