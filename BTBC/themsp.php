<?php
session_start();
require_once("db_module.php");
require_once("_head.php");
$link = NULL; taoKetNoi($link);
renderHead('Thêm sản phẩm');
include_once("task.php");
renderSidebar();
?>
<div class="section-title">Thêm sản phẩm mới</div>
<form method="post" action="xulythemsp.php">
    <h3>Thêm sản phẩm</h3>
    <label>Danh mục</label>
    <select name="iddm">
        <?php
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_danhmuc");
        while ($rows = mysqli_fetch_assoc($result))
            echo "<option value='{$rows['id']}'>" . htmlspecialchars($rows['ten']) . "</option>";
        ?>
    </select>
    <label>Tên sản phẩm</label>
    <input type="text" name="tensp" placeholder="Nhập tên sản phẩm..."/>
    <label>Mô tả</label>
    <textarea name="mota" placeholder="Nhập mô tả..." rows="4"></textarea>
    <label>Giá (VNĐ)</label>
    <input type="number" name="gia" placeholder="0"/>
    <input type="submit" value="➕ Thêm sản phẩm"/>
</form>
<?php renderFoot(); giaiPhongBoNho($link, $result); ?>