<?php
        session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title>Login Form</title>
</head>
<body>
<?php
        include 'config.php';
        error_reporting(0);
        if(isset($_POST['submit']) && ($_POST['username']) && ($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "select * from infusers where username='".$username."' and password='". $password."'";
        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query)==0) 
        {
            echo '<script>alert("Please check your username or password!")</script>';
	    }
        while($row = mysqli_fetch_array($query))
        {
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
           
	        if(isset($_SESSION['id']))
	        {
                if($_SESSION['role'] == 0)
                {
                    echo 'Logged in successfully';
                    echo '<script type="text/javascript">window.location = "sinhvien/account_user.php"</script>';
	            }
                else
                {
                    echo 'Logged in successfully';
                    echo '<script type="text/javascript">window.location = "giaovien/account_admin.php"</script>';
	            }
            }
            else
            {
                header("location:index.php");
            }
        }
    }
?>
        <div class="container">
                <form action="" method="POST" class="login-email">
                        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                        <div class="input-group">
                                <input type="text" placeholder="Username" name="username" required>
                        </div>
                        <div class="input-group">
                                <input type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="input-group">
                                <button name="submit" class="btn">Login</button>
                        </div>
                </form>
        </div>
</body>
</html>

