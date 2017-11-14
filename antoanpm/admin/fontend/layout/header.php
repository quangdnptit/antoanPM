<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Home-Forum-Team 13</title>

    <link rel="stylesheet" type="text/css" href="assets/style.css" media="screen" />
    <!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="assets/iecss.css" /> <![endif]-->
</head>

<body>
<div id="main_container">
    <div class="header">
        <div id="logo"><a href="index.html"><img src="assets/images/logo.png" alt="" title="" border="0" height="54" width="90" /></a></div>
        <div class="right_header">
            <div class="top_menu">
                <?php
                    if(isset($_SESSION['user'])){
                        $user = $_SESSION['user'];
                        $user_id = $user['id'];
                        $user_name = $user['name'];
                ?>
                        <a href="#" class="login"><?=$user_name?></a>
                        <a href="#" class="sign_up">Logout</a>
                <?php
                    }else{
                ?>
                    <a href="http://localhost/antoanpm/admin/fontend/user/login.php" class="login">login</a>
                    <a href="#" class="sign_up">signup</a>
                <?php
                    }
                ?>
                </div>
            <div id="menu">
                <ul>
                    <li><a href="http://localhost/antoanpm/admin/fontend/index.php" title="">Home</a></li>
                    <li><a href="http://localhost/antoanpm/admin/fontend/write-post.php" title="">Write post</a></li>
                    <li><a href="http://localhost/antoanpm/admin/fontend/manager-post.php" title="">Manage posts</a></li>
                    <li><a href="#" title="">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
