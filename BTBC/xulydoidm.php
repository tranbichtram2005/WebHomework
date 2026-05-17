<?php
    require_once("db_module.php");
    if(isset($_POST['tendm']) && isset($_POST['iddm'])){
        $link = NULL;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "update tbl_danhmuc set ten = '".$_POST['tendm']."' where id=".$_POST['iddm']);
        giaiPhongBoNho($link, $result);
    }
    header("Location: doidm.php");
?>
