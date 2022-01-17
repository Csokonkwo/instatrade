<?php 

include('../path.php');
include('server.php');
include('../register/mailer.php');

if(isset($_POST['send_email'])){

    if (empty($_POST['subject'])){
        array_push($errors, 'Username is required');
    }
    if (empty($_POST['message'])){
        array_push($errors, 'Amount is required');
    }
    
    if(count($errors)==0){
        $users = selectAll('users');

        if($_POST['type'] == "verified"){
            $users = selectAll('users', ['verified'=> 1]);
        }

        if($_POST['type'] == "unverified"){
            $users = selectAll('users', ['verified'=> 0]);
        } 

        foreach($users as $user){
            $addmo = emailUsers($user['email'], $user['username'], $_POST['message'], $_POST['subject']);
        }

        if($addmo == True){
            header('location: index.php');
            exit();
            $_SESSION['message'] = "Mailer Successful";
            $_SESSION['alert-class'] = "alert-success";
        }
        else{
            echo mysqli_error($conn);
            die();
        }
       
    }

}


if(isset($_POST['send_one'])){

    if (empty($_POST['subject'])){
        array_push($errors, 'Username is required');
    }
    if (empty($_POST['message'])){
        array_push($errors, 'Amount is required');
    }
    
    if (empty($_POST['email'])){
        array_push($errors, 'email is required');
    }
    
    if(count($errors)==0){
       
        $addmo = emailUsers($_POST['email'], $_POST['username'], $_POST['message'], $_POST['subject']);
    

        if($addmo == True){
            header('location: index.php');
            exit();
            $_SESSION['message'] = "Mailer Successful";
            $_SESSION['alert-class'] = "alert-success";
        }
        else{
            echo mysqli_error($conn);
            die();
        }
       
    }

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

        <div class="deposit">
            <div class="container">
                <div class="left">
                <h3>Mailer  </h3>
                    <form action="" method="post">
                        <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                        
                        <?php endif ?>

                            <input type="text" name="subject" class="text-input" placeholder="Subject">
                            <select name="type" class="text-input">
                                <option value="all">All</option>
                                <option value="verified">Verified</option>
                                <option value="unverified">Unverified</option>
                            </select>
                            <textarea name="message" id="" cols="30" rows="10" class="text-input"></textarea>
                        
                            <button type="submit" name="send_email" class="btn btn-big">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>
        
        <div class="deposit">
            <div class="container">
                <div class="left">
                <h3>Mailer  </h3>
                    <form action="" method="post">
                        <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                        
                        <?php endif ?>

                            <input type="text" name="subject" class="text-input" placeholder="Subject">
                            <input type="email" name="email" class="text-input" placeholder="email">
                            <input type="text" name="username" class="text-input" placeholder="Username">
                            <textarea name="message" id="" cols="30" rows="10" class="text-input"></textarea>
                        
                            <button type="submit" name="send_one" class="btn btn-big">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>
        
    
    </main>
    
    
    <?php include("footer.php"); ?>
    
</body>
</html>