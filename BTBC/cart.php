<?php
include_once("cart_module.php");
$giohang = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : array();
$soluong = count($giohang);
$tongtien = isset($_SESSION['giohang']) ? tinhtien() : "0";
?>
<div class="cart-box">
    <div class="cart-title"><i class="bi bi-cart3"></i> Giỏ hàng</div>
    <div class="cart-info">
        <span class="cart-count"><?= $soluong ?></span> sản phẩm
    </div>
    <div class="cart-total">
        <span class="label">Tổng tiền:</span>
        <span class="amount"><?= $tongtien ?>đ</span>
    </div>
    <a href="./xemhang.php" class="btn-cart">
        <i class="bi bi-bag-check"></i> Xem Giỏ Hàng
    </a>
</div>