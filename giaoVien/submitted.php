<?php
        session_start();
        include '../config.php';
        if((isset($_SESSION['id']) == NULL) || is_user())
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
        <h2><a href="exercise.php">Return Dashboard</a></h2><br>
        <h2>List of exercises submitted: </h2><br>
        <table>
		<thead>
                <tr>
                    <th>Name</th>
                    <th>Download</th>
        	    </tr>
		</thead>
        <?php
            $id_ex = $_GET['id_ex'];
            $sql = "select * from `yourfile` WHERE id_ex='$id_ex'";
	        $query = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($query))
            {               
		?>
			<tr>
                <th><?php echo $row['filename_y']; ?></th>
			    <th><a href="../yourfile/<?php echo $row['filename_y'] ?>">Download</a></th>
			</tr>
        <?php
            }
        ?>
	</table>
</body>
</html>