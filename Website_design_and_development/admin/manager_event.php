<!DOCTYPE html>
<html>
<head>
	<title>BKC Antiques and Auctions - Trang quản lí - Event</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="../../webfonts/all.css">
</head>
<body>
    <?php 
        require_once 'includes/connect.php'; 
        $sql="";
        if(isset($_POST["submit"])){
            $timkiem=$_POST["txtsearch"];
            $sql="SELECT * FROM `su_kien` WHERE `title` LIKE '%$timkiem%'";
        }else{
            $sql="SELECT * FROM `su_kien`";
        }
        $result=mysqli_query($connect,$sql);
    ?>
	<?php require_once 'includes/header.php' ?>
	<div class="main">
		<div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right">
            <div class="right1">
                <h1>Các sự kiện</h1>
                <hr>
                <form action="#" method="POST" class="search-form">
                    <input type="text" name="txtsearch" placeholder="Title...">
                    <button type="submit" name="submit">Tìm kiếm</button>
                    <button><a href="add_event.php">Thêm sự kiện</a></button>
                </form>
                <br>
                <table class="content-table">
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Description</td>
                        <td>Date</td>
                        <td>Address</td>
                        <td>Status</td>
                        <td>Update</td>
                        <td>Delete</td>
                    </tr>
                    <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= $row['date'] ?></td>
                        <td><?= $row['location'] ?></td>
                        <td><?= ($row['status'] == 1) ? "Sắp diễn ra" : "Đã diễn ra" ?></td>
                        <td><a href="update_event.php?id=<?= $row['id'] ?>"><i class="far fa-edit"></i></a></td>
                        <td><a href="delete_event.php?id=<?= $row['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <?php } ?>    
                </table>
            </div>
        </div>
    </div>
</body>
</html>