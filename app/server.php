<?php

require '../includes/dbFunctions.php';

if(!isset($_SESSION['id'])){
    header('location: ../register/signin.php');
    exit();
}

$ban = selectOne('users', ['id' => $_SESSION['id']]);

if($ban['ban'] == 1){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    unset($_SESSION['referrer_id']);
    
    header('location: ../index.php');
    exit();
}

$confirmedDeposits = calculateTotal('transactionz', $_SESSION['id'], 'deposit', 'confirmed');
$confirmedReferrals = calculateTotal('transactionz', $_SESSION['id'], 'referral', 'confirmed');
$confirmedInterests = calculateTotal('interests', $_SESSION['id'], 'interest', 'paid');
$confirmedCredits = calculateTotal('transactionz', $_SESSION['id'], 'transfer', 'received');

$confirmedCashouts = calculateTotal2($_SESSION['id'], 'withdrawal');
$confirmedinvestments = calculateTotal2($_SESSION['id'], 'investment');
$confirmedDebits = calculateTotal('transactionz', $_SESSION['id'], 'transfer', 'sent');

$income = $confirmedDeposits + $confirmedReferrals + $confirmedInterests + $confirmedCredits;
$expenditure = $confirmedCashouts + $confirmedinvestments + $confirmedDebits;

$balance = $income - $expenditure;
$portfolio = $balance + $confirmedinvestments;

$portfolio = number_format($portfolio, 2);

$id = '';
$amount = '';
$reference = '';
$errors = array();


if(isset($_POST['deposit'])){

    if($_POST['amount'] < 100){
        $errors['amount'] = "Minimum Deposit is $100";
    }

    if(strlen($_POST['payment_method']) < 7){
        $errors['payment_method'] = "Please choose a payment method";
    }

    if(empty($_FILES['reference']['name'])){
        $errors['image'] = "Select Proof of payment";
    }

    if(!empty($_FILES['reference']['name'])){
        $image_name = time(). "_" . $_FILES['reference']['name'];
        $destination = "img/deposits/" .$image_name;
        $result = move_uploaded_file($_FILES['reference']['tmp_name'], $destination);

        if($result){
            $_POST['reference'] = $image_name;
        }
        else{
            $errors['reference'] = "Failed to upload image";
        }
    }

    if (count($errors) === 0){
        
        $hashCheck = selectOne('transactionz', ['reference' => $_POST['reference']]);
        $pendingCheck = selectOne('transactionz', ['user_id'=> $_SESSION['id'], 'type'=> 'deposit', 'status'=> 'pending' ]);

        if($pendingCheck['status'] == 'pending'){
            $errors['pendingCheck'] = "You currently have pending Deposit";
        }

        if($hashCheck){
            $errors['pendingCheck'] = "Image already uploaded";
        }

        if (count($errors) === 0){
            unset($_POST['deposit']);
    
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['status'] = 'pending';
            $_POST['type'] = 'deposit';
            
            $makeDeposit = createUser('transactionz', $_POST);
    
            if($makeDeposit == true){
    
                $_SESSION['message'] = "Deposit pending";
                $_SESSION['alert-class'] = "alert-success";
    
                header("location: index.php");
                exit();
    
            }
            
            else {$errors['db_error'] = "Failed to make Deposit";}
        }
    
    }

    else{
        $amount = $_POST['amount'];
    }

}


