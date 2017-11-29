<!DOCTYPE html>
<?php
session_start();
  
  if(isset($_SESSION["admin_login"]) && $_SESSION["admin_login"]!=null){
      
      
  }else{
     echo '<script>alert("Bạn ko có thẩm quyền để vào trang này ");location.href="../../../index.php"</script>';   
  }
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SB Admin - Bootstrap Admin Template</title>
        <!-- Bootstrap Core CSS -->
        <link href="/qhlmstore/public/admin/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="/qhlmstore/public/admin/css/sb-admin.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="/qhlmstore/public/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            #imghihi{
        width: 66px !important; 
        height:62px !important;
    }
    </style>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Xin chào <?php echo $_SESSION["admin_login"][0]["username"] ?></a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                  
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <li>
                                <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">View All</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION["admin_login"][0]["username"] ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu"
                            <li class="divider"></li>
                            <li>
                                <a href="dangxuat.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                         <li>
                            <a href="http://localhost:8080/antoanpm/admin/admin/modules/admin/index.php"><i class="fa fa-fw fa-dropbox"></i> Quan li hien thi</a>
                        </li>
                        <li>
                            <a href="http://localhost:8080/antoanpm/admin/admin/modules/admin/index.php"><i class="fa fa-fw fa-dashboard"></i>Admin</a>
                        </li>
                        <li>
                            <a href="http://localhost:8080/antoanpm/admin/admin/modules/admin/displaycate.php"><i class="fa fa-fw fa-calendar"></i> Quan li danh muc</a>
                        </li>
                        <li>
                            <a href="http://localhost:8080/antoanpm/admin/admin/modules/admin/index.php"><i class="fa fa-fw fa-shopping-cart"></i> Quan li San Pham</a>
                        </li>
                        <li>
                            <a href="http://localhost:8080/antoanpm/admin/admin/modules/admin/thongbao.php"><i class="fa fa-fw fa-bell"></i>Thông báo</a>
                        </li>
                      
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="#">Dropdown Item</a>
                                </li>
                                <li>
                                    <a href="#">Dropdown Item</a>
                                </li>
                            </ul>
                        </li>
                    
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">