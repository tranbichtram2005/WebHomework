<?php
session_start();
require_once("db_module.php");
$link = NULL; taoKetNoi($link);
$page_title = 'Thêm danh mục';
include_once("layout_top.php");
?>
<div class="section-title">✨ Thêm danh mục mới</div>
<form method="post" action="xulythemdm.php" style="max-width: 600px; background: #f9fafb; padding: 20px; border-radius: 15px; border: 1px solid var(--border);">
    <label>Tên danh mục</label>
    <input type="text" name="tendm" placeholder="Ví dụ: Điện thoại, Laptop..." required/>
    <input type="submit" value="Thêm danh mục" class="btn-submit"/>
</form>
<?php include_once("layout_bottom.php"); giaiPhongBoNho($link, $result ?? null); ?>