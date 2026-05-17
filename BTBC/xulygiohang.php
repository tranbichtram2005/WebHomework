<?php
    session_start();
    require_once "cart_module.php";

    // Xử lý Form POST (Thêm vào giỏ / Làm trống toàn bộ)
    if(isset($_POST['action'])){
        switch($_POST['action']){
            case "Thêm vào Giỏ":
                $hang = array("id"=>$_POST['id'], "ten"=>$_POST['ten'], "gia"=>$_POST['gia'], "soluong"=>1);
                themhangvaogio($hang);
                header("Location: ".$_SERVER['HTTP_REFERER']);
                break;
            case "Làm trống giỏ hàng":
                unset($_SESSION['giohang']);
                header("Location: xemhang.php");
                break;
        }
    }

    // Xử lý link GET (Tăng, Giảm, Xóa từng sản phẩm)
    if(isset($_GET['action']) && isset($_GET['id'])) {
        $id = $_GET['id'];
        switch($_GET['action']) {
            case 'tang':
                if(isset($_SESSION['giohang'][$id])) {
                    $_SESSION['giohang'][$id]['soluong'] += 1;
                }
                header("Location: xemhang.php");
                break;
            case 'giam':
                if(isset($_SESSION['giohang'][$id])) {
                    if($_SESSION['giohang'][$id]['soluong'] > 1) {
                        $_SESSION['giohang'][$id]['soluong'] -= 1;
                    } else {
                        xoahangkhoigio($id); // Nếu giảm về 0 thì tự xóa
                    }
                }
                header("Location: xemhang.php");
                break;
            case 'xoa':
                xoahangkhoigio($id);
                header("Location: xemhang.php");
                break;
        }
    }
?>