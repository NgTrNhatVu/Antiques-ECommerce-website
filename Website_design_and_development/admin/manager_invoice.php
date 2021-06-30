<!DOCTYPE html>
<html>
<head>
	<title>BKC Antiques and Auctions - Invoice</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="../../webfonts/all.css">
</head>
<body>
    <?php 
        require_once 'includes/connect.php'; 
        $sql="";
        if(isset($_POST["submit"])){
            $timkiem=$_POST["txtsearch"];
            $sql="SELECT * FROM `don_hang` WHERE `id_don_hang` LIKE '%$timkiem%'";
        }else{
            $sql="SELECT * FROM `don_hang`";
        }
        $result=mysqli_query($connect,$sql);
    ?>
	<?php require_once 'includes/header.php' ?>
	<div class="main">
		<div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right">
            <div class="right1">
                <h1>Hóa Đơn Khách Hàng</h1>
                <hr>
                <form action="#" method="POST" class="search-form">
                    <input type="text" name="txtsearch" placeholder="Search-ID">
                    <button type="submit" name="submit">Tìm kiếm</button>
                    <button><a href="add_invoice.php">Hóa đơn mới</a></button>
                </form>
                <br>
                <table class="content-table">
                    <tr>
                        <td>ID</td>
                        <td>Customer's ID</td>
                        <td>Created Date</td>
                        <td>View</td>
                        <td>Delete</td>
                    </tr>
                    <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?php echo $row['id_don_hang'] ?></td>
                        <td style="text-align: center;"><?php echo $row['id_khach_hang'] ?></td>
                        <td><?php echo $row['ngay_tao'] ?></td>
                        <td><a href="view_invoice.php"><i class="far fa-eye"></i></a></td>
                        <td><a href="delete_invoice.php?id=<?php echo $row['id_don_hang'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <?php } ?>    
                </table>
            </div>
        </div>
    </div>
</body>
</html>