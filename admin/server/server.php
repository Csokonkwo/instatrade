<?Php

if(!isset($_SESSION['id'])){
    header("location: ../register/signin.php");
    exit();
}

if($_SESSION['admin'] <= 3){
    header("location: ../index.php");
    exit();
}


$pendingDeposits = pendingDeposits('deposit', 'pending');
$pendingWithdrawals = pendingDeposits('withdrawal', 'pending');

?> 