if(isset($_POST['withdraw'])){

    if(strlen($_POST['reference']) < 16){
        $errors['reference'] = "Enter a valid Wallet Address";
    }

    if(strlen($_POST['payment_method']) < 7){
        $errors['payment_method'] = "Choose a payment method";
    }

    if($_POST['amount'] > $balance){
        $errors['balance'] = "Insufficient Balance";
    }

    if (count($errors) === 0){
        
        $pendingCheck = selectOne('transactionz', ['user_id'=> $_SESSION['id'], 'type'=> 'withdrawal', 'status'=> 'pending' ]);

        $refCheck = selectOne('transactionz', ['user_id'=> $_SESSION['id'], 'type'=> 'referral', 'status'=> 'confirmed' ]);

        if(!isset($refCheck)){
            $errors['pendingCheck'] = "You have no active referral yet";
        }

        if($pendingCheck['status'] == 'pending'){
            $errors['pendingCheck'] = "You have a pending withdrawal";
        }

        if($_POST['amount'] < 750){
            $errors['amount'] = "Minimum withdrawal allowed is $750";
        }

        if (count($errors) === 0){

            unset($_POST['withdraw']);

            $_POST['user_id'] = $_SESSION['id'];
            $_POST['status'] = 'pending';
            $_POST['type'] = 'withdrawal';
            
            $makeDeposit = createUser('transactionz', $_POST);
    
            if($makeDeposit == true){
    
                $_SESSION['message'] = "withdrawal Pending";
                $_SESSION['alert-class'] = "alert-success";
    
                header("location: index.php");
                exit();
    
            }
        
            else {$errors['db_error'] = "Withdrawal not successful";}

        }

    } 

    else{
        $amount = $_POST['amount'];
        $reference = $_POST['reference'];
    }

}


if(isset($_POST['invest'])){

    if($_POST['amount'] < 500){
        $errors['amount'] = "Minimum Investment allowed is $500";
    }

    if($_POST['amount'] > $balance){
        $errors['Balance'] = "Insufficient Balance for this transaction";
    }

    if(strlen($_POST['reference']) < 3){
        $errors['reference'] = "Please choose a Package";
    }

    if (count($errors) === 0){
        unset($_POST['invest']);

        $firstInvestment = calculateTotal2($_SESSION['id'], 'investment');

        if($firstInvestment == 0){

            if(strlen($_SESSION['referrer_id']) > 3){
                $amountt = $_POST['amount'] * 0.05;
                $_GET['amount'] = $amountt;
                $_GET['user_id'] = $_SESSION['referrer_id'];
                $_GET['status'] = 'confirmed';
                $_GET['type'] = 'referral';
                $_GET['payment_method'] = 'Nil';

                $payReferrer = createUser('transactionz', $_GET);
               
            }
        }

        $_POST['user_id'] = $_SESSION['id'];
        $_POST['status'] = 'confirmed';
        $_POST['type'] = 'investment';
        $_POST['payment_method'] = '0';
        
        $makeInvest = createUser('transactionz', $_POST);

        if($makeInvest == true){

            $_SESSION['message'] = "Investment Successful";
            $_SESSION['alert-class'] = "alert-success";

            header("location: index.php");
            exit();

        }
        
        else {$errors['db_error'] = "Investment unsuccessful";}
    }

    else{
        $amount = $_POST['amount'];
    }

}

if(isset($_POST['transfer'])){

    if($_POST['amount'] <= 9){
        $errors['amount'] = "Minimum transfer allowed is $10";
    }

    if($_POST['amount'] > $balance){
        $errors['balance'] = "Insufficient Balance";
    }

    if(strlen($_POST['receiver_id']) < 4){
        $errors['balance'] = "Wrong A/c number";
    }

    if($_POST['receiver_id'] == $_SESSION['id']){
        $errors['receiver_id'] = "Please check the A/c number";
    }

    if($confirmedDeposits < 500){
        $errors['balance'] = "Transfers not activated for your account";
    }

    if (count($errors) === 0){
        unset($_POST['transfer']);

        $reciever = selectOne('users', ['id' => $_POST['receiver_id']]);

        if($reciever == TRUE){

            $charge = 0.05 * $_POST['amount'];
            $_GET['user_id'] = $_POST['receiver_id'];
            $_GET['amount'] = $_POST['amount'] - $charge;
            $_GET['type'] = 'transfer';
            $_GET['status'] = 'received';
            $_GET['reference'] = $_SESSION['username'];
            $_GET['payment_method'] = 'credit';

            $sendMoney = createUser('transactionz', $_GET);

             if($sendMoney == TRUE){
                unset($_POST['receiver_id']);
                $_POST['user_id'] = $_SESSION['id'];
                $_POST['type'] = 'transfer';
                $_POST['status'] = 'sent';
                $_POST['reference'] = $reciever['username'];
                $_POST['payment_method'] = 'debit'; 
                
                $debitMoney = createUser('transactionz', $_POST);
             }

             if($debitMoney == true){

                $_SESSION['message'] = "Transfer to ". $reciever['username'] . ' Successful';
                $_SESSION['alert-class'] = "alert-success";
    
                header("location: index.php");
                exit();
    
            }else {$errors['db_error'] = "Transfer failed";}
        }
        
    }else{$amount = $_POST['amount'];}

}



