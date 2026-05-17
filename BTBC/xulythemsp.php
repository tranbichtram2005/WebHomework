<?php
    require_once("db_module.php");
    if(isset($_POST['tensp']) && isset($_POST['iddm']) && isset($_POST['mota']) && isset($_POST['gia'])){
        $link = NULL;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "insert into tbl_sanpham(ten, mota, gia, id_dm) values ('".$_POST['tensp']."', '".$_POST['mota']."', ".$_POST['gia'].", ".$_POST['iddm'].")");
        giaiPhongBoNho($link, $result);
    }
    header("Location: themsp.php");
?>