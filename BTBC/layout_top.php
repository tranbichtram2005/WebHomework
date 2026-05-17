<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title><?php echo isset($page_title) ? $page_title : 'CellphoneS - Hệ thống bán lẻ'; ?></title>
</head>
<body>
<div id="container">
    <div id="banner">
        <a href="./index.php" class="logo-text">📱 CellphoneS</a>
        
        <form method="get" action="index.php" class="search-form">
            <input type="text" name="keyword" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" placeholder="Bạn cần tìm gì hôm nay?">
            <button type="submit">🔍 Tìm</button>
        </form>
    </div>

    <div class="admin-menu">
        <span style="font-weight: 600; padding: 8px 0;">CellphoneS</span>
        <?php include_once("task.php"); ?>
    </div>

    <div id="main-layout">
        <div id="lmenu">
            <div class="sidebar-box">
                <div class="box-title">📁 Danh mục sản phẩm</div>
                <ul>
                    <li><a href="index.php" class="<?php echo !isset($_GET['dm']) ? 'active' : ''; ?>">» Tất cả sản phẩm</a></li>
                    <?php
                    $res_dm = chayTruyVanTraVeDL($link, "select * from tbl_danhmuc");
                    if($res_dm) {
                        while($r_dm = mysqli_fetch_assoc($res_dm)) {
                            $active = (isset($_GET['dm']) && $_GET['dm'] == $r_dm['id']) ? "class='active'" : "";
                            echo "<li><a href='index.php?dm=".$r_dm['id']."' $active>» ".$r_dm['ten']."</a></li>";
                        }
                    }
                    ?>
                </ul>
            </div>
            
            <div class="sidebar-box" style="border: 2px solid var(--cps-red);">
                <div class="box-title" style="color: var(--cps-red); margin-bottom: 5px;">🛒 Giỏ Hàng</div>
                <?php
                // Chỉ đếm số lượng sản phẩm trong mảng Session, KHÔNG gọi hàm tính tiền nữa
                $count = isset($_SESSION['giohang']) ? count($_SESSION['giohang']) : 0;
                ?>
                <div style="font-size: 13px; margin-bottom: 15px; color: #666;">
                    Bạn đang có <strong><?php echo $count; ?></strong> sản phẩm trong giỏ.<br>
                    <div style="margin-top: 5px; font-size: 11px; color: #888; font-style: italic;">(Vào giỏ hàng để chọn món và thanh toán)</div>
                </div>
                <a href="xemhang.php" class="btn-submit" style="display:block; text-align:center; text-decoration:none;">Xem Giỏ Hàng</a>
            </div>
        </div>
        <div id="content">