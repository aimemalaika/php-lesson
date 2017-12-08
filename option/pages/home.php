<?php
  session_start();
  if (!isset($_SESSION['shopname']) AND !isset($_SESSION['tel'])) {
    header('Location: ../../index');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IHUZA | Home</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="../index2.html" class="logo">
      <span class="logo-mini">IHUZA</span>
      <span class="logo-lg"><?=$_SESSION['shopname']?></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
<ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?=$_SESSION['name']?></span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-footer">
                <div class="">
                  <a href="../php/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/boxed-bg.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['name']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="home">
            <i class="fa fa-th"></i> <span>Home</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Purchase</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="purchase/cash"><i class="fa fa-circle-o"></i> Purchase cash</a></li>
          <li><a href="purchase/credit"><i class="fa fa-circle-o"></i> Purchase credit</a></li>
          <li><a href="purchase/report"><i class="fa fa-circle-o"></i> Purchase report</a></li>
        </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Sell</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="sell/scash"><i class="fa fa-circle-o"></i> Sale cash</a></li>
            <li><a href="sell/scredit"><i class="fa fa-circle-o"></i> Sale credit</a></li>
            <li><a href="sell/sreport"><i class="fa fa-circle-o"></i> Sale report</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="inventory/asset"><i class="fa fa-circle-o"></i> Expenses tracking</a></li>
            <li><a href="inventory/stock"><i class="fa fa-circle-o"></i> Stock management</a></li>
            <li><a href="../../purchaselist"><i class="fa fa-circle-o"></i> Data table of purchase</a></li>
            <li><a href="../../selllist"><i class="fa fa-circle-o"></i> Data table of sell</a></li>
            <li><a href="../../stocklist"><i class="fa fa-circle-o"></i> Data table of stock</a></li>
            <li><a href="../../expenselist"><i class="fa fa-circle-o"></i> Data table of expense</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
    <section class="content">

     
    <div class="row">
        <h2 class="text-center">PURCHASE OPTIONS</h2>
        <div class="col-md-4">
         
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header skin-blue "> 
              <h3 class="widget-user-username">Purchase cash</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <BR>
                <li style="padding:20px";>Clicking here you will be able to manage your parchase on cash</span></li>
                <BR>
                <li><a class="text-center" href="purchase/cash">Click here to enter</a></li>
                <BR>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
         
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header skin-blue "> 
              <h3 class="widget-user-username">Purchase credit</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <BR>
                <li style="padding:20px";>Clicking here you can manage your purchase on cash</span></li>
                <BR>
                <li><a class="text-center" href="purchase/credit">Click here to enter</a></li>
                <BR>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
         
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header skin-blue "> 
              <h3 class="widget-user-username">Purchase report</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <BR>
                <li style="padding:20px";>Clicking here you can acces your purchase report</span></li>
                <BR>
                <li><a class="text-center" href="purchase/report">Click here to enter</a></li>
                <BR>
              </ul>
            </div>
          </div>
        </div>
        <h2 class="text-center">SELLS OPTIONS</h2>
        <div class="col-md-4">
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header skin-blue "> 
              <h3 class="widget-user-username">sell cash</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <BR>
                <li style="padding:20px";>Clicking here you will be able to manage your parchase on cash</span></li>
                <BR>
                <li><a class="text-center" href="sell/scash">Click here to enter</a></li>
                <BR>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
         
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header skin-blue "> 
              <h3 class="widget-user-username">sell credit</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <BR>
                <li style="padding:20px";>Clicking here you can manage your sell on cash</span></li>
                <BR>
                <li><a class="text-center" href="sell/scredit">Click here to enter</a></li>
                <BR>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header skin-blue "> 
              <h3 class="widget-user-username">sell report</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <BR>
                <li style="padding:20px";>Clicking here you can acces your sell report</span></li>
                <BR>
                <li><a class="text-center" href="sell/sreport">Click here to enter</a></li>
                <BR>
              </ul>
            </div>
          </div>
        </div>
        <h2 class="text-center">EXPENSE OPTIONS</h2>
        <div class="col-md-4">
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header skin-blue "> 
              <h3 class="widget-user-username">Expenses trackingt</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <BR>
                <li style="padding:20px";>Cliking here you will be able to record and view your expenses</span></li>
                <BR>
                <li><a class="text-center" href="inventory/asset">Click here to enter</a></li>
                <BR>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header skin-blue "> 
              <h3 class="widget-user-username">Expenses list</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <BR>
                <li style="padding:20px";>Cliking here you will be able to view full details of your expenses</span></li>
                <BR>
                <li><a class="text-center" href="../../expenselist">Click here to enter</a></li>
                <BR>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header skin-blue "> 
              <h3 class="widget-user-username">Stock list</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <BR>
                <li style="padding:20px";>Cliking here you will be able to view full details of your expenses</span></li>
                <BR>
                <li><a class="text-center" href="../../stocklist">Click here to enter</a></li>
                <BR>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header skin-blue "> 
              <h3 class="widget-user-username">Purchase list</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <BR>
                <li style="padding:20px";>Cliking here you will be able to view full details of your expenses</span></li>
                <BR>
                <li><a class="text-center" href="../../purchaselist">Click here to enter</a></li>
                <BR>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header skin-blue "> 
              <h3 class="widget-user-username">Sell list</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <BR>
                <li style="padding:20px";>Cliking here you will be able to view full details of your expenses</span></li>
                <BR>
                <li><a class="text-center" href="../../selllist">Click here to enter</a></li>
                <BR>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header skin-blue "> 
              <h3 class="widget-user-username">Stock management</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <BR>
                <li style="padding:20px";>Clicking here you will be able to manage your stock</span></li>
                <BR>
                <li><a class="text-center" href="inventory/stock">Click here to enter</a></li>
                <BR>
              </ul>
            </div>
          </div>
        </div>

      </div>
    

    </section>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>
