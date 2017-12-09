<?php
 session_start();
  include 'bddconfig.php';
if (isset($_POST['upda'])) {
	if (!empty($_POST['received']) AND !empty($_GET['id'])) {
        $recu = htmlspecialchars($_POST['received']);
        $updata = $con->prepare('UPDATE `purchase` SET `unitprice`= ? WHERE `id` = ?');
        $updata->execute(array($recu,$_GET['id']));

 		$_SESSION['success']= "Request done successfully";
 		header('Location: ../pages/inventory/stock');
 	}else{
 		$_SESSION['error']= "Fill the quantity";
 		 header('Location: ../pages/inventory/stock');
 	}
 }