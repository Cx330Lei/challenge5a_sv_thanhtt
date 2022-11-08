<?php
    include '../config.php';
    session_start();
    if((isset($_SESSION['id']) == NULL))
    {
        header("location:../index.php");
        exit();
    }else
    {
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message))
        {
            $sql = mysqli_query($conn, "insert into messages (incoming_msg_id, outgoing_msg_id, msg) values ({$incoming_id}, {$outgoing_id}, '{$message}')");
        }
    }
?>