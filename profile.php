<?php
session_start();
require_once('func.php');
require_once('db.php');

if(!findInSession('user')){
    $_SESSION['error'] = 'Вы незалогинены!';
    header('Location: index.php');
}
$user = findUser(findInSession('user')['username'], true);
if(!$user){
    $_SESSION['error'] = 'Пользователь удалён!';
    header('Location: logout.php');
}
if (isset($_POST['user'])){
    editUser($user, $_POST['user']);
}
function editUser($user, $formUser){
    
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
        <form method="POST">
            <input class="form-control" placeholder="Username" name="user[username]" type="text" value="<?= $user['username']; ?>">
            <input  class="form-control" placeholder="Password" name="user[password]" type="password" >
            <input class="form-control" placeholder="Email" name="user[email]" type="text" value="<?= $user['email']; ?>">
            <input class="form-control" placeholder="Location" name="user[location]" type="text" value="<?= $user['location']; ?>">
            <input class="form-control" placeholder="Link" name="user[link]" type="text" value="<?= $user['link']; ?>">
            <input class="form-control" placeholder="Image" name="user[image]" type="file">
            <input class="btn btn-primary" type="submit" value="Save">
            <input class="btn btn-primary" formaction="index.php" type="submit" value="Index">
        </form>
        <div class="col">
            <?php if (isset(findInSession('user')['username'])) {?>
                <span><?= 'Username: ' . findInSession('user')['username']; ?></span>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            <?php }?>
        </div>
    </div>
	
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
