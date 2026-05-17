<?php
session_start();
require_once("db_module.php");
require_once("_head.php");
$link = NULL; taoKetNoi($link);
renderHead('Thêm danh mục');
include_once("task.php");
renderSidebar();
?>
<div class="section-title">Thêm danh mục mới</div>
<form method="post" action="xulythemdm.php">
    <h3>Thêm danh mục</h3>
    <label>Tên danh mục</label>
    <input type="text" name="tendm" placeholder="Nhập tên danh mục..."/>
    <input type="submit" value="➕ Thêm danh mục"/>
</form>
<?php renderFoot(); giaiPhongBoNho($link, $result); ?>