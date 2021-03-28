<?php


@$user = $db->query("SELECT id,picture,external_id,picture,username,email,created_at FROM users WHERE id='{$_SESSION['user_id']}'");


if($user->num_rows>0){
    $userinfo = $user->fetch_assoc();
$_SESSION['user'] = array(
            'id'          => $userinfo['id'],
            'external_id' => @$userinfo['external_id'],
            'username'    => @$userinfo['username'],
            'email'       => @$userinfo['email'],
            'pic'         => @$userinfo['picture']
);


}
else{}

