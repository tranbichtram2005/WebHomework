<?php
$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$from = ($page - 1) * SO_SP_TREN_TRANG;

// Xây dựng câu lệnh đếm dữ liệu động
$sql_count = "select count(*) from tbl_sanpham where 1=1";
$params = "";

if (isset($_GET['keyword'])) {
    $kw = mysqli_real_escape_string($link, $_GET['keyword']);
    $sql_count .= " and ten like '%$kw%'";
    $params .= "&keyword=" . urlencode($_GET['keyword']);
}
if (isset($_GET['dm'])) {
    $dm_id = (int)$_GET['dm'];
    $sql_count .= " and id_dm = $dm_id";
    $params .= "&dm=" . $dm_id;
}

$res_count = chayTruyVanTraVeDL($link, $sql_count);
$row_count = mysqli_fetch_row($res_count);
$total_records = $row_count[0];
$total_pages = ceil($total_records / SO_SP_TREN_TRANG);

// Truy vấn lấy dữ liệu phân trang
$sql_data = str_replace("count(*)", "*", $sql_count) . " order by id desc limit $from, " . SO_SP_TREN_TRANG;
$res_data = chayTruyVanTraVeDL($link, $sql_data);

if (mysqli_num_rows($res_data) > 0) {
    echo "<div class='product-grid'>";
    while ($row = mysqli_fetch_assoc($res_data)) {
        ?>
        <a href="chitiet.php?sp=<?php echo $row['id']; ?>" class="sp">
            <div>
                <div class="sp-img-box">📱</div>
                <h3><?php echo htmlspecialchars($row['ten']); ?></h3>
                <p class="sp-desc"><?php echo htmlspecialchars($row['mota']); ?></p>
            </div>
            <p class="sp-price"><?php echo number_format($row['gia'], 0, ',', '.'); ?> đ</p>
        </a>
        <?php
    }
    echo "</div>";

    // Khối phân trang chuẩn giao diện
    if ($total_pages > 1) {
        echo "<div class='pager'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) echo "<span>$i</span>";
            else echo "<a href='index.php?page=$i$params'>$i</a>";
        }
        echo "</div>";
    }
} else {
    echo "<div style='padding:30px; text-align:center; color:#71717a;'>Không tìm thấy sản phẩm nào phù hợp.</div>";
}
?>