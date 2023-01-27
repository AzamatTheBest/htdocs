<?php
session_start();
require_once('func.php');
require_once('db.php');
require_once('user.php');


if(!findInSession('user')){
    $_SESSION['error'] = 'Вы незалогинены!';
    header('Location: index.php');
}

try{
    $user = Person::loadFromDb(findInSession('user')['username']);
}catch(\Exception $e){
    $_SESSION['error'] = 'Пользователь удалён!';
    header('Location: logout.php');
}

if(isset($_GET['user'])){
    $user->delete();
    // session_destroy();
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>STEP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="col">
        <div class="error">
		    <span><?php echo findAndDelete('error'); ?></span>
	    </div>
        <form method="GET" enctype="multipart/form-data">
            <center>
                <h1>Удалить пользователя <?= $user->getUsername();?>?</h1>
                <!-- <a href="delete.php?yes=1" class="btn btn-danger">Delete</a> -->
                 <input class="btn btn-primary" type="submit" value="Delete">
            </center>
    
        </form>
    </div>
	
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

