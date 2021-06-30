<!DOCTYPE html>
<html>

<head>
    <title>BKC Antiques and Auctions - Trang quản lí - Thêm sự kiện</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php require_once 'includes/connect.php' ?>
    <?php require_once 'includes/header.php' ?>
    <?php
    $SQL = '';
    if (isset($_GET['submit'])) {
        // $id=$_GET['id'];
        $title = $_GET['title'];
        $date = $_GET['date'];
        $location = $_GET['location'];
        $description = $_GET['description'];
        $status = $_GET['status'];

        $SQL = "INSERT INTO `su_kien`(`title`, `date`, `location`, `description`, `status`) 
                VALUES ('$title', '$date', '$location', '$description', '$status')";
        mysqli_query($connect, $SQL);
        header('Location: manager_event.php');
    }

    ?>
    <div class="main">
        <div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right">
            <div class="right1">
                <h1>Sự kiện mới</h1>
                <hr>
                <form action="#" method="GET">
                    <table class="tableadd" style="width: 40%;">
                        <tr>
                            <td>Title:</td>
                            <td><input type="text" name="title" required></td>
                        </tr>
                        <tr>
                            <td>Date: </td>
                            <td><input type="date" name="date" required></td>
                        </tr>
                        <tr>
                            <td>Location: </td>
                            <td><input type="text" name="location" required></td>
                        </tr>
                        <tr>
                            <td>Description: </td>
                            <td>
                                <textarea name="description" cols="30" rows="7"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="status">
                                    <option value="1">Sắp diễn ra</option>
                                    <option value="0">Đã diễn ra</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input style="border: 1px solid black; border-radius:10px;" type="submit" value="Submit" name="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>