if(isset($_POST['upload_image'])){

    if(empty($_FILES['image']['name'])){
        $errors['image'] = "Please select Image";
    }

    if(!empty($_FILES['image']['name'])){
        $image_name = time(). "_" . $_FILES['image']['name'];
        $destination = "img/img/" .$image_name;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if($result){
            $_POST['image'] = $image_name;
        }
        else{
            $errors['image'] = "Failed to upload Image";
        }
    }


    if (count($errors) === 0){
        unset($_POST['upload_image']);

        $updateImage = update('users', $_SESSION['id'], $_POST);

        if($updateImage  == true){

            $_SESSION['message'] = "Image uploaded Successfully";
            $_SESSION['alert-class'] = "alert-success";

            header("location: profile.php");
            exit();
        }
        
        else {$errors['db_error'] = "Failed to Upload Image, Please try to rename";}
    }
    
}



if(isset($_POST['buy_share'])){ 

    unset($_POST['buy_share']);
    
    if($price > $_POST['amount']){
        $errors['amount'] = "Minimum Transaction allowed is $100";
    }

    if($_POST['amount'] <= 99){
        $errors['amount'] = "Minimum transaction allowed is $100";
    }

    if($_POST['payment_method'] != 'goldbrick'){
        if(empty($_FILES['reference']['name'])){
            $errors['image'] = "Please Upload Proof of payment";
        }
    }

    if($_POST['payment_method'] == 'goldbrick'){
        if($_POST['amount'] > $balance){
            $errors['balance'] = "Insufficient Balance";
        }
    }


    if(count($errors) === 0){
        $_POST['type'] = 'buy';
        $_POST['status'] = 'pending';
        $_POST['price'] = $price;
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['quantity'] = $_POST['amount'] / $_POST['price'];

        if(!empty($_FILES['reference']['name'])){
            $image_name = time(). "_" . $_FILES['reference']['name'];
            $destination = "img/deposits/" .$image_name;
            $result = move_uploaded_file($_FILES['reference']['tmp_name'], $destination);
    
            if($result){
                $_POST['reference'] = $image_name;
            }
            else{
                $errors['reference'] = "Failed to upload screenshot";
            }
        }

        $buyShare = createUser('shares', $_POST);
    
            if($buyShare == true){
    
                $_SESSION['message'] = "Transaction Pending";
                $_SESSION['alert-class'] = "alert-success";
    
                header("location: shares.php");
                exit();
    
            }
            
            else {$errors['db_error'] = "Transaction Failed";}
    }

    
}



if(isset($_POST['sell_share'])){ 

    unset($_POST['sell_share']);
    
    if($price > $_POST['amount']){
        $errors['amount'] = "Minimum Transaction allowed is $100";
    }

    if($_POST['amount'] <= 99){
        $errors['amount'] = "Minimum transaction allowed is $100";
    }

    if($_POST['amount'] > $qty){
        $errors['amount'] = "Not Enough Shares for this amount";
    }

    $pendingCheck = selectOne('shares', ['user_id'=> $_SESSION['id'], 'type'=> 'sell', 'status'=> 'pending' ]);

    if($pendingCheck){
        $errors['pendingCheck'] = "You have a pending Transaction";
    }

    if(count($errors) === 0){
        $_POST['type'] = 'sell';
        $_POST['status'] = 'pending';
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['price'] = $price;
        $_POST['quantity'] = $_POST['amount'] / $_POST['price'];

        $sellShare = createUser('shares', $_POST);
    
            if($sellShare == true){
    
                $_SESSION['message'] = "Transaction Pending";
                $_SESSION['alert-class'] = "alert-success";
    
                header("location: shares.php");
                exit();
    
            }
            
            else {$errors['db_error'] = "Transaction Failed";}
    }

    
}


?>