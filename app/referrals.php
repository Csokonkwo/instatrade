<?php

include("../path.php");
require("server.php");
$pageName = "Referrals";
$user = selectOne('users', ['id' => $_SESSION['id']]);
$referrals = selectAll('users', ['referrer_id' => $_SESSION['id']]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include("head.php") ?>
</head>

<body>
    <?php include("header.php") ?>

    <div class="profile"> 
           <div class="container">
               
               <div class="right">
                   
                   <div class="content">
                       <h2>My Referral Information</h2>
                       <p>My Upline <span><?php $referrer = selectOne('users', ['id' => $_SESSION['referrer_id']]); if(isset($referrer['username'])){echo $referrer['username'];} else{ echo 'None';} ?></span></p>
                       <p>My Referrals<span><?php echo count($referrals)?></span></p>
                       <p>My Referral Earnings<span>$<?php echo $confirmedReferrals; ?></span></p>
                       <p>
                            My Referral Link: <br> <br> <input type="text" id="myInput" value="https://<?php echo $companyEmail?>.com/register/signup.php?ref=<?php echo $_SESSION['id'] ?>"> <button onclick="copyItem()">Copy Link</button>
                            <br><br> https://<?php echo $companyEmail?>.com/register/signup.php?ref=<?php echo $_SESSION['id'] ?>
                       </p>
                   </div>
               </div>
           
           </div>
        </div>
        
        
        
        <div class="trans">
        <h3>Referrals</h3>
            <div class="container">
                <?php foreach($referrals as $key => $referral): ?>
                <div class="box">
                    <div class="left">
                        <span><a><?php echo $key + 1 ?></a></span>
                        <span><?php echo $referral['username'] ?></span>
                    </div>

                    <div class="right">
                        <span><?php echo date('F j, Y.', strtotime($referral['created_at'])); ?></span>
                        <span><?php echo $referral['email'] ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        
        </div>
        
        <?php include("footer.php") ?>
    
</body>
</html>