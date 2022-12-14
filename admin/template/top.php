<?php include "config/auth.php"; ?>
<?php

//* Includde Koneksi Ke database
include("config/connect-db.php");


?>

<!DOCTYPE html>
    <html lang="en" class="desktop mbr-site-loaded"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>CEK PLAGIARSM</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
    <meta name="description" content="">
    <link href="assets/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/material.css">
    <link rel="stylesheet" href="assets/tether.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/socicon.min.css">
    <link rel="stylesheet" href="assets/style(1).css">
    <link rel="stylesheet" href="assets/style(2).css">
    <link href="assets/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet"> 
    <style type="text/css">.garis_inovasi{margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 5px;}</style>
    <link rel="stylesheet" href="assets/mbr-additional.css" type="text/css"><style>.cke{visibility:hidden;}</style></head><body class="  pace-done" style=""><section id="top-1" class="engine"><a href="https://mobirise.info/">Mobirise</a> Mobirise v4.5.4</section><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
    <link rel="stylesheet" href="assets/flipclock.css" type="text/css">
    <link href="assets/centerblue.css" rel="stylesheet">
    <link href="assets/main.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/jquery-ui.css">
    <script src="assets/jquery.js.download"></script>
    <script src="assets/jquery-ui.js.download"></script>
    <script src="assets/pace.min.js.download"></script>
    
    <div role="log" ariax-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"><div>Butuh bantuan kami?</div></div>
    <link rel="stylesheet" type="text/css" href="assets/css/gigo-responsive.css">

    <style type="text/css">
        :root {
          --nmain-color: #fff;
          --nmain-bg-color: #2196f3;
          --nmain-bg-color-hover: #69b2ec;
          --ncont-bg-color: #f8f8f8;
          --nhover-nav-color: #dce1ed;
        }

        #menu-2 .link{ font-size: 14px; }
        /*atur warna navbar*/
        #menu-2 .navbar,
        #menu-2 .nav-dropdown-sm,
        #menu-2 .nav-dropdown-sm .link[aria-expanded="true"],
        #menu-2 .nav-dropdown-sm .dropdown-menu {
          background: var(--nmain-bg-color);
        }

        /*atur hover menu*/
        #menu-2 .link:hover,
        #menu-2 .dropdown-item:hover,
        #menu-2 .link:focus,
        #menu-2 .dropdown-item:focus {
          color: var(--nhover-nav-color);
        }

        .gigo-responsive th {
          background-color: var(--nmain-bg-color);
          color: var(--nmain-color);
        }

        .gigo-responsive tr {
          background-color: var(--ncont-bg-color);
          border: 1px solid var(--nmain-bg-color);
        }

        .gigo-responsive tr {
          border-bottom: 3px solid var(--nmain-bg-color);
        }
      
        .gigo-responsive td {
          border-bottom: 1px solid var(--nmain-bg-color);
        }
        
        .btn-warning {
          background-color: var(--nmain-bg-color);
          border-color: var(--nmain-bg-color);
          color: var(--nmain-color);
        }

       .btn-warning:hover,
       .btn-warning:focus,
       .btn-warning.focus,
       .btn-warning:active,
       .btn-warning.active {
          color: var(--nmain-color);
          background-color: var(--nmain-bg-color-hover);
          border-color: var(--nmain-bg-color-hover);
       }

       .button {
          color: var(--nmain-color);
          background-color: var(--nmain-bg-color-hover);
          border-color: var(--nmain-bg-color-hover);
          padding: 5px 10px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 12px;
        }

    </style>
    <section id="menu-2">
        <nav class="navbar navbar-dropdown bg-color navbar-fixed-top navbar-short">
            <div class="container">
                <div class="mbr-table">
                    <div class="mbr-table-cell">
                        <div class="navbar-brand">
                            <a href="#" class="navbar-logo">
                                <img src="../img/logo2.png" alt="" title=""></a>
                            <a class="navbar-caption" href="#" style="font-size: 15px;font-weight: bold;">CEK PLAGIARSM</a>
                        </div>
                    </div>
                    <div class="mbr-table-cell">
                        <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                            <div class="hamburger-icon"></div>
                        </button>
                        <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                                    
                            <li class="nav-item"><a class="nav-link link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link link" href="kelola_dokumen.php">Kelola Dokumen</a></li>
                            <li class="nav-item"><a class="nav-link link" href="cos.php">Cosine Similarity</a></li> 
                            <li class="nav-item"><a class="nav-link link" href="euc.php">Euclidean Distance</a></li> 

                            <li class="nav-item"><a class="nav-link link" href="config/logout.php">Logout</a></li>

                        </ul>
                        
                        <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                            <div class="close-icon"></div>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </section>