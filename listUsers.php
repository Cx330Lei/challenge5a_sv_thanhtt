<?php
    include 'config.php';
    session_start();

    if(isset($_SESSION['id']) == NULL)
    {
        header("location:index.php");
        exit();
    }
    if(is_user())
    {
        $url = "sinhvien/account_user.php";
    }
    else
    {
        $url = "giaovien/account_admin.php";
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Display a list of users</title>
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
        <h2><a href= "<?php echo $url; ?>">Return Dashboard</a></h2>
		<h2>List of users: </h2><br>
        <table>
            <thead>
                    <tr>
                            <th>Avatar</th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Full name</th>
                            <th>Email</th>
                            <th>Phone</th>
        		    </tr>
			</thead>
                    <?php                 
						$sql="select * from infusers";
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
                            <th><img src="photo/<?php echo $row['image'] ?>" height=200></th>
					        <th><?php echo $u_id; ?></th>
					        <th><?php echo $u_name; ?></th>
					        <th><?php echo $u_fn; ?></th>
                            <th><?php echo $u_email; ?></th>
                            <th><?php echo $u_phone; ?></th>
                            <th><a href="infoUser.php?id=<?php echo $u_id ?>">View details</a></th>
				        </tr>
                  <?php } ?>
		</table>
</body>
</html>