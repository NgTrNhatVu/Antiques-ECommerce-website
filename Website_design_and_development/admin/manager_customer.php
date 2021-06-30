<!DOCTYPE html>
<html>
<head>
	<title>BKC Antiques and Auctions - Customer</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="../../webfonts/all.css">
</head>
<body>
    <?php 
        require_once 'includes/connect.php'; 
        $sql="";
        if(isset($_POST["submit"])){
            $timkiem=$_POST["txtsearch"];
            $sql="SELECT * FROM `khach_hang` WHERE `ten_kh` LIKE '%$timkiem%'";
        }else{
            $sql="SELECT * FROM `khach_hang`";
        }
        $result=mysqli_query($connect,$sql);
    ?>
	<?php require_once 'includes/header.php' ?>
	<div class="main">
		<div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right">
            <div class="right1">
                <h1>Thông tin khách hàng</h1>
                <hr>
                <form action="#" method="POST" class="search-form">
                    <input type="text" name="txtsearch" placeholder="Search">
                    <button type="submit" name="submit">Tìm kiếm</button>
                    <button><a href="add_ctm.php">Thêm khách hàng</a></button>
                </form>
                <br>
                <table class="content-table">
                    <tr>
                        <td>ID</td>
                        <td>Tên Đ.nhập</td>
                        <td>Mật khẩu</td>
                        <td>Sđt</td>
                        <td>Địa chỉ</td>
                        <td>Họ Tên</td>
                        <td>Ngày sinh</td>
                        <td>Cập nhật</td>
                        <td>Xóa</td>
                    </tr>
                    <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?= $row['id_khach_hang'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['password'] ?></td>
                        <td><?= $row['sdt'] ?></td>
                        <td><?= $row['dia_chi'] ?></td>
                        <td><?= $row['ten_kh'] ?></td>
                        <td><?= $row['ngay_sinh'] ?></td>
                        <td><a href="update_customer.php?id=<?= $row['id_khach_hang'] ?>"><i class="far fa-edit"></i></a></td>
                        <td><a href="delete_ctm.php?id=<?= $row['id_khach_hang'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <?php } ?>    
                </table>
            </div>
        </div>
    </div>
</body>
</html>