<?php 

include('../path.php');
include('server.php');

include('../register/mailer.php');

if(isset($_GET['status'])){
    $status = $_GET['status'];
    $t_id = $_GET['t_id'];
    update('transactionz', $t_id, ['status'=> $status]);
    if(isset($_GET['u_id'])){
        $hash = bin2hex(random_bytes(30));
        $casUser = selectOne('users', ['id' => $_GET['u_id']]);
        sendCashoutConfirm($casUser['email'], $casUser['username'], $_GET['a_id'], $hash);
    }
}

$withdraws = selectAll('transactionz', ['type' => 'withdrawal']);

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
            <div class="content"> <i class="fa fa-calendar"> </i> All withdrawal History</div>
            <div class="container">
            <table>
                    <thead>
                        <th>SN</th>
                        <th>Username</th>
                        <th>T_id</th>
                        <th>amount</th>
                        <th>currency</th>
                        <th>Wallet Address</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th colspan="2">Action</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($withdraws as $key => $withdraw): ?>
                        <tr>
                        <?php $userT = selectOne('users', ['id' => $withdraw['user_id']]); ?>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $userT['username'] ?></td>
                            <td><?php echo $withdraw['id'] ?></td>
                            <td><?php echo $withdraw['amount'] ?></td>
                            <td><?php echo $withdraw['payment_method'] ?></td>
                            <td><?php echo $withdraw['reference'] ?></td>
                            <td><?php echo $withdraw['type'] ?></td>
                            <td><?php echo $withdraw['status'] ?></td>
                            <td><?php echo $withdraw['created_at'] ?></td>
                            
                            <?php if($withdraw['status'] != 'paid'): ?>
                            <td><a href="withdraw.php?status=paid&t_id=<?php echo $withdraw['id']?>&u_id=<?php echo $withdraw['user_id'] ?>&a_id=<?php echo $withdraw['amount'] ?>"> Paid</a></td>
                            <?php endif; ?>
                            <td><a href="withdraw.php?status=cancelled&t_id=<?php echo $withdraw['id']?>">Cancel</a></td>                       
                        
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