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
                    echo "<div><a href='./doisp.php?sp=".$rows['id']."'>Sửa</a> <span>".$rows['ten']."</span></div>";
                }
            }else{
                $result = chayTruyVanTraVeDL($link, "select * from tbl_sanpham where id=".$_GET['sp']);
                $row = mysqli_fetch_row($result);
        ?>
        <form method="post" action="xulydoisp.php">
            <label for="iddm">Chọn DM:</label>
            <select name="iddm">
                <?php
                    $link = NULL;
                    taoKetNoi($link);
                    $result = chayTruyVanTraVeDL($link, "select * from  tbl_danhmuc");
                    while($rows=mysqli_fetch_assoc($result)){
                        $select = ($rows['id']==$row[4])?" selected='selected' ":"";
                        echo "<option $select value='".$rows['id']."'>".$rows['ten']."</option>";
                    }
                ?>
            </select><br/>
            <label for="tensp">Tên SP:</label>
            <input type="text" name="tensp" value="<?php echo $row[1] ?>"><br/>
            <label for="mota">Mô tả:</label>
            <textarea name="mota" style="width:300px; height:200px; text-align:left;">
            <?php echo $row[2]?>
            </textarea><br/>
            <label for="gia">Giá:</label>
            <input type="number" name="gia" value="<?php echo $row[3]?>"><br/>
            <input type="hidden" value="<?php echo $row[0]?>" name="idsp">
            <input type="submit" value="Lưu SP">
        </form>
        <?php
            }
        ?>
    </div>
</div>
<?php
    giaiPhongBoNho($link, $result);
?>
</body>
</html>
