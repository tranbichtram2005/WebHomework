<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" />
<title>Untitled Document</title>
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
        <?php
            if(isset($_SESSION['giohang'])){
                $giohang = $_SESSION['giohang'];
                foreach($giohang as $k=>$v)
                    echo "  <form method='post' action='xulygiohang.php'>
                                <input type='hidden' name='id' value='".$k."'>
                                <span>".$v['ten']."</span> |
                                <span>".$v['gia']."</span>
                                <input type='text' value='".$v['soluong']."' name='soluong'>
                                <input type='submit' name='action' value='Cập nhật'>
                                <input type='submit' name='action' value='Xóa hàng'>
                            </form>";
            }
        ?>
    </div>
</div>
<?php
    giaiPhongBoNho($link, $result);
?>
</body>
</html>
