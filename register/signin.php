<?php 

$pageName = 'Sign in';
include("../path.php");

require_once 'server.php'; 

if(isset($_GET['password-token'])){
    $passwordToken = $_GET['password-token'];
    updatePassword($passwordToken);
}

if(isset($_GET['token'])){
    $token = $_GET['token'];
    verifyUser($token);
}

if(isset($_SESSION['id'])){
    header("location: ../app/index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<?php  include("head.php"); ?>

</head>

<body>
   
<?php  include("../includes/header.php"); ?>

<main>

    <div class="form">
           <div class="container">

                <form action="signin.php" method="POST" onSubmit="return validateForm(this)">
                    <h2>Sign in to your account</h2>
                    
                    <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>

                    <br> <br>
                    <span>Username Or Email</span>
                    <div>
                        <i class="fa fa-user"></i>
                        <input id="l_user" type="text" name="user" placeholder="Username or Email" value="<?php echo $user; ?>" oninput="checkLength(this)">
                        <label id="l_user_2" for=""></label>
                    </div>

                    <span>Password</span>
                    <div>
                        <i class="fa fa-lock"></i>
                        <input id = "pass" type="password" placeholder="Password" name="password" oninput="checkLength(this)">
                        <label id ="l_pass" for=""></label>
                    </div>

                    <div>
                        <button type="submit" name="sign_in" class="btn"> Login</button>
                    </div>

                    <p>New to <a style= "text-transform: capitalize; display : inline; "><?php echo $companyName; ?></a>? <a href="signup.php">Sign up</a></p>
                    
                    <div style="font-size: 0.8em; text-align:center;"><a href="forgot_password.php"> forgot password?</a></div>

                </form>
           </div>
           
           <div class="right"></div>
       </div>

                    </main>


    <?php  include("../includes/footer.php"); ?>
       
</body>
</html>