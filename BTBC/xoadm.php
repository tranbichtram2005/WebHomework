<?php
require_once("db_module.php");
require_once("_head.php");
$link = NULL; taoKetNoi($link);
renderHead('Xóa danh mục');
include_once("task.php");
renderSidebar();
?>
<div class="section-title">Xóa danh mục</div>
<div class="list-action">
<?php
$result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_danhmuc");
while ($rows = mysqli_fetch_assoc($result)): ?>
    <div class="list-item">
        <span><i class="bi bi-folder me-2" style="color:var(--text-muted)"></i><?= htmlspecialchars($rows['ten']) ?></span>
        <a href="./xulyxoadm.php?dm=<?= $rows['id'] ?>" class="btn-del"
           onclick="return confirm('Xóa danh mục «<?= htmlspecialchars($rows['ten']) ?>»?\nCác sản phẩm thuộc DM này cũng bị ảnh hưởng.')">
           <i class="bi bi-trash3"></i> Xóa
        </a>
    </div>
<?php endwhile; ?>
</div>
<?php renderFoot(); giaiPhongBoNho($link, $result); ?>