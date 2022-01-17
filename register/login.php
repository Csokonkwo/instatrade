<?php 

$pageName = 'Sign in';
include("../path.php");

require_once 'server.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<?php  include("head.php"); ?>

</head>

<body>
   

  
<main>

    <!-------------- Hero Section --------->
        
    <?php include(ROOT_PATH . "/includes/hero.php"); ?>

<div class="form">
           <div class="container">

                <form action="signin.php" method="POST" onSubmit="return validateForm(this)">
                    <h2>Member Login</h2>
                    
                    <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>

                    <div>
                        <i class="fa fa-user"></i>
                        <input id="l_user" type="text" name="user" placeholder="Username or Email" value="<?php echo $user; ?>" oninput="checkLength(this)">
                        <label id="l_user_2" for=""></label>
                    </div>

                    <div>
                        <i class="fa fa-lock"></i>
                        <input id = "pass" type="password" placeholder="Password" name="password" oninput="checkLength(this)">
                        <label id ="l_pass" for=""></label>
                    </div>

                    <div>
                        <button type="submit" name="log_in" class="btn"> Login</button>
                    </div>

                    <p class="">Not yet a member? <a href="signup.php">Sign up</a></p>
                    
                    <div style="font-size: 0.8em; text-align:center;"><a href="forgot_password.php"> forgot password?</a></div>

                </form>
           </div>
           
           <div class="right"></div>
       </div>

                    </main>


    <?php  include("../includes/footer.php"); ?>
       
</body>
</html>