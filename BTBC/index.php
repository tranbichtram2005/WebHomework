<?php
session_start();
require_once("db_module.php");
require_once("_head.php");
$link = NULL; taoKetNoi($link);
renderHead('CellphoneS - Trang chủ');
include_once("task.php");
renderSidebar();
?>
<div class="section-title">Sản phẩm</div>
<?php
include_once("content.php");
renderFoot();
giaiPhongBoNho($link, $result);
?>