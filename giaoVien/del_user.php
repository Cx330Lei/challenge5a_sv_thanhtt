<?php
    include '../config.php';
    session_start();
    if((isset($_SESSION['id']) == NULL) || is_user())
    {
        header("location:../index.php");
        exit();
    }
    $id = $_GET['id'];
    $sql = "DELETE FROM `infusers` WHERE id='$id'";
	$query = mysqli_query($conn, $sql);
	header("location:manage_user.php");
    exit();
?>
