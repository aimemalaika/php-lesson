<?php 
	if (isset($_POST['saveexpense'])) {
		if (!empty($_POST['expensename']) AND !empty($_POST['expensetype']) AND !empty($_POST['description']) AND !empty($_POST['amount'])) {
			$expensename = htmlspecialchars($_POST['expensename']);
			$description = htmlspecialchars($_POST['description']);
			$expensetype = htmlspecialchars($_POST['expensetype']);
			$categorie = htmlspecialchars($_POST['categorie']);
			$amount = htmlspecialchars($_POST['amount']);
			$datecre = date("d-M-Y");
			$save = $con->prepare("INSERT INTO expense( `shopname`, `expname`, `exptype`,`categorie`, `description`, `amount`, `datecre`) VALUES (?,?,?,?,?,?,?)");
			$save->execute(array($_SESSION['shopname'],$expensename,$expensetype,$categorie,$description,$amount,$datecre));
			$response = "";
		}else{
			$echec = "";
		}
	}
	$yumrepo = "Purchase expense";
	$retieve = $con->prepare("SELECT SUM(`amount`) FROM `expense` WHERE `categorie`= ? AND `shopname`=?");
	$retieve->execute(array($yumrepo,$_SESSION['shopname']));
	 $totale = $retieve->fetch(PDO::FETCH_NUM);
	 $summ1 = $totale[0]; 


	$aptrepo = "Sell expense";
	$retiev = $con->prepare("SELECT SUM(`amount`) FROM `expense` WHERE `categorie`= ? AND `shopname`=?");
	$retiev->execute(array($aptrepo,$_SESSION['shopname']));
	 $totale = $retiev->fetch(PDO::FETCH_NUM);
	 $summ2 = $totale[0]; 


	$rpmrepo = "Other expense";
	$retie = $con->prepare("SELECT SUM(`amount`) FROM `expense` WHERE `categorie`= ? AND `shopname`=?");
	$retie->execute(array($rpmrepo,$_SESSION['shopname']));
	 $totale = $retie->fetch(PDO::FETCH_NUM);
	 $summ3 = $totale[0]; 	
?>