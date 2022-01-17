<?php

include("../path.php");
require("server.php");
$pageName = "Profile";
$user = selectOne('users', ['id' => $_SESSION['id']]);

if(isset($_SESSION['business'])){
    $business = selectOne('address', ['user_id' => $_SESSION['id']]);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require("head.php") ?>

<body>
    <?php include("header.php") ?>
        
       <div class="profile"> 
           <div class="container">
               <div class="left">

                   <h2>Profile</h2>
                   <?php $status = selectOneDesc('transactionz', ['user_id' => $_SESSION['id'], 'type' => 'investment']) ?>
                   <p><i class = "fas fa-user-check"></i> <?php if(isset($_SESSION['business'])) {echo "Business";} else{echo "Personal";} ?> account</p>
                   <p><i class = "fas fa-user-clock"></i> Joined <?php echo date('F j, Y.', strtotime($user['created_at'])) ?></p>
                   <p><i class = "fas fa-home"></i> Lives in <?php echo $user['country']; ?></p>

                   <h2>Account Information</h2>

                   <?php if($user['verified']){$verified_color = "green";} else{$verified_color = "red";}  ?>
                   <p style = "text-transform: none; color:<?php echo $verified_color ?>">Account is <?php if($user['verified']){echo 'Verified <i class = "fas fa-user-check"></i> ';} else{echo "yet to be Verified <i class = 'fas fa-user-times'></i>"; }?></p>
                   
                   <?php $status = selectOne('transactionz', ['user_id' => $_SESSION['id'], 'type' => 'deposit', 'status' => 'confirmed']);
                   if(isset($status)){$status_color = "green";} else{$status_color = "red";} 
                   ?>
                   <p style = "color:<?php echo $status_color ?>">Status <a><?php if(isset($status)){echo 'Active';} else{echo "Inactive"; }?> </a></p>
                   <p>Portfolio<a>$<?php echo $portfolio ?></a></p>                    
                   
                   <?php $referrer = selectOne('users', ['id' => $user['referrer_id']]); ?>
                   <p>Upline <a><?php if(isset($referrer['username'])){echo $referrer['username'];} else{ echo "None";} ?></a></p>
                   
                   <?php if(!isset($user['image'])): ?>
                   <form method="POST" enctype="multipart/form-data">
                        <?Php if(count($errors) > 0): ?>
                            <div class="alert alert-danger">
                                <?php foreach($errors as $error): ?>
                                <li><?php echo $error; ?>.</li>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                       <input type="file" name="image" enctype="multipart/form-data">
                       <button type="submit" name="upload_image"> Upload Profile Photo</button>
                   </form>
                    <?php endif; ?>
               </div>
               
               <div class="right">
                   <div class="head">
                       <a href="../register/update_profile.php">Update Profile</a>
                       <a href="../register/update_password.php">Change Password</a>
                   </div>
                   
                   <div class="content">
                       <h2>Basic Information</h2>
                       <?php if(!isset($user['firstname'])) : $user_color = "red";   ?>
                       <p style = "color:<?php echo $user_color ?>; text-transform: none">Your profile is yet to be updated, <a style ="color:' . $user_color . '" href="../register/update_profile.php"> Update Profile Here. </a> </p>
                       <p>Unique ID <span><?php echo $user['id'] ?></span></p>
                       <p>Username <span><?php echo $user['username'] ?></span></p>
                       <p>Email<span><?php echo $user['email'] ?></span></p>

                       <?php else: $user_color = "green"; ?>
                       <p>Username <span><?php echo $user['username'] ?></span></p>
                       <p>Email<span><?php echo $user['email'] ?></span></p>
                       <p style = "color:<?php echo $user_color ?>">Fullname <span><?php if(isset($user['firstname'])){echo $user['firstname'] . ' '; echo $user['lastname'] ;} ?> </span></p>
                       <p style = "color:<?php echo $user_color ?>">Mobile<span><?php if(isset($user['phone'])){echo $user['phone'];} ?></span></p>
                       
                       
                       <?php if(!isset($_SESSION['business'])):?>
                       <p style = "color:<?php echo $user_color ?>">Gender<span><?php if(isset($user['gender'])){echo $user['gender'];} ?></span></p>
                       <?php else: ?>
                        
                        <p>Street<span><?php echo $business['street'] ?></span></p>
                        <p>City<span><?php echo $business['city'] ?></span></p>
                        <p>State<span><?php echo $business['state'] ?></span></p>
                        
                        <?php endif; ?>
                       
                       <?php endif; ?>

                   </div>

                   <div class="content">
                       <h2>Account Information</h2>

                       <p>
                            Referral Link: <br> <br> <input type="text" id="myInput" value="https://<?php echo $companyEmail?>.com/register/signup.php?ref=<?php echo $_SESSION['id'] ?>"> <button onclick="copyItem()">Copy Link</button>
                            <br><br> https://<?php echo $companyEmail?>.com/register/signup.php?ref=<?php echo $_SESSION['id'] ?>
                       </p>
                       
                   </div>
               </div>
           
           </div>
        </div>
        
        
        
        <?php include("footer.php") ?>
    
</body>
</html>