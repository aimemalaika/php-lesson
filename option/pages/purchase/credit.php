<?php
   session_start();
  if (!isset($_SESSION['shopname']) AND !isset($_SESSION['tel'])) {
    header('Location: ../../index');
  }
  include '../../php/bddconfig.php';
  include '../../php/setpurchase.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IHUZA | Purchase credit</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="../../index2.html" class="logo">
      <span class="logo-mini"><b>IHUZA</span>
      <span class="logo-lg"><b><?=$_SESSION['shopname']?></span>
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
   
                  <a href="../../php/logout.php" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="../../dist/img/boxed-bg.png" class="img-circle" alt="">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['name']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <?php if(isset($response)){?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Message!</h4>
        The oprartion is passed successfully.
      </div>
      <?php }elseif(isset($echec)){ ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Message!</h4>
          You must fill all input.
        </div>
     <?php } ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>        
        <li>
          <a href="../home">
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
            <li><a href="cash"><i class="fa fa-circle-o"></i> Purchase cash</a></li>
            <li><a href="credit"><i class="fa fa-circle-o"></i> Purchase credit</a></li>
            <li><a href="report"><i class="fa fa-circle-o"></i> Purchase report</a></li>
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
            <li><a href="../sell/scash"><i class="fa fa-circle-o"></i> Sale cash</a></li>
            <li><a href="../sell/scredit"><i class="fa fa-circle-o"></i> Sale credit</a></li>
            <li><a href="../sell/sreport"><i class="fa fa-circle-o"></i> Sale report</a></li>
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
           <li><a href="../inventory/asset"><i class="fa fa-circle-o"></i> Expense management</a></li>
            <li><a href="../inventory/stock"><i class="fa fa-circle-o"></i> Stock managemenet</a></li>
            <li><a href="../
              ../../purchaselist"><i class="fa fa-circle-o"></i> Data table of purchase</a></li>
            <li><a href="../
              ../../selllist"><i class="fa fa-circle-o"></i> Data table of sell</a></li>
            <li><a href="../
              ../../stocklist"><i class="fa fa-circle-o"></i> Data table of stock</a></li>
            <li><a href="../
              ../../expenselist"><i class="fa fa-circle-o"></i> Data table of expense</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Purchase credit  block
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Purchase</a></li>
        <li class="active">Credit</li>
      </ol>
    </section>
    <section class="content">

      <div class="row">
        <div class="col-md-9" style="width:100%">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">Purchase credit</h3>

              <p class="text-muted text-center">Fill information here</p>

              <form method="post">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <label>Product name</label>
                <select name="itemname" class="form-control select2">
                <?php while ($display = $select->fetch()) {?>
                  <option value="<?=$display['itemname']?>"><?=$display['itemname']?></option>
                  <?php } ?>
                </select>
                </li>
                <li class="list-group-item">
                <label>Quantity</label>
                <input name="quantity" type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                </li>
                <li class="list-group-item">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </li>
                <li class="list-group-item">
                <label>Comment</label>
                <textarea name="comment" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </li>
                <li class="list-group-item">
                <label>Supplier name</label>
                <select name="suppliername" class="form-control select3" style="width: 100%;height: 50px;padding:13px">
                   <?php while ($affiche = $checkout->fetch()) {?>
                  <option value="<?=$affiche['shopname']?>"><?=$affiche['shopname']?></option>
                  <?php } ?>
                </select>
                </li>
              </ul>

              <button name="purchasecredit" class="btn btn-primary btn-block"><b>Submit purchase oder</b></button>
            </form>
            </div>
          </div>
      </div>

    </section>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2017 <a href="https://www.ihuza.com" target="_blanc">ihuza</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script>
  $(function () {
    $('.select2').select2();
    $('.select3').select2()
  })
</script>
</body>
</html>
