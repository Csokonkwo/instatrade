<?php 
include("includes/dbFunctions.php");
include("register/cronMailer.php");

//get last date from database in y-d-m format
$todayDate = date("Y-m-d");

$lastDate = selectOne('site_info', ['keyAccess' => 'last_cron_update']);


//check if date is equal to today's date else exit if equal;

if($todayDate == $lastDate['keyValue']){
    echo "Done for today";
    exit();
}


function creditUser($package, $amount, $user_id, $t_id, $payment_m){

    $percentage = 0;
    
    if($package == 'Basic'){
        $percentage = 0.50;
    }
    
    if($package == 'Standard'){
        $percentage = 1.20;
    }
    
    if($package == 'Premium'){
        $percentage = 3.00;
    }
    
    $finalPercentage = $percentage * $amount;
    
    $_GET['amount'] = $finalPercentage;
    $_GET['user_id'] = $user_id;
    $_GET['type'] = 'interest';
    $_GET['status'] = 'paid';
    
    $addInterest = createUser('interests', $_GET);
    
    $userDetail = selectOne('users', ['id'=> $_GET['user_id']]);

    $payment_m = $payment_m + 1;
    $updateNum = update('transactionz', $t_id, ['payment_method'=> $payment_m]);
    
    if(isset($userDetail)){
        sendInterestEmail($userDetail['email'], $userDetail['username'], $userDetail['id'], $package, $_GET['amount']);
    }
    
}
    

function creditLast($user_id, $t_id, $payment_m, $package, $amount){
    
    if($payment_m == 1){

        $_GET['user_id'] = $user_id;
        
        $userDetail = selectOne('users', ['id'=> $_GET['user_id']]);

        $payment_m = 'completed'; 
        $updateNum = update('transactionz', $t_id, ['status'=> $payment_m]);
        
        sendEndPlan($userDetail['email'], $userDetail['username'], $userDetail['id'], $package, $amount);
    }
    
}


$allInvestments = selectAll('transactionz', ['type' => 'investment', 'status' => 'confirmed']);

foreach($allInvestments as $investment){
// in each loop get the percentage of the investment to credit per day

    if($investment['payment_method'] == 1 && $investment['status'] == 'confirmed'){
        creditLast($investment['user_id'], $investment['id'], $investment['payment_method'], $investment['reference'], $investment['amount']);
    }

    if($investment['payment_method'] < 1){
        creditUser($investment['reference'], $investment['amount'], $investment['user_id'], $investment['id'], $investment['payment_method']);
    }

}


$updater = update('site_info', 1, ['keyValue'=> $todayDate ]);
echo "Paid";