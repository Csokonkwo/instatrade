<?php 

include("../path.php"); 
require("server.php");

$deposits = selectAll('transactionz', ['user_id' => $_SESSION['id'], 'type' => 'deposit']);
$pageName = "Deposits"

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php") ?>

</head>

<body>
    <?php include("header.php"); ?>
        
        <div class="deposit">
            <div class="container">
                <div class="left">
                    <h3>Deposit ($) </h3>
                    <form method="POST" enctype="multipart/form-data">

                        <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                        <?php endif ?>

                        <select name="payment_method" id="payment-method" oninput="showDepWallet()">
                            <option value="">Select Method</option>
                            <option value="bitcoin">BTC</option>
                            <option value="eth">ETH</option>
                            <option value="usdt">USDT(ERC20)</option>
                            <option value="other">Other Methods</option>
                        </select>
                        
                        <p id="wallet-address"> </p>
                       
                        <input type="text" placeholder="Enter amount only" name="amount" id="invest-amount" value="<?php echo $amount ?>">
                        
                        <input type="file"  placeholder="Select " name="reference">
                        
                        <button name="deposit" type="submit">Submit</button>
                    
                    </form>
                </div>
                
            </div>
        
        </div>
        
        <div class="trans">
        <h3>Deposit History</h3>
        <?php $shares_trans = selectStaz('transactionz', 10, ['user_id' => $_SESSION['id'], 'type' => 'deposit']); ?>
            <div class="container">
                <?php foreach($shares_trans as $shares_tran): ?>
                <div class="box">
                    <div class="left">
                        <span><a><?php echo $shares_tran['type'] ?></a></span>
                        <span>Transaction ID: <?php echo $shares_tran['id'] ?></span>
                        <span>Payment Method:  <?php echo $shares_tran['payment_method'] ?></span>
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