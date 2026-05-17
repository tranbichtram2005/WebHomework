<?php
session_start();
require_once("db_module.php");
$link = NULL; taoKetNoi($link);
$page_title = "Thêm sản phẩm mới";
include_once("layout_top.php");
?>
<div class="section-title">➕ Thêm sản phẩm mới</div>
<form method="post" action="xulythemsp.php" style="max-width: 600px; background: #f9fafb; padding: 20px; border-radius: 15px; border: 1px solid var(--border);">
    <label>Danh mục</label>
    <select name="iddm" required>
        <?php
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_danhmuc");
        while ($rows = mysqli_fetch_assoc($result))
            echo "<option value='{$rows['id']}'>" . htmlspecialchars($rows['ten']) . "</option>";
        ?>
    </select>
    <label>Tên sản phẩm</label>
    <input type="text" name="tensp" placeholder="Ví dụ: iPhone 15 Pro Max" required/>
    <label>Mô tả chi tiết</label>
    <textarea name="mota" placeholder="Cấu hình, tính năng nổi bật..." rows="4" required></textarea>
    <label>Giá bán (VNĐ)</label>
    <input type="number" name="gia" placeholder="Ví dụ: 29990000" required/>
    <input type="submit" value="Lưu Sản Phẩm" class="btn-submit"/>
</form>
<?php include_once("layout_bottom.php"); giaiPhongBoNho($link, $result ?? null); ?>