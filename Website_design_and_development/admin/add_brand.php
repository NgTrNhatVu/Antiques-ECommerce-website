<!DOCTYPE html>
<html>
<head>
	<title>Quan Li Cua Hang</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php require_once 'includes/connect.php' ?>
	<?php require_once 'includes/header.php' ?>
    <?php 
        $SQL='';
        if(isset($_GET['submit'])){
            // $id=$_GET['id'];
            $name=$_GET['name'];
            
            $SQL="INSERT INTO `hang`(`ten_hang`) VALUES ('$name')";
            mysqli_query($connect,$SQL);

            header('Location: manager_product.php');
        }

    ?>
	<div class="main">
		<div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right"><div class="right1">
            <h1>Add brand</h1>
            <hr>
            <form action="#" method="GET">
                <table class="tableadd" style="width: 40%;">
                    <tr>
                        <td>Name:</td>
                        <td><input 	checked="" type="text" name="name"></td>
                    </tr>
                   
                    <tr>
                        <td></td>
                        <td><input style="border: 1px solid black; border-radius:10px;" type="submit" value="Submit" name="submit" ></td>
                    </tr>
                </table>
        </form>        
        </div></div>
    </div>
</body>
</html>

