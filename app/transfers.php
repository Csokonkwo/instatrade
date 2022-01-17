<?php 

include("../path.php"); 
require("server.php");
$pageName = "Transfers";

$transfers = selectAll('transactionz', ['user_id' => $_SESSION['id'], 'type' => 'transfer']);

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
                    <form action="transfers.php" method="post" enctype="multipart/form-data">
                        <h3>Transfer</h3>

                        <?Php if(count($errors) > 0): ?>
                            <div class="alert alert-danger">
                                <?php foreach($errors as $error): ?>
                                <li><?php echo $error; ?>.</li>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                        
                        <input id="amount" name="amount" placeholder="($) amount" value="<?php echo $amount ?>">
                        <input id="receiver_id" name="receiver_id" placeholder="Enter reciever's ID" value="<?php echo $id ?>" oninput="checkLength(this)">
                        <p style="font-size:.9em;" id="receiverResponse"> </p> <br>
                        <button type="submit" name="transfer">Submit</button>

                        
                    
                    </form>
                
                </div>
            </div>   
        </div>

        <div class="trans">
        <h3>Order History</h3>
        <?php $shares_trans = selectStaz('transactionz', 20, ['user_id' => $_SESSION['id'], 'type' => 'transfer']); ?>
        <div class="container">
            <?php foreach($shares_trans as $shares_tran): 
            if ($shares_tran['status'] == "sent"){
                $color = 'red';
            }else{
                $color = 'green';
            }
                
            ?>
            <div class="box">
                <div class="left">
                    <span><a style="color:<?php echo $color ?>;"><?php echo $shares_tran['type'] ?>, <?php echo $shares_tran['payment_method'] ?> </a></span>
                    <span>Transaction ID: <?php echo $shares_tran['id'] ?></span>
                    <span>Reference:  <?php echo $shares_tran['reference'] ?></span>
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
    
    
    <?php include("footer.php"); ?>
    
    <script src="js/ajax.js"></script>
    
</body>
</html>