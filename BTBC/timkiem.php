<?php
session_start();
require_once("db_module.php");
require_once("_head.php");
$link = NULL; taoKetNoi($link);
renderHead('Tìm kiếm - CellphoneS');
include_once("task.php");
renderSidebar();
?>
<div class="section-title">Kết quả tìm kiếm</div>
<?php
include_once("content_tk.php");
renderFoot();
giaiPhongBoNho($link, $result);
?>