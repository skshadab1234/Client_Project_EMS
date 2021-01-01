<?php 
  require 'session.php';
  include 'reuse_files/constant.inc.php';
  include 'reuse_files/function.inc.php';
  if (!isset($_SESSION['USER_ID'])) {
        header('Location: login'.PHP_EXT);
        exit();
   }
  $sidebar = '';
  if ('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] == FRONT_SITE_PATH.'profile.php') {
    $sidebar = 'sidebar-collapse';
  }
  $page_url =  'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo FRONT_SITE_NAME ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH ?>plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH ?>plugins/daterangepicker/daterangepicker.css">
 <!-- DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap4.min.css"> 
      <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

     <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH ?>dist/css/adminlte.min.css">
   
 
</head>
  <body class="hold-transition sidebar-mini <?=  $sidebar ?>">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>    
  
    <ul class="navbar-nav ml-auto">
     <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <div class="user-panel d-flex" style="position: relative;top: -10px">
            <div class="image">
              <img src="<?php echo FRONT_SITE_PATH.$admin['picture_link'] ?>" class="img-circle " height="2.1rem" alt="User Image">
            </div>
        </div>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          <a href="profile<?= PHP_EXT ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <i class="fa fa-user-circle d-flex mr-3" ></i>
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Profile
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout<?= PHP_EXT ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <i class="fas fa-sign-out-alt d-flex mr-3" ></i>
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Logout
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
      </li>
    </ul>
</nav>
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= FRONT_SITE_PATH ?>" class="brand-link">
        <img src="<?php echo FRONT_SITE_PATH ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size: 17px;" title="<?= FRONT_SITE_NAME ?>"><?= FRONT_SITE_NAME ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo FRONT_SITE_PATH.$admin['picture_link'] ?>" class="img-circle elevation-2" height="2.1rem" alt="User Image">
          </div>
          <div class="info">
            <a href="javascript:void(0)" class="d-block"><?= $admin['first_name'].' '.$admin['last_name'] ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar nav-legacy flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <!-- Dashboard Link  -->
            <li class="nav-item">
              <a href="<?php echo FRONT_SITE_PATH ?>" class="nav-link <?php  if ($page_url == FRONT_SITE_PATH.'index.php')  {echo 'active';} ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li> 

            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link  <?php  if ($page_url == FRONT_SITE_PATH.'features.php')  {echo 'active';} ?>">
                <i class="nav-icon fas fa-key"></i>
                <p>
                  Features
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo FRONT_SITE_PATH.'features?action=viewall' ?>" class="nav-link <?php  if (isset($_GET['action']) == 'viewall')  {echo 'active';} ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Employee</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo FRONT_SITE_PATH.'features?action1=new_employee' ?>" class="nav-link <?php  if (isset($_GET['action1']) == 'new_employee')  {echo 'active';} ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              </ul>
            </li>
           
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>