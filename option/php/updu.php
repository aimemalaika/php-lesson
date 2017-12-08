<?php
 session_start();
  include 'bddconfig.php';
if (isset($_POST['updu'])) {
	if (!empty($_POST['received']) AND !empty($_GET['id'])) {
		$verif = $con->prepare("SELECT * FROM `purchase` WHERE `id` = ?");
        $recu = htmlspecialchars($_POST['received']);
        $updata = $con->prepare('UPDATE `purchase` SET `received`= ? WHERE `id` = ?');
        $updata->execute(array($recu,$_GET['id']));

        $updata = $con->prepare('UPDATE `availablestock` SET `quatityreceived`= ? WHERE `id` = ?');
        $updata->execute(array($recu,$_GET['id']));

 		$_SESSION['success']= "Request done successfully";
 		header('Location: ../pages/inventory/stock');
 	}else{
 		$_SESSION['error']= "Fill the quantity";
 		 header('Location: ../pages/inventory/stock');
 	}
 }