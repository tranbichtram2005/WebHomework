<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" />
<title>Untitled Document</title>
</head>
<body>
<?php
    require_once("db_module.php");
    $link = NULL;
    taoKetNoi($link);
?>
<div id="container">
    <div id="banner"></div>
    <div id="menu"><?php include_once("task.php");?></div>
    <div id="lmenu">
        <ul>
        <?php include_once("menu.php"); ?>
        </ul>
    </div>
    <div id="content">
        <?php
            if(!isset($_GET['sp'])){
                $result = chayTruyVanTraVeDL($link, "select * from tbl_sanpham");
                while($rows=mysqli_fetch_assoc($result)){
                    echo "<div><a href='./xulyxoasp.php?sp=".$rows['id']."'>Xóa</a> <span>".$rows['ten']."</span></div>";
                }
            }
        ?>
    </div>
</div>
<?php
    giaiPhongBoNho($link, $result);
?>
</body>
</html>
