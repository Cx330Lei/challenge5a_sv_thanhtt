<?php
    include '../config.php';
    session_start();
    if((isset($_SESSION['id']) == NULL) || is_user())
    {
        header("location:../index.php");
        exit();
    }
    $id = $_GET['id'];
    $s = "select * from `infusers` WHERE id='$id'";
    $q=mysqli_query($conn,$s);
    $r=mysqli_fetch_array($q);
    //kiểm tra người được chỉnh sửa là sinh viên hay giáo viên
    if($r['role'] == 1)
    {
        header("location:manage_user.php");
    } 
    $sql = "DELETE FROM `infusers` WHERE id='$id'";
	$query = mysqli_query($conn, $sql);
	header("location:manage_user.php");
    exit();
?>
