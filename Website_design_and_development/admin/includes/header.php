<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="../webfonts/all.css">
<div class="head">

    <div class="logo">
        <a href="home.php"><img src="../images/logo.png" alt="logo" width=150px></a>
    </div>
    <div class="title">
        <h1>BKC Antiques and Auctions - Trang quản lí</h1>
    </div>
    <div class="account-btn">
        <?php
        if (isset($_SESSION['ad_username'])) {
        ?>
            <h2><a href='sign_out.php'>
                    <i class="fas fa-sign-out-alt"></i>
                    <?= $_SESSION['ad_username']; ?>
                </a></h2>
        <?php
        } else {
            if (strpos($_SERVER["SCRIPT_FILENAME"], "index.php") != true) {
                header("Location: index.php");
            } ?>
            <h2><a href='index.php'>
                    <i class="far fa-user-circle fa-2x"></i>Đăng nhập
                </a>
            </h2>
        <?php
        }
        ?>
    </div>
</div>