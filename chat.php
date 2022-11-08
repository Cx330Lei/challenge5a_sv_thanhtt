<?php
    include 'config.php';
    session_start()
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
    <?php
        if((isset($_SESSION['id']) == NULL))
        {
            header("location:index.php");
            exit();
        }
        $id = $_GET['id'];
        $sql="select * from infusers where id='".$id."'";
        $query=mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) > 0)
        {
            $row=mysqli_fetch_array($query);
        }
    ?>
        <div class="wrapper">
            <section class="chat-area">
                <header>
                    <a href="select_user_chat.php?id=<?php echo $id ?>" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                    <img src="photo/<?php echo $row['image'] ?>" alt="">
                    <div class="details">
                        <h3><?php echo $row['username'] ?></h3>
                        <p>Active now</p>
                    </div>
                </header>
                <div class="chat-box">
                </div>
                <form action="#" class="typing-area">
                    <input type="text" name="outgoing_id" value="<?php echo $_SESSION['id']; ?>" hidden>
                    <input type="text" name="incoming_id" value="<?php echo $id; ?>" hidden>
                    <input type="text" name="message" class="input-field" placeholder="Type a message here ...">
                    <button><i class="fab fa-telegram-plane"></i></button>
                </form>
            </section>
        </div>
        <script src="javascript/chat.js"></script>
    </body>
</html>