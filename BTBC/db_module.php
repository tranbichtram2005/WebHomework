<?php
define("SO_SP_TREN_TRANG", 4);

function taoKetNoi(&$link){
    $link = mysqli_connect("localhost", "root", "", "db_shop");
    mysqli_set_charset($link, "utf8");
}

function chayTruyVanTraVeDL($link, $sql){
    return mysqli_query($link, $sql);
}

function chayTruyVanKhongTraVeDL($link, $sql){
    return mysqli_query($link, $sql);
}

function giaiPhongBoNho($link, $result){
    if(isset($result) && $result !== true && $result !== false)
        mysqli_free_result($result);
    mysqli_close($link);
}
?>