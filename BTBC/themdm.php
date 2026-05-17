<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" />
<title>Thêm Danh Mục</title>
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
        <form method="post" action="xulythemdm.php">
            <label>Tên danh mục:</label>
            <input type="text" name="tendm" placeholder="Nhập tên danh mục" />
            <input type="submit" value="Thêm" />
        </form>
    </div>
</div>
<?php
    giaiPhongBoNho($link, $result);
?>
</body>
</html>