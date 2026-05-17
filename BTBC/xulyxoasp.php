<?php
    require_once("db_module.php");
    if(isset($_GET['sp'])){
        $link = NULL;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "delete from tbl_sanpham where id=".$_GET['sp']);
        giaiPhongBoNho($link, $result);
    }
    header("Location: xoasp.php");
?>
