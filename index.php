<?php 
    session_start();
    require_once('func.php');
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
            <center><h1 style="margin-bottom: 50px;">MENU</h1></center>
            <input style="margin-bottom: 20px;" class="form-control" placeholder="Username" name="username" type="text">
            <input style="margin-bottom: 20px;" class="form-control" placeholder="Password" name="password" type="password">
            <center>
                <input class="btn btn-primary" formaction="register.php" type="submit" value="Register">
            <?php if (!findInSession('user')) {?>
                
                
                <input class="btn btn-primary" formaction="login.php" type="submit" value="Login">
            <?php }?>
            <input class="btn btn-primary" formaction="profile.php" type="submit" value="Profile">
            
	        </center>
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
