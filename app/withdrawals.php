<?php

include("../path.php");
require("server.php");
$pageName = "Withdrawals";
$withdraws = selectAll('transactionz', ['user_id' => $_SESSION['id'], 'type' => 'withdrawal']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php") ?>
</head>

<body>
    <?php include("header.php") ?>
        
        <div class="deposit">
            <div class="container">
                <div class="left">
                    <h3>Withdrawal ($)</h3>
                    <form method="POST">
                        <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                        <?php endif ?>

                        <select name="payment_method" id="payment_method" oninput = "bringOut()">
                            <option value="">Please Select Method</option>
                            <option value="bitcoin">BTC</option>
                            <option value="bitcoin">USDT</option>
                        </select>
                        
                        <input type="text" placeholder="Enter amount, $<?php echo floor($balance) ?> available" name="amount" value="<?php echo $amount ?>">
                        
                        <input type="text" placeholder="Enter wallet address" name="reference" value="<?php echo $reference ?>" id="wallet_address" style = "display:none">
                        <input name="other_ref" placeholder="Bank Name" id="bank" style = "display:none">
                        <input name="other_date" placeholder="Account Number" id="banka" style = "display:none">
                        
                        <button name="withdraw" type="submit">Submit</button>
                    
                    </form>
                </div>
                
                
            
            </div>
        
        </div>

        <script>
            var payment_method = document.querySelector("#payment_method");
            var bank = document.querySelector("#bank");
            var banka = document.querySelector("#banka");
            var wallet = document.querySelector("#wallet_address");

            function bringOut(){
                if(payment_method.value == 'bank'){
                    bank.style ='display: block';
                    banka.style ='display: block';
                    wallet.style ='display: none';
                }
                if(payment_method.value == 'bitcoin' || payment_method.value == 'usdt'){
                    wallet.style ='display: block';
                    bank.style ='display: none';
                    banka.style ='display: none';
                }
                if(payment_method.value == ''){
                    bank.style ='display: none';
                    wallet.style ='display: none';
                    banka.style ='display: none';
                }

                
            }

        </script>
        
        <div class="trans">
        <h3>Withdrawal History</h3>
        <?php $shares_trans = selectStaz('transactionz', 15, ['user_id' => $_SESSION['id'], 'type' => 'withdrawal']); ?>
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
                        <span>$<?php echo floor($shares_tran['amount']) ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        
        </div>
        
        <?php include("footer.php") ?>
    
</body>
</html>