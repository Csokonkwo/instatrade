<?php

include("../path.php");
require("server.php");

$pageName = "Shares";
$shares = selectAll('shares', ['user_id' => $_SESSION['id']]);

if(isset($_SESSION['stock'])){
    unset($_SESSION['stock']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php include("head.php") ?>
<link rel="stylesheet" href="css/shares.css">
</head>

<body>
    <script> 

    var balance = <?php echo floor($balance); ?> 

    </script>
    <?php include("header.php") ?>
        
    <div class="shares">
        <div class="container">
            <div class="left">Equity Value (USD) <span> <?php echo number_format($qty, 5) ?> </span> </div>
            <div class="right">
            Current Price: $<?php echo $price ?>
                <span><a href="buy.php">Buy</a> <a href="sell.php">Sell</a></span>
            </div>
        </div>
    </div>

    <div class="trans">
        <h3>Order History</h3>
        <?php $shares_trans = selectAll('shares', ['user_id' => $_SESSION['id']]); ?>
        <div class="container">
            <?php foreach($shares_trans as $shares_tran): 
            if($shares_tran['type'] == "buy"){
                $color = 'green';
            }else{$color = 'red';}
                
            ?>
            <div class="box">
                <div class="left">
                    <span><a style="color:<?php echo $color ?>; text-transform:capitalize"><?php echo $shares_tran['type'] ?></a> GBAS</span>
                    <span>Price $<?php echo $shares_tran['price'] ?></span>
                    <span>Quantity <?php echo number_format($shares_tran['quantity'], 2) ?>GBAS</span>
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

    <script src="<?php echo BASE_URL .'/js/calculator.js'?>"></script>
    
</body>
</html>