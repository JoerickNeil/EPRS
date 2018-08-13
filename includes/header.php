<?php
    ob_start(); # Quick fix to 'Warning: Cannot modify header information - headers already sent by...'
    
    # sets path of application folder
    $protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
    $port      = $_SERVER['SERVER_PORT'];
    $disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
    $domain    = $_SERVER['SERVER_NAME'];

    define('app_path', "${protocol}://${domain}${disp_port}" . '/Dynamics/');

    require($_SERVER['DOCUMENT_ROOT'] . '/Dynamics/config.php');
    require($_SERVER['DOCUMENT_ROOT'] . '/Dynamics/function.php');
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $page_title ?></title>
    <link href="<?php echo app_path ?>css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo app_path ?>css/custom.css" rel="stylesheet" />
    <link href="<?php echo app_path ?>css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo app_path ?>css/jasny-bootstrap.min.css" rel="stylesheet" />
    <link href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script type="text/javascript" src='<?php echo app_path ?>js/jquery-3.2.0.min.js'></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src='<?php echo app_path ?>ckeditor/ckeditor.js'></script>
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a id="home" href="<?php echo app_path ?>" class="navbar-brand">My Shop</a>
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar-main" style="height: 1px;">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo app_path ?>">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" id="about" href="#">About <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo app_path ?>/about">The Company</a></li>
                            <li><a href="<?php echo app_path ?>/about">The Team</a></li>
                            <li><a href="<?php echo app_path ?>/about">The Website</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" id="products" href="#">Products <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo app_path ?>products.php">View Products</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo app_path ?>products.php?sort=price">Sort By Price</a></li>
                            <li><a href="<?php echo app_path ?>products.php?sort=name">Sort By Name</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo app_path ?>gallery.php">Gallery</a></li>
                    <li><a href="<?php echo app_path ?>gallery.php">Blog</a></li>
                    <li><a href="<?php echo app_path ?>gallery.php">Contact Us</a></li>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li id="login" class="dropdown" <?php toggleGuest() ?>>
                        <a href="<?php echo app_path?>account/login.php">Login</a>
                    </li>
                    <li id="register" class="dropdown" <?php toggleGuest() ?>>
                        <a href="<?php echo app_path?>account/register.php">Register</a>
                    </li>
                    <li id="user" class="dropdown" <?php toggleUser() ?>>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php echo $userName; ?><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo app_path ?>account/profile.php">View Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo app_path ?>account/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="clearfix">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h1><?php echo $page_title; ?></h1>
                    </div>
                </div>
            </div>
            <div class="row">
