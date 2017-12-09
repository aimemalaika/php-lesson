<?php
  session_start();
  if (!isset($_SESSION['shopname']) AND !isset($_SESSION['tel'])) {
    header('Location: ../../index');
  }
  include '../../php/bddconfig.php';
  include '../../php/createstock.php';  
  include '../../php/rapporte.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IHUZA | Stock management</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <style type="text/css">
    body::-webkit-scrollbar {
    width: 1em;
    }
     
    body::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }
     
    body::-webkit-scrollbar-thumb {
      background-color: darkgrey;
    }
  </style>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <a href="../../index2.html" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      
      <span class="logo-lg"><b>Admin</b>LTE</span>
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
          <img src="../../dist/img/boxed-bg.png" class="img-circle" alt="User Image">
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
     <?php if(isset($_SESSION['success'])){?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Message!</h4>
        <?=$_SESSION['success']?>
      </div>
      <?php unset($_SESSION['success']); }elseif(isset($_SESSION['error'])){ ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Message!</h4>
          <?=$_SESSION['error']?>
        </div>
     <?php unset($_SESSION['error']); } ?>

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
            <li><a href="../purchase/cash"><i class="fa fa-circle-o"></i> Purchase cash</a></li>
            <li><a href="../purchase/credit"><i class="fa fa-circle-o"></i> Purchase credit</a></li>
            <li><a href="../purchase/report"><i class="fa fa-circle-o"></i> Purchase report</a></li>
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
            <li><a href="../inventory/stock"><i class="fa fa-circle-o"></i> Stock management</a></li>
            <li><a href="../../../purchaselist"><i class="fa fa-circle-o"></i> Data table of purchase</a></li>
            <li><a href="../../../selllist"><i class="fa fa-circle-o"></i> Data table of sell</a></li>
            <li><a href="../../../stocklist"><i class="fa fa-circle-o"></i> Data table of stock</a></li>
            <li><a href="../../../expenselist"><i class="fa fa-circle-o"></i> Data table of expense</a></li>
          </ul>
        </li>
        <!-- <li>
          <a href="../calendar">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
          </a>
       </li> -->
      </ul>
    </section>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Report section for purchase
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Inventory</a></li>
        <li class="active">Stock</li>
      </ol>
    </section>
    <section class="content">

      <div class="row">
        <div class="col-md-3" style="max-height: $(window).height();overflow-y: scroll;">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">Stock available</h3>

              <p class="text-muted">Product name <small class="pull-right">available quantity</small></p>

              <ul class="list-group list-group-unbordered">
                <?php while ($display = $select->fetch()) {?>
                <li class="list-group-item">
                  <b><?=$display['itemname']?></b> <a class="pull-right"><?=$display['quatityreceived']?></a>
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
              <li><a href="#timeline" data-toggle="tab">Add new product to store</a></li>
              <li><a href="#timeline2" data-toggle="tab"> Detailed stock</a></li>
              <li><a href="#timeline3" data-toggle="tab"> Pending stock</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="post">
                  <div class="user-block">
                <p class="text-muted">Description <small class="pull-right">Quantity</small></p>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                    <b>Total stock purchased</b> <a class="pull-right"><?=$summ+$summ2?> Product(s)</a>
                    </li>
                    <li class="list-group-item">
                    <b>Total stock received</b> <a class="pull-right"><?=$summst?> Product(s)</a>
                    </li>
               </ul>
               <center><b class="text-center">Total stock missing : </b><a class="pull-right"><?=($summ+$summ2)-$summst?> Product(s)</a></center><br>
              <center><b class="text-center">Total stock available : </b><a class="pull-right"> <?= $summst?> Product(s)</a></center>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="timeline" style="padding: 0 20%;">
                  <p class="text-muted">New product to be sold</p>
                <form method="post">
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                    <label>Stock name</label>
                    <input type="text" class="form-control" placeholder="Product name" name="itemname">
                    </li>
                    <li class="list-group-item">
                    <label>Description</label>
                    <textarea name="description" class="form-control" placeholder="description"></textarea>
                    </li>
                  </ul>
                <center><button name="createstock" class="btn btn-defalt" style="background:#3c8dbc">Create a new stock</button></center>
                </form>
              </div>
              <div class="tab-pane" id="timeline2" style="padding: 0 20%;">
                  <h3 class="timeline-header"><a href="#">Detailed stock report</a></h3>
                   <table style="width: 100%">
                  <tr style="border-bottom: 4px solid;line-height: 35px;">
                    <th>Product name</th><th>Description</th><th>Quantity purchased</th>
                  </tr>
                  
                    <?php while ($affo = $selecte->fetch()) {?>
                    <tr style="border-bottom: 1px solid;line-height: 35px;color: skyblue;">
                      <td><?=$affo['itemname']?></td><td><?=$affo['description']?></td><td><?=$affo['quatityreceived']?></td>
                    </tr>
                    <?php } ?> 
                  
                </table>
                  
                
              </div>

              <div class="tab-pane" id="timeline3">
                  <h3 class="timeline-header"><a href="#">Pending purchase</a></h3>
                    <div class="box-body box-profile">
                      <ul class="list-group list-group-unbordered" style="display: flex;flex-wrap: wrap;">  
                      <?php while ( $replic = $recup->fetch()) {?>
                        <li class="list-group-item" style="margin-right: 20px;">
                         <table>
                           <tr style="border-bottom: 1px solid;line-height: 35px;">
                             <td><b>Product name</b></td> <td style="color: green"><b><?=$replic['itemname']?></b></td>
                           </tr>
                           <tr style="border-bottom: 1px solid;line-height: 35px;">
                             <td><b>Quantity purchased</b></td> <td style="color: green"><b><?=$replic['quantity']?></b></td>
                           </tr>
                           <tr style="border-bottom: 1px solid;line-height: 35px;">
                             <td><b>Client name</b></td> <td style="color: green"><b><?=$replic['clientname']?></b></td>
                           </tr>
                           <tr style="border-bottom: 1px solid;line-height: 35px;">
                             <td><b>Supplier name</b></td> <td style="color: green"><b><?=$replic['suppliername']?></b></td>
                           </tr>
                           <tr>
                            <form method="POST" action="../../php/updu?id=<?=$replic['id']?>">
                             <td><input class="form-control" type="text" name="received" placeholder="Quantity received"></td><td><button type="submit" class="btn btn-default" name="updu">Submit</button></td>
                            </form>
                           </tr>
                         </table>
                        </li>
                       <?php } ?>
                      </ul>
                    </div>
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
