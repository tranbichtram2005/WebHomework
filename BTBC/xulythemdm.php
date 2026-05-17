<?php
    require_once("db_module.php");
    if(isset($_POST['tendm'])){
        $link = NULL;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "insert into tbl_danhmuc(ten) values ('".$_POST['tendm']."')");
        giaiPhongBoNho($link, $result);
    }
    header("Location: themdm.php");
?>