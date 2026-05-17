<?php
session_start();
require_once("db_module.php");

$link = NULL;
taoKetNoi($link);

$page_title = "Chi tiết sản phẩm";
include_once("layout_top.php");

if (isset($_GET['sp'])) {
    $sp_id = (int)$_GET['sp'];
    $result = chayTruyVanTraVeDL($link, "select * from tbl_sanpham where id = $sp_id");
    
    if ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div style="display:flex; gap:40px; margin-top:10px;">
            <div style="width:40%; background:#f9fafb; border-radius:12px; height:300px; display:flex; align-items:center; justify-content:center; font-size:100px; border:1px solid var(--border-color);">
                📱
            </div>
            <div style="width:60%;">
                <h2 style="font-size:24px; margin-bottom:15px; color:var(--cps-dark);"><?php echo htmlspecialchars($row['ten']); ?></h2>
                <div style="background:#fff5f5; padding:15px; border-radius:8px; margin-bottom:20px;">
                    <span style="font-size:26px; font-weight:700; color:var(--cps-red);"><?php echo number_format($row['gia'], 0, ',', '.'); ?> đ</span>
                </div>
                <div style="margin-bottom:25px;">
                    <h4 style="margin-bottom:8px;">Mô tả sản phẩm:</h4>
                    <p style="color:#555; line-height:1.6;"><?php echo nl2br(htmlspecialchars($row['mota'])); ?></p>
                </div>
                
                <form method="post" action="xulygiohang.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="ten" value="<?php echo htmlspecialchars($row['ten']); ?>">
                    <input type="hidden" name="gia" value="<?php echo $row['gia']; ?>">
                    <input type="submit" name="action" value="Thêm vào Giỏ" class="btn-submit" style="width:100%; font-size:16px; padding:14px;">
                </form>
            </div>
        </div>
        <?php
    }
}
include_once("layout_bottom.php");
giaiPhongBoNho($link, NULL);
?>