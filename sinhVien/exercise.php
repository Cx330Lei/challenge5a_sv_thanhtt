<?php
        session_start();
        include '../config.php';
        if((isset($_SESSION['id']) == NULL) || is_admin())
        {
            header("location:../index.php");
            exit();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upload files</title>
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
        <h2><a href="account_user.php">Return Dashboard</a></h2><br>
        <h2>List of exercises: </h2><br>
        <table>
		<thead>
                <tr>
                        <th>Name</th>
                        <th>Download</th>
                        <th>Your Exercises</th>
        	</tr>
		</thead>
                <?php
                        $sql="select * from exercise";
		                $query=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($query))
                        {
                            $file_name = $row['filename'];
                            $id_ex = $row['id_ex'];
                            
		?>
			<tr>
                            <th><?php echo $file_name; ?></th>
			    <th><a href="../uploads/<?php echo $file_name ?>">Download</a></th>
                            <th><a href="upload_file.php?id_ex=<?php echo $id_ex ?>">Upload</a></th>
			</tr>
                <?php
                        }
                ?>
	</table>
</body>
</html>