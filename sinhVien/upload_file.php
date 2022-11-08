<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
    <h2><a href="exercise.php">Return Dashboard</a></h2><br>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="file" name="myfile"/>
            <input type="submit" name="click" value="Upload"/>
        </form>
        <?php
            include '../config.php';
            if((isset($_SESSION['id']) == NULL) || is_admin())
            {
                header("location:../index.php");
                exit();
            }
            $id_ex = $_GET['id_ex'];
            if(isset($_POST['click']))
            {
                $file = $_FILES['myfile'];
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
                                $upload = move_uploaded_file($file['tmp_name'], '../yourfile/'.$filename);
                                if(!$upload)
                                {
                                        echo "Upload Error";
                                }else
                                {
                                        $sql="INSERT INTO `yourfile` (`id_ex`, `filename_y`) VALUES ('$id_ex', '$filename')";
                                        $query = mysqli_query($conn, $sql);
                                        if(!$query)
                                                echo "Upload Error";
                                        else
                                        {
                                                echo "Upload success";
                                        }
                                }
                        }
                        else
                                echo "Error kich thuoc";
                }
                else
                        echo "Error kieu file";
            }
        ?>
    </body>
</html>