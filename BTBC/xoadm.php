<?php
session_start();
require_once("db_module.php");
$link = NULL; taoKetNoi($link);
$page_title = 'Xóa danh mục';
include_once("layout_top.php");
?>
<div class="section-title">🗑️ Xóa danh mục</div>
<div class="list-action" style="max-width: 600px;">
<?php
$result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_danhmuc");
while ($rows = mysqli_fetch_assoc($result)): ?>
    <div style="display:flex; justify-content:space-between; align-items:center; padding: 15px; border-bottom: 1px solid var(--border); background: #f9fafb; margin-bottom: 10px; border-radius: 8px;">
        <span style="font-weight: 600;">📁 <?= htmlspecialchars($rows['ten']) ?></span>
        <a href="./xulyxoadm.php?dm=<?= $rows['id'] ?>" class="btn-action btn-delete"
           onclick="return confirm('Xóa danh mục «<?= htmlspecialchars($rows['ten']) ?>»?\nCác sản phẩm thuộc DM này cũng bị ảnh hưởng.')">
           Xóa
        </a>
    </div>
<?php endwhile; ?>
</div>
<?php include_once("layout_bottom.php"); giaiPhongBoNho($link, $result); ?>