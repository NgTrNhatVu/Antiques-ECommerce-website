<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="webfonts/all.css">
	<title>BKC Antiques and Auctions - Event</title>
</head>

<body>
	<?php require_once 'includes/connect.php'; ?>
    <?php require_once 'includes/header.php'; ?>

<!--==========================================================   Sản phẩm    ======================================================================================-->
	<section>
		<div class="container">
			<div class="events">
				<h2>Các sự kiện</h2>
                <?php 
                    //========================  Code SQL phân trang ==============================
                    $result = mysqli_query($connect, "SELECT COUNT(id) as total FROM su_kien");
                    $row = mysqli_fetch_assoc($result);
                    $total_pro = $row['total'];

                    //Số thực thể trên một trang
                    $limit = 3;
                    $total_page = ceil($total_pro / $limit);
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start = ($current_page - 1) * $limit;
                    //========================  Code SQL phân trang ==============================

					$sql = "SELECT *
                        FROM su_kien
                        LIMIT $start, $limit;";
					$result = mysqli_query($connect, $sql);
					while ($row = mysqli_fetch_assoc($result)) {
				?>
                <div class="event">
                    <h3><?= $row['title']?></h3>
                    <p><b>Thời gian:</b> <?= $row['date'] ?></p>
                    <p><b>Địa điểm:</b> <?= $row['title']?></p>
                    <p><?= $row['description']?></p>
                    <p><b>Trạng thái: </b><?= ($row['status'] == 1) ? 'Sắp diễn ra' : 'Đã diễn ra'?></p>
                </div>
				<?php
					}
				?>
            </div>
		</div>
	</section>
<!--/Sản phẩm-->
<!--===================================================    PHÂN TRANG  =======================================================-->
    <div class="pages">
        <?php 
        if ($current_page > 1)
            echo "<a href='event.php?page=" . ($current_page - 1) ."'> Trang trước </a>";
        for($i = 1; $i <= $total_page; $i++){ 
            echo ($current_page == $i) ? 
            "<a href='event.php?page=$i' style='color: #be6a15; text-decoration: underline'> $i </a>" 
            : "<a href='event.php?page=$i'> $i </a>";
        } 
        if ($current_page < $total_page)
            echo "<a href='event.php?page=" . ($current_page + 1) ."'>Trang kế tiếp</a>";
        ?>
    </div>
    <?php require_once 'includes/footer.php'; ?>
    
    <script src="js/main.js"></script>
</body>

</html>