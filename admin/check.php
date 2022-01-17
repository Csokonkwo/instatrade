<?php 

include('../path.php');

include('server.php');

if(isset($_GET['status'])){
    $status = $_GET['status'];
    $t_id = $_GET['t_id'];
    update('transactionz', $t_id, ['status'=> $status]);
}

$deposit = selectOne('transactionz', ['id'=>$_GET['t_id'], 'type' => 'deposit']);
$userT = selectOne('users', ['id' => $deposit['user_id']]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php") ?>

    <style>
        img{
            display:block;
            margin:20px auto;
            max-width:500px;
        }

        h3{
            text-transform:capitalize;
        }
    
    </style>
    
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

        <div class="table">
            <h3><?php echo $userT['username']. "'s" ?> Deposit</h3>
            <table>
                <thead>
                    <th>Username</th>
                    <th>T_id</th>
                    <th>amount</th>
                    <th>Currency</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th colspan="3">Action</th>
                </thead>
                
                <tbody>
                    <tr>
                        <td><?php echo $userT['username'] ?></td>
                        <td><?php echo $deposit['id'] ?></td>
                        <td><?php echo $deposit['amount'] ?></td>
                        <td><?php echo $deposit['payment_method'] ?></td>
                        <td><?php echo $deposit['type'] ?></td>
                        <td><?php echo $deposit['status'] ?></td>
                        <td><?php echo date('F j, Y.', strtotime($deposit['created_at'])) ?></td>
                        
                        <td><a href="deposit.php?status=pending&t_id=<?php echo $deposit['id']?>" >Pending</a></td>
                        <td><a href="deposit.php?status=confirmed&t_id=<?php echo $deposit['id']?>" >Confirm</a></td>
                    
                        <td><a href="deposit.php?status=cancelled&t_id=<?php echo $deposit['id']?>">Cancel</a></td>
                        
                    </tr>
                </tbody>

            </table>

            <img src="<?php echo '../app/img/deposits/'. $deposit['reference']; ?>">

        </div>
        
    </main>
    
    
    <?php include("footer.php"); ?>
    
</body>
</html>