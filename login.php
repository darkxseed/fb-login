<?php 


if(isset($_POST['login'])){

    if(empty($_POST['username']) || empty($_POST['password'])){
        echo "please enter your credentials";
    }

    else{
        $password = md5($_POST['password']);
        $log = $db->query("SELECT id from users WHERE username='{$_POST['username']}' && password='{$password}'");

       @ $check = $log->num_rows;


        if($check>0){

            $r= $log->fetch_assoc();
           $_SESSION['user_id'] = $r['id'];
           include "redirect.php";
        }
        else{
            echo "Your password or username is incorrect!";
        }
        



    }
}

