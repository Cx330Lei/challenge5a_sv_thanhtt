<?php
        include '../config.php';
        session_start();
	    if((isset($_SESSION['id']) == NULL) || is_user())
        {
            header("location:../index.php");
            exit();
        }
        $id = $_GET['id'];
        $sql="select * from infusers where id='".$id."'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);

        if(isset($_POST['edit']))
        {         
            //Nếu $_POST['password'] = $row['password'] có nghĩa là giáo viên không thay đổi password
            if($_POST['password'] != $row['password'])
            {
                if($_POST['cpassword'] == NULL)
                {
                    echo '<script>alert("Please enter all fields!")</script>';
                }
                else
                {
                    if($_POST['password'] != $_POST['cpassword'])
                    {
                        echo "Password and Confirm password is not correct";
                    }
                    else
                    {
                        $sql="update infusers set username='".$_POST['username']."', name='".$_POST['name']."', email='".$_POST['email']."', phone='".$_POST['phone']."', password='".$_POST['password']."' where id='".$id."'";
                        mysqli_query($conn,$sql);
                        $sql="select * from infusers where id='".$id."'";
                        $query=mysqli_query($conn,$sql);
                        if(!$query)
                        {
                            echo "Error!";
                        }else
                        {
                            echo "Success!";
                        }
                        $row=mysqli_fetch_array($query);
                    }
                }
            }
            else
            {
                $sql="update infusers set username='".$_POST['username']."', name='".$_POST['name']."', email='".$_POST['email']."', phone='".$_POST['phone']."' where id='".$id."'";
                mysqli_query($conn,$sql);
                $sql="select * from infusers where id='".$id."'";
                $query=mysqli_query($conn,$sql);
                if(!$query)
                {
                    echo "Error!";
                }else
                {
                    echo "Success!";
                }
                $row=mysqli_fetch_array($query);
            }
        }
        if(isset($_POST['submit']))
        {
            $image = $_FILES['image']['name'];
            $errors= array();
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_ex = pathinfo($image, PATHINFO_EXTENSION);
            $file_ext=strtolower($file_ex);
            $expensions= array("jpeg","jpg","png");
        
            if(in_array($file_ext,$expensions)=== false)
                $errors[]="Only JPEG or PNG files are supported.";
            else
            {
                if($file_size > 2097152)
                    $errors[]='File size should not be larger than 2MB';
                else
                {
                    $file_upload_path = '../photo/'.$image;
                    move_uploaded_file($file_tmp, $file_upload_path);
                }
            }
            $sql="update infusers set image='".$image."' where id='".$id."'";
            $query=mysqli_query($conn,$sql);
            if(!$query)
            {
                echo "Change avatar error!";
            }else
            {
                echo "change avatar success!";
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
        <title>Edit user</title>
</head>
<body>
        <div class="container">
                <form action="" enctype="multipart/form-data" method="POST" class="login-email">
                        <h2><a href="manage_user.php">Return Dashboard</a></h2> <br>
                        <h2>Edit user</h2>
                        <div class="input-group">
                                <input type="text" placeholder="Username" name="username" value="<?php echo $row['username']; ?>" required>
                        </div>
                        <div class="input-group">
                                <input type="text" placeholder="Full name" name="name" value="<?php echo $row['name']; ?>" required>
                                </div>
                        <div class="input-group">
                                <input type="email" placeholder="Email" name="email" value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="input-group">
                                <input type="text" placeholder="Phone number" name="phone" value="<?php echo $row['phone']; ?>" required>
                        </div>
                        <div class="input-group">
                                <input type="password" placeholder="Password" name="password" value="<?=$row['password']?>" required>
                        </div>
			            <div class="input-group">
                                <input type="password" placeholder="Confirm Password" name="cpassword" >
                        </div>
                        <div class="input-group">
                                <button name="edit" class="btn">Edit</button>
                        </div><br>
                        <h3>Change avatar</h3>
                            <input type="file" name="image" value="<?php echo $row['image']; ?>">
                            <input type="submit" name="submit" value="Upload">
                </form>
        </div>
</body>
</html>

