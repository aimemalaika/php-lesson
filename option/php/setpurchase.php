<?php
    include 'bddconfig.php';
    $select = $con->query("SELECT * FROM `availablestock`");

    if(isset($_POST['purchasecash'])){
        if(!empty($_POST['itemname']) AND !empty($_POST['quantity']) AND !empty($_POST['description']) AND !empty($_POST['comment']) AND !empty($_POST['suppliername'])){
            $name = htmlspecialchars($_POST['itemname']);
            $quantity = htmlspecialchars($_POST['quantity']);
            $description = htmlspecialchars($_POST['description']);
            $comment = htmlspecialchars($_POST['comment']);
            $suppliername = htmlspecialchars($_POST['suppliername']);
            $month = date("M");
            $years = date("Y");
            $datereceipt = date("d-M-Y");
            $confirmed = "pending";
            $received = "pending";
            $payed = "cash";
            $clientname = $_SESSION['name'];

            $insert = $con->prepare("INSERT INTO `purchase`(`shopname`,`itemname`, `quantity`, `description`, `comment`, `suppliername`, `clientname`, `payed`,`received`, `confirmed`, `month`, `years`, `datereceipt`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $insert->execute(array($_SESSION['shopname'],$name,$quantity,$description,$comment,$suppliername,$clientname,$payed,$received,$confirmed,$month,$years,$datereceipt));

            $response = "";
        }else{
            $echec ="";
        }
    }

    if(isset($_POST['purchasecredit'])){
        if(!empty($_POST['itemname']) AND !empty($_POST['quantity']) AND !empty($_POST['description']) AND !empty($_POST['comment']) AND !empty($_POST['suppliername'])){
            $name = htmlspecialchars($_POST['itemname']);
            $quantity = htmlspecialchars($_POST['quantity']);
            $description = htmlspecialchars($_POST['description']);
            $comment = htmlspecialchars($_POST['comment']);
            $suppliername = htmlspecialchars($_POST['suppliername']);
            $month = date("M");
            $years = date("Y");
            $datereceipt = date("d-M-Y");
            $confirmed = "pending";
            $received = 0;
            $payed = "credit";
            $clientname = $_SESSION['name'];

           $insert = $con->prepare("INSERT INTO `purchase`(`shopname`,`itemname`, `quantity`, `description`, `comment`, `suppliername`, `clientname`, `payed`,`received`, `confirmed`, `month`, `years`, `datereceipt`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $insert->execute(array($_SESSION['shopname'],$name,$quantity,$description,$comment,$suppliername,$clientname,$payed,$received,$confirmed,$month,$years,$datereceipt));
            $response = "";
        }else{
            $echec ="";
        }
    }
    $checkout = $con->prepare("SELECT * FROM `accountidentifier` WHERE `shopname` != ?");
    $checkout->execute(array($_SESSION['shopname']));

?>