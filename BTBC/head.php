<?php
// Dùng nội bộ, không include trực tiếp
function renderHead($title = 'CellphoneS') {
    echo '<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<title>' . htmlspecialchars($title) . '</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet"/>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<div id="container">
<div id="banner"><a href="./" style="text-decoration:none"><span class="logo">📱 CellphoneS</span></a></div>
<div id="menu">';
}
function renderSidebar() {
    global $link;
    echo '</div><div class="d-flex gap-3 align-items-start"><div id="lmenu">';
    include_once("menu.php");
    echo '<hr style="border-color:var(--border-light);margin:10px 4px"/>';
    include_once("cart.php");
    echo '</div><div id="content">';
}
function renderFoot() {
    echo '</div></div></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body></html>';
}
?>