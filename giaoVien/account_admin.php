<?php
        include '../config.php';
        session_start();
	if((isset($_SESSION['id']) == NULL) || is_user())
        {
            header("location:../index.php");
            exit();
        }
        if(isset($_POST['manage_user'])) {
                header("location:manage_user.php");
        }
        if(isset($_POST['list_users'])) {
                header("location:../listUsers.php");
        }
        if(isset($_POST['exercise'])) {
                header("location:exercise.php");
        }
        if(isset($_POST['logout'])) {
                header("location:../logout.php");
        }
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../style.css" rel="stylesheet" type="text/css"/>
        <title>LOGIN Admin</title>
</head>
<body>
        <div class="container">
                <form action="" method="POST" class="login-email">
                        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Admin</p>
                        <div class="input-group">
                                <button name="manage_user" class="btn">Student management</button>
                        </div>
                        <div class="input-group">
                                <button name="list_users" class="btn">List of users</button>
                        </div>
                        <div class="input-group">
                                <button name="exercise" class="btn">Exercise</button>
                        </div>
                        <div class="input-group">
                                <button name="logout" class="btn">Logout</button>
                        </div>
                </form>
        </div>
</body>
</html>
