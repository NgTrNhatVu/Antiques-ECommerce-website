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
    
<!--================================================================    Sản phẩm    ========================================================-->
    <div class="container">
        <div class="detail">
        <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT sp.*, dm.ten_danh_muc AS 'ten_danh_muc', h.ten_hang AS 'ten_hang' 
                    FROM san_pham sp, danh_muc dm, hang h 
                    WHERE sp.id = $id AND sp.id_danh_muc = dm.id AND sp.id_hang = h.id";
                $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <!--Ảnh sản phẩm-->
            <div class="detail-image">
                <img width="400px" height="400px" src="images/product-picture/<?= $row['hinh_anh']; ?>" 
                alt="anh-<?= $row['ten']; ?>">
            </div>

            <div class="detail-product">
            <!--Tên sản phẩm-->
                <h2>
                    <?= $row['ten']; ?>
                </h2>
            <!--Giá bán-->
                <div>
                    <h4>Giá bán: <?= number_format($row['gia'], 0, ',', '.'); ?> VNĐ</h4>
                    <?= $row['status'] ? "Còn hàng" : "Tạm hết hàng"; ?> 
                </div>
            <!--Bảo hành-->
                <div>
                    <h4>Bảo hành: <?= $row['bao_hanh']; ?> tháng</h4>
                </div>
            <!--Tên hãng-->
                <div>
                    <h4>Xuất xứ:
                        <a href="find.php?brand=<?= $row['id_hang'];?>">
                        <?= $row['ten_hang']; ?>
                        </a>
                    </h4>
                </div>
            <!--Danh mục-->
                <div>
                    <h4>Danh mục:
                        <a href="find.php?cat=<?= $row['id']; ?>">
                            <?= $row['ten_danh_muc']; ?>
                        </a>
                    </h4>
                </div>
            <!--Mô tả-->
                <div>
                    <?= $row['mo_ta']; ?>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non fermentum enim. Maecenas non auctor neque. 
                    Praesent pellentesque accumsan dolor nec faucibus. Vestibulum laoreet consequat nisl. Sed pulvinar mauris nulla, lacinia tristique lorem sodales eget. 
                    Morbi eget justo sodales, feugiat quam id, fringilla massa. Pellentesque a eros sit amet eros tempor ultrices. <br>
                    Nullam pellentesque ut eros quis egestas. Suspendisse at metus varius, iaculis purus at, cursus augue. 
                    Proin at enim nulla. Vestibulum hendrerit iaculis turpis, finibus euismod enim.
                </div>

            <!--Thao tác thêm vào giỏ hàng-->
                <div id="detail-add-to-cart">
                    <form action="cart.php" method="GET">
                        Số lượng: <input type="number" name="so_luong" value="1"><br>
                        <input type="hidden" name="id" value="<?= $row['id']; ?>" />
                        <input type="submit" value="Thêm vào giỏ hàng" style="cursor: pointer">
                    </form>
                </div>

            </div>
        <?php
                }
            }
        ?>
        
        </div>
    </div>
<!--/Sản phẩm-->
    <?php require_once 'includes/footer.php'; ?>
</body>
</html>