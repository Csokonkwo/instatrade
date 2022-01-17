<?php

include("../path.php");
require("server.php");
$pageName = "Earnings";
$transactions = selectAll('interests', ['user_id' => $_SESSION['id']]);

?>

<!DOCTYPE html>
<html lang="en">

<?php require("head.php") ?>

<body>
    <?php include("header.php") ?>
        
    <div class="trans">
        <h3>Interest History</h3>
        <?php $shares_trans = selectStaz('interests', 15, ['user_id' => $_SESSION['id'], 'type' => 'interest']); ?>
        <div class="container">
            <?php foreach($shares_trans as $shares_tran): ?>
            <div class="box">
                <div class="left">
                    <span>$<?php echo number_format($shares_tran['amount'], 2) ?></span>
                    <span>Transaction ID: <?php echo $shares_tran['id'] ?></span>
                </div>

                <div class="right">
                    <span>Order <?php echo $shares_tran['status'] ?></span>
                    <span><?php echo date('F j, Y.', strtotime($shares_tran['created_at'])); ?></span>
                    
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>

    <?php include("footer.php") ?>
    
</body>
</html>