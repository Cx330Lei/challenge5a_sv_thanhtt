<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../style.css">

	<title>Add user</title>
</head>
<body>
	<div class="container">
		<form action="" enctype="multipart/form-data" method="POST" class="login-email">
            <h2><a href="manage_user.php">Return Dashboard</a></h2> <br>
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Add user</p>
                        <div class="input-group">
                                <input type="text" placeholder="Username" name="username" required>
                        </div>
                        <div class="input-group">
                                <input type="text" placeholder="Full name" name="name" required>
                                </div>
                        <div class="input-group">
                                <input type="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="input-group">
                                <input type="text" placeholder="Phone number" name="phone" required>
                        </div>
                        <div class="input-group">
                                <input type="text" placeholder="Password" name="password" required>
                        </div>
                        <h3>Image</h3>
                            <input type="file" name="image"><br/><br/>
                        <div class="input-group">
                                <button name="add" class="btn">Add</button>
                        </div>
		</form>
	</div>
</body>
</html>
<?php
        include '../config.php';
	    if((isset($_SESSION['id']) == NULL) || is_user())
        {
            header("location:../index.php");
            exit();
        }
        if(isset($_POST['add']))
        {
            $username = $_POST['username'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            $image = $_FILES['image']['name'];
            $errors= array();
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_ex = pathinfo($image, PATHINFO_EXTENSION);
            $file_ext=strtolower($file_ex);
            $expensions= array("jpeg","jpg","png");
        
            if(in_array($file_ext,$expensions)=== false)
                $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
            else
            {
                if($file_size > 2097152)
                    $errors[]='Kích thước file không được lớn hơn 2MB';
                else
                {
                    $file_upload_path = '../photo/'.$image;
                    move_uploaded_file($file_tmp, $file_upload_path);
                }
            }
            $s="select * from infusers";
            $q=mysqli_query($conn,$s);
            $role = 0;
            while($r=mysqli_fetch_array($q))
            {
                if($email === $r['email'])
                {
                    echo "This email is already taken!";
                    exit();
                }
            }
            $sql="INSERT INTO `infusers` (`username`, `name`, `email`, `phone`, `password`,`role`,`image`) VALUES ('$username','$name','$email','$phone','$password','$role','$image')";
            $query = mysqli_query($conn, $sql);
            if(!$query)
            {
                echo "Add error!";
            }else
            {
                echo "Add success!";
            }
        }
?>
