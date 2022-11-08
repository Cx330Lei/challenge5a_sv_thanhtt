<?php
        session_start();
        include '../config.php';
        if((isset($_SESSION['id']) == NULL) || is_user())
        {
            header("location:../index.php");
            exit();
        }
        // xử lý upload file
        if(isset($_POST['uploadclick']))
        {
                $file = $_FILES['filename'];
                $size_allow = 10; //cho phep upload file 10MB
                $filename = $file['name'];
                $arr_filename = explode('.', $filename);
                $ext = end($arr_filename); // lấy gexplodeiá trị đuôi, hàm explode() biến chuỗi thành mảng và các phần tử mảng là các phần tử được tách bởi kí tự nào đó
                // kiểm tra định dạng
                $allow_ext = ['png', 'jpg', 'jpeg', 'gif', 'ppt', 'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx', 'pdf'];
                if (in_array($ext, $allow_ext))
                {
                        $size = $file['size']/1024/1024; //đổi từ byte sang MB
                        if ($size <= $size_allow)
                        {
                                $upload = move_uploaded_file($file['tmp_name'], '../uploads/'.$filename);
                                if(!$upload)
                                {
                                        echo "Upload Error";
                                }else
                                {
                                        $sql="INSERT INTO `exercise` (`filename`) VALUES ('$filename')";
                                        $query = mysqli_query($conn, $sql);
                                        if(!$query)
                                                echo "Error";
                                        else
                                        {
                                                echo "Upload success";
                                        }
                                }
                        }
                        else
                                echo "Error";
                }
                else
                        echo "Error";
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
        <h2><a href="account_admin.php">Return Dashboard</a></h2><br>
		<h2>Upload exercise files: </h2><br>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="file" name="filename"/>
            <input type="submit" name="uploadclick" value="Upload" style="width: 100px; height: 40px; border-radius: 10px; color:#0e33ef;cursor: pointer; background: #99FFCC;"/>
        </form>
        <br>
        <h2>List of exercises: </h2><br>
        <table>
		<thead>
                <tr>
                        <th>Exercises</th>
                        <th>Submitted</th>
        	</tr>
		</thead>
                <?php
                        $sql="select * from exercise";
			            $query=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($query))
                        {
                            $file_name = $row['filename'];
                            
		?>
			<tr>
                            <th><?php echo $file_name; ?></th>
			    <th><a href="submitted.php?id_ex=<?php echo $row['id_ex'] ?>">Submitted</a></th>	
			</tr>
                <?php   } ?>
	</table>
</body>
</html>