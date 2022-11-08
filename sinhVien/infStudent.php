<?php
        include '../config.php';
        session_start();
        if((isset($_SESSION['id']) == NULL) || is_admin())
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
            $ph=$_POST['phone'];
            $e=$_POST['email'];

            $sqlUpdate="update infusers set phone='".$ph."', email='".$e."' where id='".$id."'";
            mysqli_query($conn,$sqlUpdate);
            $sql="select * from infusers where id='".$id."'";
            $query=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($query); 
            if($query)
                echo '<script>alert("Edit successfully!")</script>';
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
                    $url = '../photo/'.$image;
                    move_uploaded_file($file_tmp, $url);
                }
            }
            $sql="update infusers set image='".$image."' where id='".$id."'";
            $query=mysqli_query($conn,$sql);
            if(!$query)
            {
                echo "Change avatar error!";
            }else
            {
                echo "Change avatar error!";
            }
            $sql="select * from infusers where id='".$id."'";
            $query=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($query); 
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../style.css" rel="stylesheet" type="text/css"/>
        <title>Edit information</title>
	<style>
                td, th {
                  border: 1px solid #dddddd;
                  text-align: left;
                  padding: 8px;
                }

                tr:nth-child(even) {
                        background-color: #dddddd;
                }
                h2 {
                    color: #0e33ef;
                    font-weight: 800;
                }
	</style>
</head>
<body>
        <div class="container">
                <form action="" enctype="multipart/form-data" method="POST" class="login-email">
                        <h2><a href="account_user.php">Return Dashboard</a></h2>
                        <br>
                        <table>
                    <tr>
                        <th>Avatar</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Phone number</th>
                    </tr>
                    <tr>
                        <th><img src="../photo/<?php echo $row['image'] ?>" height=120></th>
                        <th><?php echo $row['username']; ?></th>
                        <th><?php echo $row['email']; ?></th>
                        <th><?php echo $row['name']; ?></th>
                        <th><?php echo $row['phone']; ?></th>
                    </tr>
                        </table>
                        <br>
                        <h2>Edit Information</h2>
                        <br><br>
                        <div class="input-group">
                                <input type="text" placeholder="Phone number" name="phone" value="<?php echo $row['phone']; ?>" required>
                                </div>
                        <div class="input-group">
                                <input type="email" placeholder="Email" name="email" value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="input-group">
                                <button name="edit" class="btn">Edit</button>
                        </div>
                        <h2><a href="edit_pwd.php">Change password</a></h2><br>
                        <h2>Change avatar</h2>
                            <input type="file" name="image" value="<?php echo $row['image']; ?>">
                            <input type="submit" name="submit" value="Upload">
                </form>
        </div>
</body>
</html>

