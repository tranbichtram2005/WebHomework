<?php
$result_menu = chayTruyVanTraVeDL($link, "select * from tbl_danhmuc");
while($rows = mysqli_fetch_assoc($result_menu)){
    echo "<li><a href='./?dm=".$rows['id']."'>".$rows['ten']."</a></li>";
}
?>