<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Account</title>
        <style>
                table {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                }

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
        <h2><a href="account_admin.php">Return Dashboard</a></h2><br>
        <br>
        <h2><a href="add_user.php">Add student</a></h2><br>  
		<h2>List of students: </h2><br>
		
        <table>
			<thead>
                <tr>
                        <th>Avatar</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Edit</th>
                        <th>Delete</th>
        		</tr>
			</thead>
                        <?php
    		            include '../config.php';
                        if((isset($_SESSION['id']) == NULL) || is_user())
                        {
                            header("location:../index.php");
                            exit();
                        }
			$sql="select * from infusers where role = '0'";
			$query=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($query))
                        {
                            $u_id = $row['id'];
                            $u_name = $row['username'];
                            $u_fn = $row['name'];
                            $u_email = $row['email'];
                            $u_phone = $row['phone'];
			?>
			<tr>
                            <th><img src="../photo/<?php echo $row['image'] ?>" height=200></th>
			    <th><?php echo $u_id; ?></th>
			    <th><?php echo $u_name; ?></th>
			    <th><?php echo $u_fn; ?></th>
                            <th><?php echo $u_email; ?></th>
                            <th><?php echo $u_phone; ?></th>
                            <th><a href="edit_user.php?id=<?php echo $u_id ?>">Edit</a></th>
			    <th><a href="del_user.php?id=<?php echo $u_id ?>">Delete</a></th>	
			</tr>
                        <?php } ?>
		</table>
</body>
</html>