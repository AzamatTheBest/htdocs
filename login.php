<?php
session_start();
require_once('func.php');
require_once('db.php');

$username = find('username');

$password = find('password');

try{
    authenticate($username, $password);
} catch(\Exception $e){
    $_SESSION['error'] = $e->getMessage();
}

// if($password && $username){
//     if( $user = findUser(find('username'))){
//         if(!password_verify($password, $user['password'])){
//             $_SESSION['error'] = 'Пароль не верен!';
//             header("Location: index.php");
//         }
//         else{
//             $_SESSION['error'] = '';
//             header("Location: home.php");
//         }
//     } else{
//         $_SESSION['error'] = 'Пользователь не найден!';
//         header("Location: index.php");
//     }
   
    
// } else{
//     $_SESSION['error'] = 'Нужно заполнить все поля';
//     header("Location: index.php");
// }

function authenticate(?string $username, ?string $password){
    if(!$username || !$password){
        throw new \Exception('Заполните все поля!');
    }
    if(!$user = findUser($username)){
        throw new \Exception('Пользователь не найден!');
    }
    if(!password_verify($password, $user['password'])){
        throw new \Exception('Пароль не верен!');
    }
    unset($user['password']);
    $_SESSION['user'] = $user;
}

header("Location: index.php");