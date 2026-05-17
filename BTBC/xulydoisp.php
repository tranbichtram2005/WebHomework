<?php
    require_once("db_module.php");
    if(isset($_POST['tensp']) && isset($_POST['iddm']) && isset($_POST['mota'])&& isset($_POST['idsp']) && isset($_POST['gia'])){
        $link = NULL;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "update tbl_sanpham set     ten = '".$_POST['tensp']."',
                                                                                mota = '".$_POST['mota']."',
                                                                                gia = ".$_POST['gia'].",
                                                                                id_dm = ".$_POST['iddm']."
                                                                                where id=".$_POST['idsp']);
        giaiPhongBoNho($link, $result);
    }
    header("Location: doisp.php");
?>
