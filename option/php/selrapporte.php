<?php  
	$datereceipt = date("d-M-Y");
	$allstock = $con->prepare("SELECT * FROM `availablestock` WHERE `shopname` = ?");
	$allstock->execute(array($_SESSION['shopname']));

	$alstock = $con->prepare("SELECT * FROM `sell` WHERE `shopname` = ?  AND `payed` = ? AND datereceipt = ?");
	$alstock->execute(array($_SESSION['shopname'],"cash",$datereceipt));

	$astock = $con->prepare("SELECT * FROM `sell` WHERE `shopname` = ?  AND `payed` = ? AND datereceipt = ?");
	$astock->execute(array($_SESSION['shopname'],"credit",$datereceipt));

	 $query = $con->prepare("SELECT SUM(`quantity`) FROM `sell` WHERE `shopname` = ? AND `payed` = ?" );
	  $query->execute(array($_SESSION['shopname'],"cash"));   
	  $totale = $query->fetch(PDO::FETCH_NUM);
	  $summ = $totale[0]; 

	 $query2 = $con->prepare("SELECT SUM(`quantity`) FROM `sell` WHERE `shopname` = ? AND `payed` = ?" );
	  $query2->execute(array($_SESSION['shopname'],"credit"));   
	  $totale = $query2->fetch(PDO::FETCH_NUM);
	  $summ2 = $totale[0];

	  $queryprice = $con->prepare("SELECT SUM(`quantity`*`unitprice`) FROM `sell` WHERE `shopname` = ? AND `payed` = ? AND datereceipt = ?" );
	  $queryprice->execute(array($_SESSION['shopname'],"cash",$datereceipt));   
	  $totale = $queryprice->fetch(PDO::FETCH_NUM);
	  $summprice = $totale[0]; 

	 $queryprice2 = $con->prepare("SELECT SUM(`quantity`*`unitprice`) FROM `sell` WHERE `shopname` = ? AND `payed` = ? AND datereceipt = ?" );
	  $queryprice2->execute(array($_SESSION['shopname'],"credit",$datereceipt));   
	  $totale = $queryprice2->fetch(PDO::FETCH_NUM);
	  $summprice2 = $totale[0];
	  
	  $price= 0;
	  $raport = $con->prepare("SELECT * FROM `purchase` WHERE `shopname` = ? AND `unitprice` = ?");
	  $raport->execute(array($_SESSION['shopname'],$price));

?>