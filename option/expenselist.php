<?php
  session_start();
  if (!isset($_SESSION['shopname']) AND !isset($_SESSION['tel'])) {
    header('Location: index');
  }
  include '../php/bddprincipal.php';
  $select= $con->prepare("SELECT * FROM `expense` WHERE `shopname`=?");
  $select->execute(array($_SESSION['shopname']));
?>
<!DOCTYPE html> 
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="../style/maintable.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="sidebar-mini fixed">
          <h1 style="font-family: cursive;color: blue;padding-left: 20px;">Expnense table  <a style="float: right;padding-right:20px;font-size:20px;" href="javascript:history.back()">Go back</a></h1>
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered;margin-top:20px" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Expense name</th>
                      <th>Expense type</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Amount</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    while ($list=$select->fetch()) {?>
                    <tr>
                      <td><?=$list['expname']?></td>
                      <td><?=$list['exptype']?></td>
                      <td><?=$list['categorie']?></td>
                      <td><?=$list['description']?></td>
                      <td><?=$list['amount']?> FRW</td>
                      <td><?=$list['datecre']?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    <!-- Javascripts-->
    <script src="../script/jquery-2.1.4.min.js"></script>
    <script src="../script/bootstrap.min.js"></script>
    <script src="../script/plugins/pace.min.js"></script>
    <script src="../script/maintable.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../script/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../script/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  </body>
</html>
