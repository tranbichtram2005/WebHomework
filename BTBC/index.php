<?php
session_start();
require_once("db_module.php");

$link = NULL; 
taoKetNoi($link);

// Chỗ này mình đổi thành gọi layout_top.php thay vì _head.php
$page_title = "CellphoneS - Điện thoại, máy tính chính hãng";
include_once("layout_top.php"); 
?>

<div class="section-title">
    <?php 
    if(isset($_GET['keyword'])) echo "Kết quả tìm kiếm cho: '" . htmlspecialchars($_GET['keyword']) . "'";
    else echo "Danh sách thiết bị công nghệ";
    ?>
</div>

<?php 
include_once("content.php"); 

// Chỗ này gọi layout_bottom.php thay vì hàm renderFoot()
include_once("layout_bottom.php");
giaiPhongBoNho($link, NULL);
?>