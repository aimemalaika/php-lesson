<?php
   session_start();
  if (!isset($_SESSION['shopname']) AND !isset($_SESSION['tel'])) {
    header('Location: ../../index');
  }
  include '../../php/bddconfig.php';
  include '../../php/rapporte.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IHUZA | Purchase report</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
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
           <li><a href="../../../purchaselist"><i class="fa fa-circle-o"></i> Data table of purchase</a></li>
            <li><a href="../../../selllist"><i class="fa fa-circle-o"></i> Data table of sell</a></li>
            <li><a href="../../../stocklist"><i class="fa fa-circle-o"></i> Data table of stock</a></li>
            <li><a href="../../../expenselist"><i class="fa fa-circle-o"></i> Data table of expense</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Report section
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Purchase</a></li>
        <li class="active">Report</li>
      </ol>
    </section>
    <section class="content">

      <div class="row">
        <div class="col-md-3" style="max-height: 540px;overflow-y: scroll;">

          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">Stock available</h3>

              <p class="text-muted">Product name <small class="pull-right">available quantity</small></p>

              <ul class="list-group list-group-unbordered">
                <?php while ($affichage = $allstock->fetch()) {?>
                <li class="list-group-item">
                  <b><?=$affichage['itemname']?></b> <a class="pull-right"><?=$affichage['quatityreceived']?> Product(s)</a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">General report</a></li>
              <li><a href="#timeline" data-toggle="tab">Detailed purchase cash report</a></li>
              <li><a href="#timeline2" data-toggle="tab">Detailed purchase credit report</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity" style="padding:0 15px;">
                <div class="post">
                  <div class="user-block">
                    <center><b class="text-center">Total Purchase : </b><a class="pull-right"><?=$summ+$summ2?> Product(s)</a></center><br>
                    <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                    <b>Purchase cash</b> <a class="pull-right"><?=$summ?> Product(s)</a>
                    </li>
                    <li class="list-group-item">
                    <b>Purchase credit</b> <a class="pull-right"><?=$summ2?> Product(s)</a>
                    </li>
                  </ul>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="timeline" style="padding: 0 10%;">
                  <h3 class="timeline-header"><a href="#">Daily purchase cash report</a></h3>
                <center><b>Total Purchase cash : </b><a class="pull-right"><?=$summprice?> FRW</a></center><br>
                  <table style="width: 100%">
                  <tr style="border-bottom: 4px solid;line-height: 35px;">
                    <th>Product name</th><th>Description</th><th>Quantity purchased</th><th>Unit price</th><th>Total price</th>
                  </tr>
                  
                    <?php while ($affi = $alstock->fetch()) {?>
                    <tr style="border-bottom: 1px solid;line-height: 35px;color: skyblue;">
                      <td><?=$affi['itemname']?></td><td><?=$affi['description']?></td><td><?=$affi['quantity']?></td><td><?=$affi['unitprice']?> FRW</td><td><?=$affi['unitprice']*$affi['quantity']?> FRW</td>
                    </tr>
                    <?php } ?> 
                  
                </table>
              </div>
              <div class="tab-pane" id="timeline2" style="padding: 0 10%;">
                  <h3 class="timeline-header"><a href="#">Daily purchase credit report</a></h3>
                <center><b>Total Purchase credit : </b><a class="pull-right"> <?=$summprice2?> FRW</a></center><br>
                <table style="width: 100%">
                  <tr style="border-bottom: 4px solid;line-height: 35px;">
                    <th>Product name</th><th>Description</th><th>Quantity purchased</th><th>Unit price</th><th>Total price</th>
                  </tr>
                  
                    <?php while ($afi = $astock->fetch()) {?>
                    <tr style="border-bottom: 1px solid;line-height: 35px;color: skyblue;">
                      <td><?=$afi['itemname']?></td><td><?=$afi['description']?></td><td><?=$afi['quantity']?></td><td><?=$afi['unitprice']?> FRW</td><td><?=$afi['unitprice']*$afi['quantity']?> FRW</td>
                    </tr>
                    <?php } ?> 
                  
                </table>

              </div>
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
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
</body>
</html>
