<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php require_once 'includes/connect.php' ?>

<?php
    $sql = "SELECT * FROM `admin`";
    $result = mysqli_query($connect, $sql);
    if(isset($_POST['sign-in-btn'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        while($row = mysqli_fetch_assoc($result)){
            if($row['username'] == $username && $row['password'] == $password ){
                $_SESSION['ad_username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
            }
        }
        echo '<script> alert("Tài khoản hoặc mật khẩu sai"); </script>';
    }
?>

<body>
<?php require_once 'includes/header.php' ?>
    <div class="main">
        <table class="sign-up-table">
            <form action="" method="POST">
                <caption>
                    <h2>Đăng nhập BKC Antiques and Auctions</h2><br>
                </caption>
                <tr>
                    <td> Tên tài khoản:</td>
                    <td><input type="text" name="username" placeholder="Username"></td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td><input type="password" name="password" placeholder="Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="sign-in-btn">Đăng nhập</button>
                    </td>
                </tr>
            </form>
        </table>
    </div>
</body>

</html>