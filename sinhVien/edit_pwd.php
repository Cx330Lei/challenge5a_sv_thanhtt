<?php
        include '../config.php';
        session_start();
	    if((isset($_SESSION['id']) == NULL))
        {
            header("location:../index.php");
            exit();
        }
        $id = $_SESSION['id'];
        $sql="select * from infusers where id='".$id."'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);
        if(isset($_POST['edit']))
        {
            if($row['password'] != $_POST['opassword'])
            {
                echo "Wrong password !!!";
            }
            else
            {
                echo "ok";
                if($_POST['password'] != $_POST['cpassword'])
                {
                    echo "Password and Confirm password is not correct";
                }
                else
                {
                    $sql="update infusers set password='".$_POST['password']."' where id='".$id."'";
                    mysqli_query($conn,$sql);
                    echo '<script>alert("Edit password successfully!")</script>';
                }
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../style.css" rel="stylesheet" type="text/css"/>
        <title>Edit password</title>
	<style>
                h2 {
                    color: #0e33ef;
                    font-weight: 800;
                }
	</style>
</head>
<body>
        <div class="container">
                <form action="" method="POST" class="login-email">
                        <h2><a href="infStudent.php">Return Dashboard</a></h2>
                        <br><br>
                        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Edit password</p>
                        <div class="input-group">
                                <input type="password" placeholder="Current password" name="opassword" required>
                        </div>
                        <div class="input-group">
                                <input type="password" placeholder="New password" name="password" required>
                        </div>
                        <div class="input-group">
                                <input type="password" placeholder="Confirm Password" name="cpassword" required>
                        </div>
                        <div class="input-group">
                                <button name="edit" class="btn">Edit</button>
                        </div>
                </form>
        </div>
</body>
</html>

