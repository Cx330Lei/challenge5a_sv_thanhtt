<?php
    $conn = mysqli_connect("localhost", "root", "", "db_qllh");
    if(!$conn)
    {
	    echo "Error connection !!!";
    }

    function is_user() {
        if(isset($_SESSION['id']) && !is_null($_SESSION['id']) && $_SESSION['role'] == '0') {
            return true;
        } 
        return false;
    }
    function is_admin() {
        if(isset($_SESSION['id']) && !is_null($_SESSION['id']) && $_SESSION['role'] == '1') {
            return true;
        }
        return false;
    }

?>