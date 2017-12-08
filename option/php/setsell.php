<?php
    include 'bddconfig.php';
    $select = $con->query("SELECT * FROM `availablestock`");

    if(isset($_POST['sellapu'])){
        if(!empty($_POST['itemname']) AND !empty($_POST['quantity']) AND !empty($_POST['description']) AND !empty($_POST['comment']) AND !empty($_POST['suppliername'])){
            $name = htmlspecialchars($_POST['itemname']);
            $quantity = htmlspecialchars($_POST['quantity']);
            $description = htmlspecialchars($_POST['description']);
            $comment = htmlspecialchars($_POST['comment']);
            $clientname = htmlspecialchars($_POST['suppliername']);
            $unitprice = htmlspecialchars($_POST['unitprice']);
            $month = date("M");
            $years = date("Y");
            $datereceipt = date("d-M-Y");
            $confirmed = "confirmed";
            $payed = "cash";
            $suppliername = $_SESSION['name'];

           $insert = $con->prepare("INSERT INTO `sell`(`shopname`,`itemname`, `quantity`, `description`, `comment`, `suppliername`, `clientname`, `payed`, `confirmed`,`unitprice`, `month`, `years`, `datereceipt`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $insert->execute(array($_SESSION['shopname'],$name,$quantity,$description,$comment,$suppliername,$clientname,$payed,$confirmed,$unitprice,$month,$years,$datereceipt));

            $attac = $con->prepare("SELECT * FROM `availablestock` WHERE `shopname`=? AND `itemname`=?");
            $attac->execute(array($_SESSION['shopname'],$name));
            $element = $attac->fetch();
            $newquantity = $element['quatityreceived']-$quantity;
            $update = $con->prepare("UPDATE `availablestock` SET `quatityreceived`= ? WHERE `shopname` = ? AND `itemname` = ? ");
            $update->execute(array($newquantity,$_SESSION['shopname'],$name));

            $response = "";
        }else{
            $echec ="";
        }
    }

    if(isset($_POST['sellce'])){
        if(!empty($_POST['itemname']) AND !empty($_POST['quantity']) AND !empty($_POST['description']) AND !empty($_POST['comment']) AND !empty($_POST['suppliername'])){
            $name = htmlspecialchars($_POST['itemname']);
            $quantity = htmlspecialchars($_POST['quantity']);
            $description = htmlspecialchars($_POST['description']);
            $comment = htmlspecialchars($_POST['comment']);
            $clientname = htmlspecialchars($_POST['suppliername']);
            $unitprice = htmlspecialchars($_POST['unitprice']);
            $month = date("M");
            $years = date("Y");
            $datereceipt = date("d-M-Y");
            $confirmed = "confirmed";
            $payed = "credit";
            $suppliername = $_SESSION['name'];

            $insert = $con->prepare("INSERT INTO `sell`(`shopname`,`itemname`, `quantity`, `description`, `comment`, `suppliername`, `clientname`, `payed`, `confirmed`,`unitprice`, `month`, `years`, `datereceipt`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $insert->execute(array($_SESSION['shopname'],$name,$quantity,$description,$comment,$suppliername,$clientname,$payed,$confirmed,$unitprice,$month,$years,$datereceipt));

            $attac = $con->prepare("SELECT * FROM `availablestock` WHERE `shopname`=? AND `itemname`=?");
            $attac->execute(array($_SESSION['shopname'],$name));
            $element = $attac->fetch();
            $newquantity = $element['quatityreceived']-$quantity;
            $update = $con->prepare("UPDATE `availablestock` SET `quatityreceived`= ? WHERE `shopname` = ? AND `itemname` = ? ");
            $update->execute(array($newquantity,$_SESSION['shopname'],$name));

            $response = "";
        }else{
            $echec ="";
        }
    }
    $checkout = $con->prepare("SELECT * FROM `memberaccount` WHERE `shopname` != ?");
    $checkout->execute(array($_SESSION['shopname']));

?>