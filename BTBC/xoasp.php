<?php
require_once("db_module.php");
require_once("_head.php");
$link = NULL; taoKetNoi($link);
renderHead('Xóa sản phẩm');
include_once("task.php");
renderSidebar();
?>
<div class="section-title">Xóa sản phẩm</div>
<div class="list-action">
<?php
$result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_sanpham");
while ($rows = mysqli_fetch_assoc($result)): ?>
    <div class="list-item">
        <div>
            <div style="font-weight:700;font-size:14px"><?= htmlspecialchars($rows['ten']) ?></div>
            <div style="font-size:12.5px;color:var(--text-muted)"><?= number_format($rows['gia'],0,',','.') ?>đ</div>
        </div>
        <a href="./xulyxoasp.php?sp=<?= $rows['id'] ?>" class="btn-del"
           onclick="return confirm('Xóa sản phẩm «<?= htmlspecialchars($rows['ten']) ?>»?')">
           <i class="bi bi-trash3"></i> Xóa
        </a>
    </div>
<?php endwhile; ?>
</div>
<?php renderFoot(); giaiPhongBoNho($link, $result); ?>