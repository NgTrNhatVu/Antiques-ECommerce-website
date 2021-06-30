<!DOCTYPE html>
<html>
<head>
	<title>Quan Li Cua Hang</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php require_once 'includes/connect.php' ?>
	<?php require_once 'includes/header.php' ?>

    <!-- Update file ảnh -->
    <?php 
        function insertPicture($image_dir, $imageName, $imageTmpName, $imageError, $imageSize, $imageType){
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
        if(isset($_POST['submit'])){
            // $id=$_POST['id'];
            $name=$_POST['name'];
            $gia_ban=$_POST['gia_ban'];
            $gia_nhap=$_POST['gia_nhap'];
            $bao_hanh=$_POST['bao_hanh'];
            $danh_muc=$_POST['danh_muc'];
            $nguon_goc=$_POST['nguon_goc'];
            $ngay_nhap=$_POST['ngay_nhap'];
            $status=$_POST['status'];
            $image_dir = '';
            if (isset($_FILES["fileToUpload"])){
                $imageName = $_FILES["fileToUpload"]["name"];
                $imageTmpName = $_FILES["fileToUpload"]["tmp_name"];
                $imageError =  $_FILES["fileToUpload"]["error"];
                $imageSize =  $_FILES["fileToUpload"]["size"];
                $imageType =  $_FILES["fileToUpload"]["type"];
                $image_dir = insertPicture($image_dir, $imageName, $imageTmpName, $imageError, $imageSize, $imageType);

            }
            $sql="INSERT INTO `san_pham`(`ngay_nhap`,`ten`, `gia`, `gia_nhap`, `hinh_anh`, `bao_hanh`,`id_danh_muc`, `id_hang`,`status`) 
            VALUES ('$ngay_nhap', '$name', $gia_ban, $gia_nhap, '$image_dir', $bao_hanh, $danh_muc, $nguon_goc, $status);";
            $RESULT=mysqli_query($connect,$sql);
            
            header('Location: manager_product.php');
        }

    ?>
	<div class="main">
		<div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right"><div class="right1">
            <h1>Add Products</h1>
            <hr>
            <form action="#" method="POST" enctype="multipart/form-data">
                <table class="tableadd" style="width: 40%;">
                    <tr>
                        <td>Tên:</td>
                        <td><input 	checked="" type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>Giá bán(VND):</td>
                        <td><input type="number" name="gia_ban"></td>
                    </tr>
                    <tr>
                        <td>Giá nhập(VND):</td>
                        <td><input type="number" name="gia_nhap"></td>
                    </tr>
                    <tr>
                        <td>Bảo hàng(Month):</td>
                        <td><input type="text" name="bao_hanh"></td>
                    </tr>
                    <tr>
                        <td>Ngày nhập:</td>
                        <td><input name="ngay_nhap" type="date" style="width: 300px;"></td>
                    </tr>
                    <tr>
                        <td>Ảnh:</td>
                        <td>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </td>
                    </tr>
                    <tr>
                        <td>Danh mục:</td>
                        <td>
                            <select style="width: 200px;" name="danh_muc">
                                <?php 
                                    $sql = "SELECT * FROM danh_muc";
                                    $result = mysqli_query($connect, $sql);
                                    while($rowdm = mysqli_fetch_assoc($result)){
                                ?>
                                    <option value="<?= $rowdm['id']; ?>">
                                        <?php echo $rowdm['ten_danh_muc']; ?>
                                    </option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Nguồn gốc:</td>
                        <td>
                            <select style="width: 200px;" name="nguon_goc">
                                <?php 
                                    $sql = "SELECT * FROM hang";
                                    $result = mysqli_query($connect, $sql);
                                    while($rowh = mysqli_fetch_assoc($result)){
                                ?>
                                    <option value="<?php echo $rowh['id']; ?>"><?php echo $rowh['ten_hang']; ?></option>
                                <?php }?>
                            </select>
                            
                            <button><a href="add_brand.php">Nguồn mới</a></button>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Trạng thái:</td>
                        <td>
                            <select style="width: 200px;" name="status">
                                <option value="1">Còn hàng</option>
                                <option value="0">Hết hàng</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input style="border: 1px solid black; border-radius:10px"type="submit" value="Submit" name="submit" ></td>
                    </tr>
                </table>
        </form>        
        </div></div>
    </div>
</body>
</html>

