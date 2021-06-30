<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php require_once 'includes/connect.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `khach_hang` WHERE id_khach_hang = $id ";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
}


if (isset($_POST['submit'])) {
    // $id=$_GET['id'];
    $username   = $_POST['username'];
    $password   = md5($_POST['password']);
    $name       = $_POST['name'];
    $dob        = $_POST['dob'];
    $phone      = $_POST['phone'];
    $email      = $_POST['email'];
    $address    = $_POST['address'];
    $phuong     = $_POST['phuong'];
    $quan       = $_POST['quan'];
    $tinh       = $_POST['tinh'];

    $sql = "UPDATE `khach_hang` 
                SET `username`  = '$username',
                    `password`  = '$password',
                    `sdt`       = '$phone',
                    `email`     = '$email',
                    `dia_chi`   = '$address',
                    `phuong`    = '$phuong',
                    `quan`      = '$quan',
                    `tinh`      = '$tinh',
                    `ten_kh`    = '$name',
                    `ngay_sinh` = '$dob' 
                WHERE `id_khach_hang` = $id";
    $RESULT = mysqli_query($connect, $sql);

    header('Location: manager_customer.php');
}

?>

<body>
    <?php require_once 'includes/header.php' ?>
    <div class="main">
        <div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right">
            <div class="right1">
                <h1>Cập nhật thông tin khách hàng</h1>
                <hr>
                <form action="" method=POST>
                    <table class="tableupddate">
                        <tr>
                            <td>ID:</td>
                            <td><input readonly="" type="text" name="id" value="<?= $row['id_khach_hang'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" name="username" value="<?= $row['username'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Mật khẩu:</td>
                            <td><input type="text" name="password" value="<?= $row['password'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Tên khách hàng: </td>
                            <td><input type="text" name="name" value="<?= $row['ten_kh'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Ngày sinh: </td>
                            <td><input type="date" name="dob" value="<?= $row['ngay_sinh'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại: </td>
                            <td><input type="text" name="phone" value="<?= $row['sdt'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" name="email" value="<?= $row['email'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td>
                                <input type="text" name="address" value="<?= $row['dia_chi'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Phường: </td>
                            <td><input type="text" name="phuong" value="<?= $row['phuong'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Quận: </td>
                            <td><input type="text" name="quan" value="<?= $row['quan'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Tỉnh/Thành phố: </td>
                            <td><input type="text" name="tinh" value="<?= $row['tinh'] ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" name="submit">Update</button>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
</body>

</html>