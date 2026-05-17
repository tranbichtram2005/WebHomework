<?php
session_start();
require_once("db_module.php");
$link = NULL; taoKetNoi($link);
$page_title = 'Xóa sản phẩm';
include_once("layout_top.php");
?>
<div class="section-title">🗑️ Xóa sản phẩm</div>
<div class="list-action">
<?php
$result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_sanpham");
while ($rows = mysqli_fetch_assoc($result)): ?>
    <div style="display:flex; justify-content:space-between; align-items:center; padding: 15px; border-bottom: 1px solid var(--border); background: #f9fafb; margin-bottom: 10px; border-radius: 8px;">
        <div>
            <div style="font-weight:700;font-size:15px;color:var(--cps-dark)"><?= htmlspecialchars($rows['ten']) ?></div>
            <div style="font-size:14px;color:var(--cps-red); font-weight:600;"><?= number_format($rows['gia'],0,',','.') ?>đ</div>
        </div>
        <a href="./xulyxoasp.php?sp=<?= $rows['id'] ?>" class="btn-action btn-delete"
           onclick="return confirm('Xóa sản phẩm «<?= htmlspecialchars($rows['ten']) ?>»?')">
           Xóa
        </a>
    </div>
<?php endwhile; ?>
</div>
<?php include_once("layout_bottom.php"); giaiPhongBoNho($link, $result); ?>