<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="webfonts/all.css">
	<title>BKC Antiques and Auctions - Home</title>
</head>

<body>
	<?php require_once 'includes/connect.php'; ?>
    <?php require_once 'includes/header.php'; ?>
    <?php 
        if(isset($_GET['success'])){
            echo '<script> alert("Thanh toán thành công!\n"); </script>';
        }
    ?>
<!--===========================================================    Bộ sưu tập    ================================================================================-->
	<section>
		<div class="container">
			<div class="collections">
				<div class="collection-part">
					<a href="find.php?cat=1">
						<img width="350px" height="230px" src="images/collection-picture/art_cover.jpg"
							alt="art-collection-banner">
						<div class="collection-background"></div>
						<div class="collection-name">
							<p>Nghệ thuật</p>
						</div>
					</a>
				</div>
				<div class="collection-part">
					<a href="find.php?cat=3">
						<img width="350px" height="230px" src="images/collection-picture/jewelry_cover.jpg"
							alt="jewelry-collection-banner">
						<div class="collection-background"></div>
						<div class="collection-name">
							<p>Trang sức</p>
						</div>
					</a>
				</div>
				<div class="collection-part">
					<a href="find.php?cat=2">
						<img width="350px" height="230px" src="images/collection-picture/furniture_cover.jpg"
							alt="furniture-collection-banner">
						<div class="collection-background"></div>
						<div class="collection-name">
							<p>Nội thất</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!--/Bộ sưu tập-->

<!--=========================================================   Sản phẩm mới    =====================================================================================-->
	<section>
		<div class="container">
			<div class="new">
                <h2>Sản phẩm mới</h2>
                <div id="slideImages">
				<?php 
					$sql = "SELECT id, ten, gia, hinh_anh FROM san_pham ORDER BY ngay_nhap DESC LIMIT 12";
                    $result = mysqli_query($connect, $sql);

					while ($row = mysqli_fetch_assoc($result)) {
				?>
                    <div class="show-product">
                        <a href="detail.php?id=<?php echo $row['id']; ?>">
                            <img src="images/product-picture/<?php echo $row['hinh_anh']; ?>" alt="">
                        </a>
                        <a href="detail.php?id=<?php echo $row['id']; ?>">
                            <p class="show-name"><?php echo $row['ten']; ?></p>
                        </a>
                        <p class="show-price"><?php echo number_format($row['gia'], 0, ',', '.'); ?> VNĐ</p>
                        <a href="cart.php?id=<?php echo $row['id']; ?>"><button>Thêm giỏ hàng</button></a>
                        <a href="detail.php?id=<?php echo $row['id']; ?>"><button><i class="fas fa-eye"></i></button></a>
                    </div>
                    
                    <?php
                        }
                    ?>
                </div>
                <button id="prevBtn"><i class="fas fa-arrow-left fa-2x"></i></button>
                <button id="nextBtn"><i class="fas fa-arrow-right fa-2x"></i></button>
            </div>  
		</div>
	</section>
	<!--/Sản phẩm mới-->

<!--==========================================================   Sản phẩm    ======================================================================================-->
	<section>
		<div class="container">
			<div class="show">
				<h2>Tất cả sản phẩm</h2>
                <?php 
                    //========================  Code SQL phân trang ==============================
                    $result = mysqli_query($connect, "SELECT COUNT(id) as total FROM san_pham");
                    $row = mysqli_fetch_assoc($result);
                    $total_pro = $row['total'];

                    //Số sản phẩm trên một trang
                    $limit = 12;
                    $total_page = ceil($total_pro / $limit);
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start = ($current_page - 1) * $limit;
                    //========================  Code SQL phân trang ==============================

					$sql = "SELECT id, ten, gia, hinh_anh 
                        FROM san_pham
                        LIMIT $start, $limit;";
					$result = mysqli_query($connect, $sql);
					while ($row = mysqli_fetch_assoc($result)) {
				?>
				<div class="show-product">
					<a href="detail.php?id=<?php echo $row['id']; ?>">
						<img loading="lazy" src="images/product-picture/<?php echo $row['hinh_anh']; ?>" alt="">
					</a>
					<a href="detail.php?id=<?php echo $row['id']; ?>">
						<p class="show-name"><?php echo $row['ten']; ?></p>
					</a>
                    <p class="show-price"><?php echo number_format($row['gia'], 0, ',', '.'); ?> VNĐ</p>
                    <a href="cart.php?id=<?php echo $row['id']; ?>"><button>Thêm giỏ hàng</button></a>
                    <a href="detail.php?id=<?php echo $row['id']; ?>"><button><i class="fas fa-eye"></i></button></a>
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
            echo "<a href='index.php?page=" . ($current_page - 1) ."'> Trang trước </a>";
        for($i = 1; $i <= $total_page; $i++){ 
            echo ($current_page == $i) ? 
            "<a href='index.php?page=$i' style='color: #be6a15; text-decoration: underline'> $i </a>" 
            : "<a href='index.php?page=$i'> $i </a>";
        } 
        if ($current_page < $total_page)
            echo "<a href='index.php?page=" . ($current_page + 1) ."'>Trang kế tiếp</a>";
        ?>
    </div>
    <?php require_once 'includes/footer.php'; ?>
    
    <script src="js/main.js"></script>
</body>

</html>