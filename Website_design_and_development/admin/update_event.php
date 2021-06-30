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
    $sql = "SELECT * FROM `su_kien` WHERE id = $id ";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {
    // $id=$_GET['id'];
    $title = $_POST['title'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $sql = "UPDATE `su_kien` 
                SET `title`         = '$title',
                    `location`      = '$location',
                    `description`   = '$description',
                    `date`          = '$date',
                    `status`        = $status
                WHERE `id` = $id";
    $RESULT = mysqli_query($connect, $sql);

    header('Location: manager_event.php');
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
                            <td><input readonly="" type="text" name="id" value="<?= $row['id'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Title:</td>
                            <td><input type="text" name="title" value="<?= $row['title'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Location:</td>
                            <td><input type="text" name="location" value="<?= $row['location'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td><input type="text" name="description" value="<?= $row['description'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td><input type="date" name="date" value="<?= $row['date'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                <select name="status">
                                    <option value="1">Sắp diễn ra</option>
                                    <option value="0">Đã diễn ra</option>
                                </select>
                            </td>
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