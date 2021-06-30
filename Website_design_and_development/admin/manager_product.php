<!DOCTYPE html>
<html>

<head>
    <title>BKC Antiques and Auctions - Quản lí - Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="../webfonts/all.css">

<body>
    <?php 
        require_once 'includes/connect.php';
        $sql='';
        if(isset($_GET['submit'])){
            $timkiem=$_GET["txtsearch"];
            $sql="SELECT sp.*, dm.ten_danh_muc as 'danh_muc', h.ten_hang as 'hang' 
                FROM `san_pham` sp, `danh_muc` dm, `hang` h 
                WHERE sp.id_danh_muc = dm.id AND sp.id_hang = h.id AND sp.ten LIKE '%$timkiem%' OR sp.id = '$timkiem'";
        }else{
            $sql="SELECT sp.*, dm.ten_danh_muc as 'danh_muc', h.ten_hang as 'hang' 
                FROM `san_pham` sp, `danh_muc` dm, `hang` h 
                WHERE sp.id_danh_muc = dm.id AND sp.id_hang = h.id";
        }
        $result=mysqli_query($connect,$sql);
    ?>
    <?php require_once 'includes/header.php'; ?>
    <div class="main">
        <div class="left">
            <?php require_once 'includes/menu.php'; ?></div>
        <div class="right">
            <div class="right1">
                <h1>Quản lí các sản phẩm</h1>
                <hr>
                <form action="manager_product.php" method="GET" class="search-form">
                    <input type="text" name="txtsearch" placeholder="Từ khóa...">
                    <button type="submit" name="submit">Tìm kiếm</button>
                    <button><a href="add_prd.php">Thêm sản phẩm</a></button>
                </form>
                <br>
                <table class="content-table">
                    <tr>
                        <td>ID</td>
                        <td>Tên</td>
                        <td>Giá bán</td>
                        <td>Giá nhập</td>
                        <td>B.H</td>
                        <td>Ảnh</td>
                        <td>Danh mục</td>
                        <td>Xuất xứ</td>
                        <td>Tr.thái</td>
                        <td>Ngày thêm</td>
                        <td>C.nhật</td>
                        <td>Xóa</td>
                    </tr>
                    <?php
                        while ($row=mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['ten']; ?></td>
                        <td><?= number_format($row['gia']); ?></td>
                        <td><?= number_format($row['gia_nhap']); ?></td>
                        <td><?= $row['bao_hanh']." Tháng"; ?></td>
                        <td><img width="55px" height="55px"
                                src="../images/product-picture/<?= $row['hinh_anh']; ?>"></td>
                        <td><?= $row['danh_muc']; ?></td>
                        <td><?= $row['hang']; ?></td>
                        <td><?= ($row['status'] == 1 ) ? "Còn hàng" : "Tạm hết"; ?></td>
                        <td><?= $row['ngay_nhap'] ?></td>
                        <td><a href="update_prd.php?id=<?= $row['id'] ?>"><i class="far fa-edit"></i></a></td>
                        <td><a href="delete_prd.php?id=<?= $row['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php };?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>