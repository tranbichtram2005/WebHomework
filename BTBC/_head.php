<?php
function renderHead($title = 'CellphoneS') {
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title><?php echo $title; ?></title>
    </head>
    <body>
    <div id="container">
        <div id="banner" style="background: #d70018; height: 64px; border-radius: 0 0 12px 12px; display: flex; align-items: center; justify-content: space-between; padding: 0 20px; box-shadow: 0 2px 10px rgba(215, 0, 24, 0.2);">
            <a href="./index.php" style="color: white; font-size: 22px; font-weight: bold; text-decoration: none; width: 200px;">📱 cellphones</a>
            
            <form method="get" action="index.php" style="flex-grow: 1; max-width: 500px; display: flex; margin: 0;">
                <input type="text" name="keyword" placeholder="Bạn cần tìm gì hôm nay?" style="width: 100%; padding: 10px 15px; border-radius: 8px 0 0 8px; border: none; outline: none; font-size: 14px;">
                <button type="submit" style="padding: 10px 20px; border-radius: 0 8px 8px 0; border: none; background: #f3f4f6; color: #333; cursor: pointer; font-weight: bold;">🔍 Tìm</button>
            </form>

            <div style="width: 200px;"></div> </div>

        <div id="menu" style="background: white; padding: 12px 15px; border-radius: 12px; margin: 15px 0; box-shadow: 0 2px 5px rgba(0,0,0,0.05); display: flex; gap: 10px; flex-wrap: wrap;">
            <?php include_once("task.php"); ?>
        </div>

        <div id="main-layout" style="display: flex; gap: 20px; margin-bottom: 30px;">
    <?php
}

function renderSidebar() {
    global $link;
    ?>
    <div id="lmenu" style="width: 250px; flex-shrink: 0;">
        <div class="sidebar-box" style="background: white; padding: 15px; border-radius: 12px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); margin-bottom: 20px;">
            <div style="font-weight: bold; color: #d70018; text-transform: uppercase; margin-bottom: 12px;">📁 Danh Mục</div>
            <ul style="list-style: none; padding: 0;">
                <li><a href="./index.php" style="text-decoration: none; color: #333; display: block; padding: 8px 0; border-bottom: 1px solid #f3f4f6;">» Tất cả sản phẩm</a></li>
                <?php
                if($link) {
                    $result = mysqli_query($link, "select * from tbl_danhmuc");
                    if($result) {
                        while($rows = mysqli_fetch_assoc($result)) {
                            echo "<li><a href='./index.php?dm=".$rows['id']."' style='text-decoration: none; color: #333; display: block; padding: 8px 0; border-bottom: 1px solid #f3f4f6;'>» ".$rows['ten']."</a></li>";
                        }
                    }
                }
                ?>
            </ul>
        </div>
        
        <div style="background: #fff5f5; border: 1px dashed #d70018; border-radius: 12px; padding: 15px;">
            <div style="font-weight: bold; color: #d70018; margin-bottom: 10px;">🛒 Giỏ hàng của bạn</div>
            <?php
            $count = isset($_SESSION['giohang']) ? count($_SESSION['giohang']) : 0;
            ?>
            <p style="margin-bottom: 10px; font-size: 14px;">Đã chọn: <strong style="color: #d70018; font-size: 16px;"><?php echo $count; ?></strong> SP</p>
            <a href="xemhang.php" style="display: block; text-align: center; background: #d70018; color: white; text-decoration: none; padding: 10px; border-radius: 8px; font-weight: bold;">Vào giỏ hàng ➔</a>
        </div>
    </div>
    
    <div id="content" style="flex-grow: 1; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); min-height: 500px;">
    <?php
}

function renderFoot() {
    ?>
    </div> </div> <div id="footer" style="text-align: center; padding: 20px 0; color: #888; border-top: 1px solid #eee; margin-top: 20px;">
        <p>© 2026 CellphoneS Website Thực Hành</p>
    </div>
    </div> </body>
    </html>
    <?php
}
?>