<?php function loadall_thongke()
    {
    $sql = "select categorys_id as madm,categorys.name as tendm, count(product_id) as countsp, min(products.price) as minprice, max(products.price) as maxprice, avg(products.price) as avgprice ";
    $sql .= " from products left join categorys on categorys.categorys_id=products.category_id";
    $sql .= " group by categorys.categorys_id order by categorys.categorys_id desc";
    $listtk = pdo_query($sql);
    return $listtk;
    }
    ?>