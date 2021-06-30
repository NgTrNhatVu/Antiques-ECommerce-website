<!DOCTYPE html>
<html>

<head>
    <title>XEM LAI SQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php require_once 'includes/connect.php'; ?>

    <!-- Update file ảnh -->
    <?php
    function insertPicture($image_dir, $imageName, $imageTmpName, $imageError, $imageSize, $imageType)
    {
        $isUploaded = FALSE;
        $allowed = array('image/jpg', 'image/jpeg', 'image/png');

        if (in_array($imageType, $allowed)) {
            if (!file_exists($imageName)) {
                if ($imageError == 0) {
                    $image_dir = '../../images/product-picture/' . $imageName;
                    move_uploaded_file($imageTmpName, $image_dir);
                    $isUploaded = TRUE;
                } else {
                    echo 'Đã có lỗi khi upload file';
                }
            } else {
                echo "File đã tồn tại";
            }
        } else {
            echo "File không đúng định dạng" . $imageType;
        }
        //Insert sql
        if ($isUploaded == TRUE) {
            return $image_dir;
        } else {
            return '../../images/product-picture/no_pic.png';
        }
    }
    ?>

    <?php
    $sql = '';
    if (isset($_GET)) {
        $gid = $_GET['id'];
        $sql = "SELECT * FROM `san_pham` WHERE `id` = $gid ";
    }
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['submit'])) {
        // $id=$_GET['id'];
        $name = $_POST['name'];
        $po = $_POST['po'];
        $pi = $_POST['pi'];
        $grt = $_POST['grt'];
        $dir = $_POST['dir'];
        $mf = $_POST['mf'];
        $status = $_POST['status'];
        $ad = $_POST['adddate'];
        $image_dir = '';

        if (isset($_FILES["fileToUpload"])) {
            $imageName = $_FILES["fileToUpload"]["name"];
            $imageTmpName = $_FILES["fileToUpload"]["tmp_name"];
            $imageError =  $_FILES["fileToUpload"]["error"];
            $imageSize =  $_FILES["fileToUpload"]["size"];
            $imageType =  $_FILES["fileToUpload"]["type"];
            $image_dir = insertPicture($image_dir, $imageName, $imageTmpName, $imageError, $imageSize, $imageType);
        }
        $sql = "UPDATE `san_pham` 
                    SET `ngay_nhap`='$ad',
                        `ten`='$name',
                        `gia`=$po,
                        `gia_nhap`=$pi,
                        `hinh_anh`='$image_dir',
                        `bao_hanh`=$grt,
                        `id_danh_muc`=$dir,
                        `id_hang`=$mf,
                        `status`=$status  
                    WHERE `id` = $gid";
        $RESULT = mysqli_query($connect, $sql);
        ////////////////////////
        if ($RESULT) {
    ?>
            <script type="text/javascript">
                alert("Successfully!");
            </script>
        <?php
        } else {
        ?>
            <script type="text/javascript">
                alert("Fail!");
            </script>
    <?php
        }
        /////////////////////////
        header('Location: manager_product.php');
    }

    ?>
    <?php require_once 'includes/header.php' ?>
    <div class="main">
        <div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right">
            <div class="right1">
                <h1>Update</h1>
                <hr>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <table class="tableupddate">
                        <tr>
                            <td>ID:</td>
                            <td><input readonly="" type="text" name="id" value="<?php echo $row['id'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Tên:</td>
                            <td><input type="text" name="name" value="<?php echo $row['ten'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Giá bán:</td>
                            <td><input type="text" name="po" value="<?php echo $row['gia'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Giá nhập</td>
                            <td><input type="text" name="pi" value="<?php echo $row['gia_nhap'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Bảo hành:</td>
                            <td><input type="number" name="grt" value="<?php echo $row['bao_hanh'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Ngày nhập:</td>
                            <td><input type="date" name="adddate" value="<?php echo $row['ngay_nhap'] ?>">
                            <td>
                        </tr>
                        <tr>
                            <td>Ảnh:</td>
                            <td>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <br>
                                Ảnh hiện tại:<img src="<?= $row['hinh_anh'] ?>" width=80px>
                            </td>
                        </tr>
                        <tr>
                            <td>Danh mục:</td>
                            <td>
                                <select name="dir">
                                    <?php
                                    $sql = "SELECT * FROM danh_muc";
                                    $result = mysqli_query($connect, $sql);
                                    while ($rowdm = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <!--  1 -->
                                        <?php if ($row["id_danh_muc"] == $rowdm['id']) { ?>
                                            <option selected="" value="<?= $rowdm['id']; ?>">
                                                <?= $rowdm['ten_danh_muc']; ?>
                                            </option>
                                        <?php } else { ?>
                                            <!--  2 -->
                                            <option value="<?php echo $rowdm['id']; ?>"><?php echo $rowdm['ten_danh_muc']; ?>

                                            </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nguồn gốc:</td>
                            <td>
                                <select name="mf">
                                    <?php
                                    $sql = "SELECT * FROM hang";
                                    $result = mysqli_query($connect, $sql);
                                    while ($rowh = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <?php if ($row['id_hang'] == $rowh['id']) { ?>
                                            <option selected="" value="<?php echo $rowh['id']; ?>">
                                                <?php echo $rowh['ten_hang']; ?>
                                            </option>
                                        <?php } else { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['ten_hang']; ?></option>
                                        <?php }; ?>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Trạng thái:</td>
                            <td>
                                <select name="status">
                                    <option value="1">Còn hàng</option>
                                    <option value="0">Hết hàng</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Update" style="width: 70px; border:solid 1px black; border-radius:10px"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>