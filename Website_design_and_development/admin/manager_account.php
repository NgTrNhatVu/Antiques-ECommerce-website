<!DOCTYPE html>
<html>
<head>
	<title>BKC Antiques and Auctions - Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="../../webfonts/all.css">
</head>
<body>
    <?php 
        require_once 'includes/connect.php';
        $sql='';
        if(isset($_GET['submit'])){
            $timkiem=$_GET["txtsearch"];
            $sql="SELECT * FROM `admin` WHERE `ten` LIKE '%".$timkiem."%'";
        }else{
            $sql="SELECT * FROM `admin`";
        }
        $result=mysqli_query($connect,$sql);
    ?>
	<?php require_once 'includes/header.php' ?>
	<div class="main">
		<div class="left">
            <?php require_once 'includes/menu.php' ?>
        </div>
        <div class="right">
            <div class="right1">
                <h1>Danh sách nhân viên</h1>
                <hr>
                <form action="manager_account.php" method="get" class="search-form">
                    <input type="text" name="txtsearch" placeholder="Search">
                    <button type="submit" name="submit">Tìm kiếm</button>
                    <button><a href="add_account.php">Add Account</a></button>
                </form>
                <br>
                <table class="content-table">
                    <tr>
                        <td>ID</td>
                        <td>Tên</td>
                        <td>Username</td>
                        <td>Cấp bậc</td>
                        <td>Xóa</td>
                    </tr>
                    <?php
                        while ($row=mysqli_fetch_assoc($result)) {
                    ?>        
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['ten']; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td><?php if($row['cap_bac']==1){echo "SuperAdmin";}else{echo "Admin";} ?></td>
                            <td><a href="delete_account.php?id=<?= $row['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php };?>    
                </table>
            </div>
        </div>
    </div>
</body>
</html>