<?php
  session_start();
  if (!isset($_SESSION['shopname']) AND !isset($_SESSION['tel'])) {
    header('Location: ../../index');
  }
  include '../../php/bddconfig.php';
  include '../../php/insasset.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IHUZA | Expense tracking</title>
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
      
      <span class="logo-mini"><b>A</b>LT</span>
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
            <li><a href="../inventory/asset"><i class="fa fa-circle-o"></i> Asset management</a></li>
            <li><a href="../inventory/stock"><i class="fa fa-circle-o"></i> Stock management</a></li>
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
      <h1>
       Record expense
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Inventory</a></li>
        <li class="active">expnense tracking</li>
      </ol>
    </section>
        <section class="content">

      <div class="row">
        <div class="col-md-9" style="width: 100%;">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">New expense</a></li>
              <li><a href="#timeline" data-toggle="tab">Expenses report</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity" style="padding:0 15px;">
                <div class="post">
                  <div class="user-block">
                  <form method="post" action="">
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                    <label>Expense name</label>
                    <input type="text" class="form-control" placeholder="Expense name" name="expensename">
                    </li>
                    <li class="list-group-item">
                    <label>expense type</label>
                    <select class="form-control" name="expensetype">
                        <option value="Big expense">Big expense</option>
                        <option value="Medium expense">Medium expense</option>
                        <option value="Small expense">Small espense</option>
                    </select>
                    </li>
                    <li class="list-group-item">
                    <label>expense categorie</label>
                    <select class="form-control" name="categorie">
                        <option value="Purchase expense">Purchase expense</option>
                        <option value="Sell expense">Sell expense</option>
                        <option value="Other expense">Other espense</option>
                    </select>
                    </li>
                    <li class="list-group-item">
                    <label>Description</label>
                    <textarea name="description" class="form-control" placeholder="description"></textarea>
                    </li>
                     <li class="list-group-item">
                    <label>Amount</label>
                    <input type="text" class="form-control" placeholder="Amount" name="amount">
                    </li>
                  </ul>
                <center><button name="saveexpense" class="btn btn-defalt" style="background:#3c8dbc">Save expense</button></center>
                </form>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="timeline" style="padding: 0 10%;">
                  <h3 class="timeline-header"><a href="#">Expense report</a></h3>
                    <div class="post">
                  <div class="user-block">
                    <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                    <b>Purchase expense</b> <a class="pull-right"><?=$summ1?> FRW</a>
                    </li>
                    <li class="list-group-item">
                    <b>Sell expense</b> <a class="pull-right"><?=$summ2?> FRW</a>
                    </li>
                    <li class="list-group-item">
                    <b>Other expense</b> <a class="pull-right"><?=$summ3?> FRW</a>
                    </li><br><br>
                    <center><button class="btn btn-default">View full details</button>
                  </ul>
                  </div>
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
 
  <aside class="control-sidebar control-sidebar-dark">
    
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    
    <div class="tab-content">
      
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
      
        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        

      </div>
    
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
         

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
         

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
         
          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
         

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          
        </form>
      </div>
    
    </div>
  </aside>
 
  <div class="control-sidebar-bg"></div>
</div>

<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
</body>
</html>
