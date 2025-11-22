<?php

session_start();
include "config.php" ;
$email=$_POST['email'];
$password=$_POST['password'];


 
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
  
    $sql = "SELECT * FROM admin WHERE email =:email" ;
    $stmt = $dbh->prepare($sql);
    
  
    $stmt->bindValue(':email', $email);
    
  
    $stmt->execute();
    
   
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    if($user === false){
       echo 'invalid email or password';
    } else{
         
       //decrypt passwords.
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        
        if($validPassword){
            
         
             
           $_SESSION['id'] = $user['id'];
			$_SESSION['name']=$user['name'];
			
           echo 'Login';
            exit;
            
        } else{
     
            echo 'invalid email or password';
        }
    }
  
?>

