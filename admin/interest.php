<?php 

include('../path.php');
include('server.php');

 $transactions = selectAll('interests');  

 if(isset($_GET['delete'])){
    $u_id = $_GET['u_id'];
    delete('interests', $u_id);
}
 
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
            <div class="content"> <i class="fa fa-calendar"> </i> All Transaction History</div>
            <div class="container">
            <?php $transactions = selectAll('interests');  ?>
            <table>
                    <thead>
                        <th>S/N</th>
                        <th>Username</th>
                        <th>T_id</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Status</th>
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
                            <td><?php echo date('F j, Y.', strtotime($transaction['created_at'])); ?></td>
                            <td><a href="edit_interest.php?edit=2&t_id=<?php echo $transaction['id'] ?>">edit</a></td>
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