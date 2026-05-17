<?php
session_start();
require_once("db_module.php");

$link = NULL;
taoKetNoi($link);

$page_title = "Chỉnh sửa danh mục";
include_once("layout_top.php");
?>

<div class="section-title">✏️ Cập nhật danh mục hàng hóa</div>

<?php
if (!isset($_GET['dm'])) {
    $result = chayTruyVanTraVeDL($link, "select * from tbl_danhmuc");
    echo "<table class='cps-table'>
            <thead><tr><th>Tên danh mục hiện tại</th><th>Thao tác</th></tr></thead><tbody>";
    while ($rows = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td style='font-weight:600;'>" . htmlspecialchars($rows['ten']) . "</td>
                <td><a href='doidm.php?dm=" . $rows['id'] . "' class='btn-action btn-edit'>Sửa tên</a></td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    $dm_id = (int)$_GET['dm'];
    $result = chayTruyVanTraVeDL($link, "select * from tbl_danhmuc where id=$dm_id");
    $row = mysqli_fetch_row($result);
    ?>
    <form method="post" action="xulydoidm.php">
        <input type="hidden" value="<?php echo $row[0]; ?>" name="iddm">
        <div class="form-group">
            <label>Tên danh mục mới:</label>
            <input type="text" value="<?php echo htmlspecialchars($row[1]); ?>" name="tendm" required>
        </div>
        <input type="submit" value="Cập nhật danh mục" class="btn-submit">
    </form>
    <?php
}

include_once("layout_bottom.php");
giaiPhongBoNho($link, NULL);
?>