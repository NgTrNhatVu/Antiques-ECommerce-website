<!DOCTYPE html>
<html>
<head>
	<title>Quan Li Cua Hang</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php require_once 'includes/connect.php'; ?>
    <?php require_once 'includes/header.php'; ?>
    <?php
        $sql='';
        if(isset($_GET['submit'])){
            $uname=$_GET['uname'];
            $upass=$_GET['upass'];
            $pn=$_GET['pn'];
            $ad=$_GET['ad'];
            $fn=$_GET['fn'];
            $bd=$_GET['bd'];
            $sql="INSERT INTO `khach_hang`(`username`, `password`, `sdt`, `dia_chi`, `ten_kh`, `ngay_sinh`) VALUES ('$uname','$upass',$pn,'$ad','$fn',$bd)";
            $result=mysqli_query($connect,$sql);
            header('Location: manager_customer.php');
        }   
    ?>
	<div class="main">
		<div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right">
            <div class="right1">
                <h2>Khách hàng mới</h2><hr><br>
                <form action="#" method="GET">
                    <table class="tableadd" style="width: 40%;">
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" name="uname"></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="text" name="upass"></td>
                        </tr>
                        <tr>
                            <td>Sđt:</td>
                            <td><input type="number" name="pn"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td><input type="text" name="ad"></td>
                        </tr>
                        <tr>
                            <td>Họ Tên:</td>
                            <td><input type="text" name="fn"></td>
                        </tr>
                        <tr>
                            <td>Ngày sinh:</td>
                            <td><input type="date" name="bd"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input style="border: 1px solid black; padding: 0px 10px; border-radius:10px; margin-top:10px" type="submit" value="Thêm" name="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        </div>
</body>
</html>