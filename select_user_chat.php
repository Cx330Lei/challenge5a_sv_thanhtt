<?php
        session_start();
        include 'config.php';
        if((isset($_SESSION['id']) == NULL))
        {
            header("location:index.php");
            exit();
        }
    
        $id = $_SESSION['id'];
        $sql="select * from infusers where id='".$id."'";
        $query=mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) > 0)
        {
            $row=mysqli_fetch_array($query);
        }
        else
        {
            echo "Lỗi";
        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chatapp</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="wrapper">
            <section class="users">
                <header>
                    <div class="content">
                        <img src="photo/<?php echo $row['image'] ?>" alt="">
                        <div class="details">
                            <h3><?php echo $row['username'] ?></h3>
                        </div>
                    </div>
                    <a href="infoUser.php?id=<?php echo $_GET['id'] ?>">Return Dashboard</a>
                </header>
                <div class="search">
                    <span class="text">Select an user to start chat</span>    
                    <input type="text" placeholder="Enter name to search...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="users-list">
                </div>
            </section>
        </div>
        <script src="javascript/chat_interface.js"></script>
    </body>
</html>