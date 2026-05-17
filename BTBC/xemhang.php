<?php
session_start();
require_once("db_module.php");
require_once("cart_module.php");

$link = NULL; taoKetNoi($link);
$page_title = "Giỏ hàng của bạn - CellphoneS";
include_once("layout_top.php");
?>

<div class="section-title" style="display:flex; justify-content:space-between; align-items:center;">
    <span>🛒 Giỏ hàng của bạn</span>
    <?php if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0): ?>
    <form method="post" action="xulygiohang.php" style="margin:0;">
        <input type="submit" name="action" value="Làm trống giỏ hàng" class="btn-action btn-delete" onclick="return confirm('Xóa toàn bộ giỏ hàng?');">
    </form>
    <?php endif; ?>
</div>

<?php
if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
    ?>
    <form method="post" action="thanhtoan.php">
        <table class="cps-table">
            <thead>
                <tr>
                    <th style="width: 50px; text-align: center;">
                        <input type="checkbox" id="checkAll" onclick="toggleCheckboxes(this)" style="cursor: pointer; width:16px; height: 16px;">
                    </th>
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th style="width:160px; text-align:center;">Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['giohang'] as $key => $value) { 
                    $tong_item = $value['soluong'] * $value['gia']; ?>
                    <tr>
                        <td style="text-align: center;">
                            <input type="checkbox" name="sp_chon[]" value="<?php echo $key; ?>" 
                                   class="sp-checkbox" 
                                   data-price="<?php echo $value['gia']; ?>" 
                                   data-quantity="<?php echo $value['soluong']; ?>" 
                                   onchange="tinhTongTien()" 
                                   style="width: 16px; height: 16px; cursor: pointer;">
                        </td>
                        <td style="font-weight:600; color:var(--cps-dark);"><?php echo htmlspecialchars($value['ten']); ?></td>
                        <td><?php echo number_format($value['gia'], 0, ',', '.'); ?> đ</td>
                        <td>
                            <div style="display:flex; gap:5px; margin:0; justify-content:center;">
                                <a href="xulygiohang.php?action=giam&id=<?php echo $key; ?>" class="btn-action" style="background:#e5e7eb; color:#333; text-decoration:none; padding: 6px 12px;">-</a>
                                <input type="text" value="<?php echo $value['soluong']; ?>" readonly style="margin:0; padding:6px; width:50px; text-align:center; border-radius:6px; border:1px solid var(--border); outline:none;">
                                <a href="xulygiohang.php?action=tang&id=<?php echo $key; ?>" class="btn-action" style="background:#e5e7eb; color:#333; text-decoration:none; padding: 6px 12px;">+</a>
                            </div>
                        </td>
                        <td style="color:var(--cps-red); font-weight:700;"><?php echo number_format($tong_item, 0, ',', '.'); ?> đ</td>
                        <td>
                            <a href="xulygiohang.php?action=xoa&id=<?php echo $key; ?>" class="btn-action btn-delete" style="text-decoration:none;" onclick="return confirm('Xóa sản phẩm này?');">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <div style="background: var(--bg-gray); padding: 20px; border-radius: 10px; margin-top: 20px; text-align: right;">
            <span style="font-size: 16px;">Tổng thanh toán (<span id="countSP">0</span> sản phẩm):</span>
            <span id="tongTienHienThi" style="color:var(--cps-red); font-size: 24px; font-weight: 700; margin-left: 15px;">0 đ</span>
            <br><br>
            <button type="submit" class="btn-submit" style="font-size: 16px; padding: 15px 30px;" onclick="return kiemTraChonSP()">Tiến hành Đặt Hàng</button>
        </div>
    </form>

    <script>
        function tinhTongTien() {
            let total = 0;
            let count = 0;
            let checkboxes = document.querySelectorAll('.sp-checkbox:checked');
            
            checkboxes.forEach(function(cb) {
                let price = parseFloat(cb.getAttribute('data-price'));
                let qty = parseFloat(cb.getAttribute('data-quantity'));
                total += (price * qty);
                count += 1;
            });

            let formattedTotal = new Intl.NumberFormat('vi-VN').format(total) + ' đ';
            document.getElementById('tongTienHienThi').innerText = formattedTotal;
            document.getElementById('countSP').innerText = count;

            let allCheckboxes = document.querySelectorAll('.sp-checkbox');
            document.getElementById('checkAll').checked = (checkboxes.length === allCheckboxes.length && allCheckboxes.length > 0);
        }

        function toggleCheckboxes(source) {
            let checkboxes = document.querySelectorAll('.sp-checkbox');
            for(let i=0; i<checkboxes.length; i++) {
                checkboxes[i].checked = source.checked;
            }
            tinhTongTien();
        }

        function kiemTraChonSP() {
            let checkboxes = document.querySelectorAll('.sp-checkbox:checked');
            if(checkboxes.length === 0) {
                alert("Vui lòng tick chọn ít nhất 1 sản phẩm để thanh toán!");
                return false;
            }
            return true;
        }
    </script>
    <?php
} else {
    echo "<div style='text-align:center; padding:50px 0; background:#f9fafb; border-radius:15px;'><h3 style='color:#888; margin-bottom:15px;'>Giỏ hàng đang trống</h3><a href='index.php' class='btn-submit' style='text-decoration:none;'>Tiếp tục mua sắm</a></div>";
}
include_once("layout_bottom.php");
giaiPhongBoNho($link, NULL);
?>