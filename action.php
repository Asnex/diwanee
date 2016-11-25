<?php
// Require class Diwanee and it's objects
require './class.php';
// Inputs from form, and checking does it comes from register or login form
$checker = Request::post('checker');
$user = Request::post('user');
$pass = Request::post('password');

// First case, if it comes from register form:
if($checker == 'register') :
    $checkUser = $instance->checkUser($user);
if($checkUser == 1) :
    echo 'Sorry, username have already taken!';
else :
    $checkUserLenght = $instance->checkUserLenght($user);
    $checkPassLenght = $instance->checkPassLenght($pass);
if($checkUserLenght < 4) :
    echo 'Sorry, username must be more than 3 lenght long!';
   
    elseif ($checkPassLenght < 6) :
    echo 'Sorry, password must be more than 5 lenght long!';
    else :
    echo 'Registration successful! You may now login!';
    $instance->register($user, $pass);
endif;
  
endif;


// Second case, if it comes from login form
elseif($checker == 'login') :
     $checkUserPass = $instance->checkUserPass($user, $pass);
if($checkUserPass != 1) :
    echo 'Sorry, wrong username/password!';
else :
     $instance->checkUserInfo($user, $pass);
 
     echo 'success';

endif;
else :
    // Third case, for logout case, for successfull session destroy action
    if($checker == 'logout') :
        echo 'logout_success';
    Session::destroy();
    endif;
endif;





