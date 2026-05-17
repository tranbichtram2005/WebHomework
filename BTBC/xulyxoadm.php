<?php
    require_once("db_module.php");
    if(isset($_GET['dm'])){
        $link = NULL;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "delete from tbl_danhmuc where id=".$_GET['dm']);
        giaiPhongBoNho($link, $result);
    }
    header("Location: xoadm.php");
?>
