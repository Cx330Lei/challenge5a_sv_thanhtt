<?php
        include 'config.php';
        session_start();
        if((isset($_SESSION['id']) == NULL))
        {
            header("location:index.php");
            exit();
        }
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql="select * from infusers where id='".$id."'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);

        if(isset($_POST['chat']))
        {
            header("location:chat.php?id=$id");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title>Display user information</title>
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
                        <h2><a href="listUsers.php">Return Dashboard</a></h2>
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
                        <th><img src="photo/<?php echo $row['image'] ?>" height=120></th>
                        <th><?php echo $row['username']; ?></th>
                        <th><?php echo $row['email']; ?></th>
                        <th><?php echo $row['name']; ?></th>
                        <th><?php echo $row['phone']; ?></th>
                    </tr>
                        </table>
                        <br>
                        <div class="input-group">
                                <button name="chat" class="btn">Leave message</button>
                        </div>
                </form>
        </div>
</body>
</html>
