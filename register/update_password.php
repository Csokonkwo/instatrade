<?php 
$pageName = 'Update_Password';
include("../path.php");
require_once 'server.php'; 

if(!isset($_SESSION['id'])){
    echo 'Not recognized';
    die();
    header('location: signin.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
        
<?php  include("head.php"); ?>

</head>

<body>
   
<?php  include("../includes/header.php"); ?>

<!-------------- Hero Section --------->
    
<?php include(ROOT_PATH . "/includes/hero.php"); ?>


<div class="form">
        <div class="container">

            <form action="update_password.php" method="POST">
                
                <h3 class="center">Update Password</h3>

                <?Php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?>.</li>
                    <?php endforeach ?>
                </div>
                <?php endif ?>

                <div><i class="fa fa-unlock"></i>
                    <input type="password" name="old_password" placeholder="Old Password" class="text-input">
                </div>

                <div><i class="fa fa-lock"></i>
                    <input type="password" name="password" placeholder="New Password" class="text-input">
                </div>

                <div><i class="fa fa-lock"></i>
                    <input type="password" name="password_2" placeholder="Confirm New Password" class="text-input">
                </div>

                <div>
                    <button type="submit" name="update_password" class="btn"> Update Password</button>
                </div>

                <p class="">Profile? <a href="../app/profile.php"> go to profile</a></p>

            </form>
            
           </div>
           
           <div class="right"></div>
       </div>




    <?php  include("../includes/footer.php"); ?>
       
</body>
</html>