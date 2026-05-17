<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" />
<title>Thêm Sản Phẩm</title>
</head>
<body>
<?php
    session_start();
    require_once("db_module.php");
    $link = NULL;
    taoKetNoi($link);
?>
<div id="container">
    <div id="banner"></div>
    <div id="menu"><?php include_once("task.php");?></div>
    <div id="lmenu">
        <div>
            <?php include_once("menu.php"); ?>
        </div>
        <div>
            <?php include_once("cart.php");?>
        </div>
    </div>
    <div id="content">
        <form method="post" action="xulythemsp.php">
            <label>Chọn danh mục:</label>
            <select name="iddm">
                <?php
                    $result = chayTruyVanTraVeDL($link, "select * from tbl_danhmuc");
                    while($rows = mysqli_fetch_assoc($result)){
                        echo "<option value='".$rows['id']."'>".$rows['ten']."</option>";
                    }
                ?>
            </select>
            <label>Tên sản phẩm:</label>
            <input type="text" name="tensp" placeholder="Nhập tên sản phẩm" />
            <label>Mô tả:</label>
            <textarea name="mota" placeholder="Nhập mô tả"></textarea>
            <label>Giá:</label>
            <input type="number" name="gia" placeholder="Nhập giá" />
            <input type="submit" value="Thêm SP" />
        </form>
    </div>
</div>
<?php
    giaiPhongBoNho($link, $result);
?>
</body>
</html>