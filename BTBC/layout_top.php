<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title><?php echo isset($page_title) ? $page_title : 'CellphoneS'; ?></title>
</head>
<body>
<div id="container">
    <div id="banner">
        <a href="./index.php" class="logo-text">📱 cellphones</a>
        
        <form method="get" action="index.php" style="display:flex; gap:6px; width:450px; margin:0;">
            <input type="text" name="keyword" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" placeholder="Nhập tên sản phẩm cần tìm..." style="margin:0; padding:8px 14px; background:white;">
            <input type="submit" value="Tìm" class="btn-submit" style="padding:0 18px; background:#363636;">
        </form>
    </div>

    <div id="menu">
        <div class="nav-links">
            <?php include_once("task.php"); ?>
        </div>
    </div>

    <div id="main-layout">
        <div id="lmenu">
            <div class="sidebar-box">
                <div class="box-title">📁 Danh Mục</div>
                <ul>
                    <li><a href="index.php" class="<?php echo !isset($_GET['dm']) ? 'active' : ''; ?>">Tất cả sản phẩm</a></li>
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
            
            <div class="sidebar-box" style="background: #fff5f5; border: 1px dashed var(--cps-red);">
                <div class="box-title" style="color: var(--cps-red);">🛒 Giỏ Hàng</div>
                <?php
                include_once("cart_module.php");
                $count = isset($_SESSION['giohang']) ? count($_SESSION['giohang']) : 0;
                ?>
                <p style="margin-bottom: 8px;">Sản phẩm đã chọn: <strong><?php echo $count; ?></strong></p>
                <p style="margin-bottom: 12px;">Tổng tiền: <strong style="color:var(--cps-red);"><?php echo $count > 0 ? tinhtien().' đ' : '0 đ'; ?></strong></p>
                <a href="xemhang.php" class="nav-item" style="display:block; text-align:center; background:var(--cps-red); color:white;">Vào giỏ hàng ➔</a>
            </div>
        </div>

        <div id="content">