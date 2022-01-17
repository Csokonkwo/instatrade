<?php 

include('../path.php');
include('server.php');

$table = "transactionz";

if(isset($_POST['edit'])){
    $t_id = $_POST['t_id'];
    unset($_POST['edit']);
    unset($_POST['t_id']);
    update($table, $t_id, $_POST);

    if($table == "transactionz"){
        header('location: history.php');
    }
}

$transaction = selectOne($table, ['id' => $_GET['t_id']]);
 
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

        <div class="deposit">
            <div class="container">
                <div class="left">
                <h3>Edit Transaction ($) </h3>
                    <form action="" method="post">
                        <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                        
                        <?php endif ?>
                        
                            <input type="hidden" name="t_id" value= "<?php echo $transaction['id'] ?>">

                            <input type="text" name="amount" class="text-input" value= "<?php echo $transaction['amount'] ?>" placeholder="Amount">

                            <input type="text" name="type" class="text-input" value= "<?php echo $transaction['type']; ?>" placeholder="type">

                            <input type="text" name="status" class="text-input" value= "<?php echo $transaction['status'] ?>" placeholder="Status">

                            <input type="text" name="payment_method" class="text-input" value= "<?php echo $transaction['payment_method'] ?>" placeholder="Payment methold">
                            
                            <input type="text" name="reference" class="text-input" value= "<?php echo $transaction['reference'] ?>" placeholder="Reference">

                            <input type="text" name="created_at" class="text-input" value= "<?php echo $transaction['created_at'] ?>" placeholder="Amount">
                        
                            <button type="submit" name="edit" class="btn btn-big">Edit</button>
                        
                    </form>
                </div>
            </div>
        </div>

        <div class="transaction">
            <div class="content"> <i class="fa fa-calendar"> </i> All Transaction History</div>
            <div class="container">
            <?php $transactions = selectAll($table);  ?>
            <table>
                    <thead>
                        <th>S/N</th>
                        <th>Username</th>
                        <th>T_id</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Payment method</th>
                        <th>Reference</th>
                        <th>Date</th>
                        <th colspan ="2">Action</th>
                    </thead>
                    <tbody>
                    <?php foreach ($transactions as $key => $transaction): ?>
                        <tr>
                        <?php $userT = selectOne('users', ['id' => $transaction['user_id']]);  ?>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $userT['username'] ?></td>
                            <td><?php echo $transaction['id'] ?></td>
                            <td><?php echo '$'. $transaction['amount'] ?></td>
                            <td><?php echo $transaction['type'] ?></td>
                            <td><?php echo $transaction['status'] ?></td>
                            <td><?php echo $transaction['payment_method'] ?></td>
                            <td><?php echo $transaction['reference'] ?></td>
                            <td><?php echo date('F j, Y.', strtotime($transaction['created_at'])); ?></td>
                            <td><a href="edit.php?edit=2&t_id=<?php echo $transaction['id'] ?>">edit</a></td>
                            <td><a href="interest.php?delete=1&u_id=<?php echo $transaction['id'] ?>">delete</a></td>
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