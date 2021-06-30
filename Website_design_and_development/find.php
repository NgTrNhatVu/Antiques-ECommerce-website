<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="webfonts/all.css">
	<title>BKC Antiques and Auctions - Product</title>
</head>

<body>
	<?php require_once 'includes/connect.php'; ?>
	<?php require_once 'includes/header.php'; ?>
	<section>
		<div class="container">
			<div class="breadcrumb">
				<a href="index.php"></a>
			</div>
		</div>
	</section>
	<!--==========================================================    Sản phẩm tìm được    ===========================================================================-->
	<section>
		<div class="container">
			<div class="show">
                <?php
                    //Lấy giá trị trả về từ URL
                    $pro_name   = (isset($_GET['name']))    ? $_GET['name'] : "";
                    $pro_cat    = (isset($_GET['cat']))     ? $_GET['cat']  : "";
                    $pro_brand  = (isset($_GET['brand']))   ? $_GET['brand']: "";
                ?>
                <?php
                    //Viết câu lệnh SQL search  và kiểm tra điều kiện
                    $sql = "SELECT sp.id, ten, gia, hinh_anh, id_danh_muc, id_hang FROM san_pham  AS sp 
                        INNER JOIN danh_muc as dm 
                        ON sp.id_danh_muc = dm.id
                        WHERE sp.ten LIKE '%$pro_name%' ";
                    if($pro_cat != ""){
                        $sql .= " AND (sp.id_danh_muc = $pro_cat OR dm.parent_id = $pro_cat)";
                    }
                    if($pro_brand != ""){
                        $sql .= "AND sp.id_hang = $pro_brand";
                    }
                    $result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
				?>

				<div class="show-product">
					<a href="detail.php?id=<?=$row['id']; ?>">
						<img loading="lazy"src="images/product-picture/<?= $row['hinh_anh']; ?>" alt="">
					</a>
					<a href="detail.php?id=<?= $row['id']; ?>">
						<p class="show-name"><?= $row['ten']; ?></p>
					</a>
                    <p class="show-price"><?= number_format($row['gia'], 0, ',', '.'); ?> VNĐ</p>
                    <a href="cart.php?id=<?= $row['id']; ?>"><button>Thêm giỏ hàng</button></a>
                    <a href="detail.php?id=<?= $row['id']; ?>"><button><i class="fas fa-eye"></i></button></a>
                </div>
                
				<?php
                        }
                    }
                    else{
                        echo "<h2 style='text-align: center; color: red;'>
                            <i class='far fa-frown-open'></i> Không có sản phẩm phù hợp với bộ lọc, hãy thử tìm lại với từ khóa khác
                            </h2>";
                    }
				?>
			</div>
		</div>
	</section>
	<!--/Sản phẩm-->
    <!-- <div class="pages">

    </div> -->
	<?php require_once 'includes/footer.php'; ?>
</body>

</html>