<?php 

include('../path.php');
include('server.php');

if(isset($_GET['status'])){
    $status = $_GET['status'];
    $t_id = $_GET['t_id'];
    update('transactionz', $t_id, ['status'=> $status]);
}

$transfers = selectAll('transactionz', ['type' => 'transfer']);
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php") ?>
    
</head>
<body>
    
    <?php include("header.php"); ?>
    
    <main>

        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert <?php echo $_SESSION['alert-class'];?> ">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['alert-class']);
                ?>
            </div>
        <?php endif ?>
        
        <div class="transaction">
            <div class="content"> <i class="fa fa-calendar"> </i> All Transfers History</div>
            <div class="container">

            <table>
                    <thead>
                        <th>SN</th>
                        <th>Username</th>
                        <th>T_id</th>
                        <th>amount</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th colspan="1">Action</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($transfers as $key => $transfer): ?>
                        <tr>
                        <?php $userT = selectOne('users', ['id' => $transfer['user_id']]); 
                        
                        if($transfer['status'] == 'received'){
                            $color='green'; 
                        }else{$color='red';}
                        
                        ?>
                            <td style="color:<?php echo $color?> "><?php echo $key + 1 ?></td>
                            <td style="color:<?php echo $color?> "><?php echo $userT['username'] ?></td>
                            <td style="color:<?php echo $color?> "><?php echo $transfer['id'] ?></td>
                            <td style="color:<?php echo $color?> "><?php echo $transfer['amount'] ?></td>
                            <td style="color:<?php echo $color?> "><?php echo $transfer['payment_method'] ?></td>
                            <td style="color:<?php echo $color?> "><?php echo $transfer['status'] ?></td>
                            <td style="color:<?php echo $color?> "><?php echo date('F j, Y.', strtotime($transfer['created_at'])) ?></td>
                            
                            <td style="color:<?php echo $color?> "><a href="transfer.php?status=cancelled&t_id=<?php echo $transfer['id']?>">Cancel</a></td>
                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </main>
    
    
    <?php include("footer.php"); ?>
    
</body>
</html>