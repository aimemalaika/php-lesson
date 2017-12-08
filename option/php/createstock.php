<?php
if(isset($_POST['createstock'])){
    if(!empty($_POST['itemname']) AND !empty($_POST['description'])){
        $name = htmlspecialchars($_POST['itemname']);
        $description= htmlspecialchars($_POST['description']);
        $received = 0;
        $month = date("M");
        $years = date("Y");
        $datereceipt = date("d-M-Y");
        
        $insert = $con->prepare("INSERT INTO `availablestock`(`shopname`,`itemname`, `description`, `quatityreceived`, `month`, `years`, `datereceipt`) VALUES (?,?,?,?,?,?,?)");
        $insert->execute(array($_SESSION['shopname'],$name,$description,$received,$month,$years,$datereceipt));
        $response = "";
    }else{
        $echec ="";
    }
}
    $select = $con->prepare("SELECT * FROM `availablestock` WHERE shopname= ? ");
    $select->execute(array($_SESSION['shopname']));

     $queryst = $con->prepare("SELECT SUM(`quatityreceived`) FROM `availablestock` WHERE `shopname` = ?" );
      $queryst->execute(array($_SESSION['shopname']));   
      $totale = $queryst->fetch(PDO::FETCH_NUM);
      $summst = $totale[0]; 

       $selecte = $con->prepare("SELECT * FROM `availablestock` WHERE shopname=?");
    $selecte->execute(array($_SESSION['shopname']));

    $recup = $con->query('SELECT * FROM `purchase` WHERE `received` = 0 AND `confirmed` = "pending" ');

    
?>