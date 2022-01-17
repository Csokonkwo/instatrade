<?php

include("../path.php"); 
require("server.php"); 

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    unset($_SESSION['referrer_id']);
    header('location: ../index.php');

    exit();
}

$pageName = "Dashboard";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php") ?>
</head>

<body>
    <?php include("header.php"); ?>    

    <div class="shares">
        <div class="container">
            <div class="left">Current Investments (USD) <span> <?php echo number_format($confirmedinvestments, 3) ?> </span> </div>
            <div class="right">
            Total Earnings: $<?php echo $confirmedInterests ?>
                <span><a href="deposits.php">Deposit</a> <a href="investments.php">Invest</a></span>
            </div>
        </div>
    </div>

    <div class="trans">
        <h3>Order History</h3>
        <?php $shares_trans = selectStaz('transactionz', 10, ['user_id' => $_SESSION['id']]); ?>
        <div class="container">
            <?php foreach($shares_trans as $shares_tran): 
            if($shares_tran['type'] == "deposit" || $shares_tran['type'] == "referral"){
                $color = 'green';
            }else if ($shares_tran['type'] == "investment"){
                $color = 'blue';
            }else if ($shares_tran['type'] == "withdrawal" || $shares_tran['status'] == "sent"){
                $color = 'red';
            }
            else if ($shares_tran['type'] == "withdrawal"){
                $color = 'red';
            }
                
            ?>
            <div class="box">
                <div class="left">
                    <span><a style="color:<?php echo $color ?>;"><?php echo $shares_tran['type'] ?></a></span>
                    <span>Transaction ID: <?php echo $shares_tran['id'] ?></span>
                    <span>Reference:  <?php echo $shares_tran['payment_method'] ?></span>
                </div>

                <div class="right">
                    <span>Order <?php echo $shares_tran['status'] ?></span>
                    <span><?php echo date('F j, Y.', strtotime($shares_tran['created_at'])); ?></span>
                    <span>$<?php echo number_format($shares_tran['amount'], 2) ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>
    
        <?php include("footer.php") ?>
    
</body>
    
</html>