<?php
session_start();
require_once("db_module.php");
require_once("cart_module.php");

$link = NULL;
taoKetNoi($link);

$page_title = "Giỏ hàng của bạn";
include_once("layout_top.php");
?>

<div class="section-title">🛒 Chi tiết giỏ hàng công nghệ</div>

<?php
if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
    ?>
    <table class="cps-table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá tiền</th>
                <th style="width:150px;">Số lượng</th>
                <th>Tổng cộng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($_SESSION['giohang'] as $key => $value) {
                $tong_item = $value['soluong'] * $value['gia'];
                ?>
                <tr>
                    <td style="font-weight:600;"><?php echo htmlspecialchars($value['ten']); ?></td>
                    <td><?php echo number_format($value['gia'], 0, ',', '.'); ?> đ</td>
                    <td>
                        <form method="post" action="xulygiohang.php" style="display:flex; gap:4px; margin:0;">
                            <input type="hidden" name="id" value="<?php echo $key; ?>">
                            <input type="number" name="soluong" value="<?php echo $value['soluong']; ?>" min="1" style="margin:0; padding:4px 8px; text-align:center;">
                            <input type="submit" name="action" value="Cập nhật" class="btn-action btn-edit" style="border:none; cursor:pointer;">
                        </form>
                    </td>
                    <td style="color:var(--cps-red); font-weight:600;"><?php echo number_format($tong_item, 0, ',', '.'); ?> đ</td>
                    <td>
                        <form method="post" action="xulygiohang.php" style="margin:0;">
                            <input type="hidden" name="id" value="<?php echo $key; ?>">
                            <input type="submit" name="action" value="Xóa hàng" class="btn-action btn-delete" style="border:none; cursor:pointer;">
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr style="font-size:16px; font-weight:700;">
                <td colspan="3" style="text-align:right;">Tổng thanh toán:</td>
                <td colspan="2" style="color:var(--cps-red); font-size:20px;"><?php echo tinhtien(); ?> đ</td>
            </tr>
        </tbody>
    </table>
    <?php
} else {
    echo "<div style='text-align:center; padding:4px 0; color:#71717a;'>Giỏ hàng đang trống rỗng. Hãy chọn sản phẩm mua ngay!</div>";
}

include_once("layout_bottom.php");
giaiPhongBoNho($link, NULL);
?>