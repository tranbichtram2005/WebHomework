<?php
session_start();
require_once("db_module.php");

$link = NULL;
taoKetNoi($link);

$page_title = "Chỉnh sửa sản phẩm";
include_once("layout_top.php");
?>

<div class="section-title">🛠️ Quản lý & Chỉnh sửa sản phẩm</div>

<?php
if (!isset($_GET['sp'])) {
    // Nếu chưa chọn thiết bị cụ thể, đổ bảng danh sách
    $result = chayTruyVanTraVeDL($link, "select * from tbl_sanpham order by id desc");
    echo "<table class='cps-table'>
            <thead><tr><th>Tên thiết bị</th><th>Giá</th><th>Hành động</th></tr></thead><tbody>";
    while ($rows = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td style='font-weight:500;'>" . htmlspecialchars($rows['ten']) . "</td>
                <td style='color:var(--cps-red); font-weight:600;'>" . number_format($rows['gia'], 0, ',', '.') . " đ</td>
                <td><a href='doisp.php?sp=" . $rows['id'] . "' class='btn-action btn-edit'>Sửa thông tin</a></td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    // Nếu đã chọn, đổ dữ liệu vào Form
    $sp_id = (int)$_GET['sp'];
    $result = chayTruyVanTraVeDL($link, "select * from tbl_sanpham where id=$sp_id");
    $row = mysqli_fetch_row($result);
    ?>
    <form method="post" action="xulydoisp.php">
        <input type="hidden" value="<?php echo $row[0]; ?>" name="idsp">
        
        <div class="form-group">
            <label>Phân mục nhóm sản phẩm:</label>
            <select name="iddm">
                <?php
                $res_dm = chayTruyVanTraVeDL($link, "select * from tbl_danhmuc");
                while ($r_dm = mysqli_fetch_assoc($res_dm)) {
                    $select = ($r_dm['id'] == $row[4]) ? "selected" : "";
                    echo "<option $select value='" . $r_dm['id'] . "'>" . htmlspecialchars($r_dm['ten']) . "</option>";
                }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Tên gọi sản phẩm:</label>
            <input type="text" name="tensp" value="<?php echo htmlspecialchars($row[1]); ?>" required>
        </div>
        
        <div class="form-group">
            <label>Mô tả chi tiết tính năng:</label>
            <textarea name="mota" rows="5" required><?php echo htmlspecialchars($row[2]); ?></textarea>
        </div>
        
        <div class="form-group">
            <label>Giá bán niêm yết (đ):</label>
            <input type="number" name="gia" value="<?php echo $row[3]; ?>" required>
        </div>
        
        <input type="submit" value="Lưu thay đổi sản phẩm" class="btn-submit">
    </form>
    <?php
}

include_once("layout_bottom.php");
giaiPhongBoNho($link, NULL);
?>