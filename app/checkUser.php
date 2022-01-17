<?php


require "../includes/dbFunctions.php";
  
if(isset($_POST['receiver_id'])){

  $errors = array();

  if(strlen($_POST['receiver_id']) < 5){
    echo "Valid Id is required ";
    exit;
  }

  if (count($errors) == 0) {
    
    $userCheck = selectOne('users', ['id' => $_POST['receiver_id']]);

    if($userCheck == TRUE){
      echo $userCheck['username'];
    }else{echo"You have entered an incorrect ID";}
    
  }
}


?>