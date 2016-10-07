<?php
include 'store.php';

if(isset($_POST['button'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
     $rs=login($username,$password);
     if($rs ==1){
        echo 'Login success!';
        }
		else if ($rs == 0)
		{
         echo 'Login failed!';
        }
		else{
			echo 'Failed to connect database!';
		}
    }else{
    echo 'test!';
}
?>