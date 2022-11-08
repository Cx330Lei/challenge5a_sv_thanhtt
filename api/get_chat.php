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
        $output = "";
        $sql = "select * from messages where (outgoing_msg_id = {$outgoing_id} and incoming_msg_id = {$incoming_id})
                or (outgoing_msg_id  = {$incoming_id} and incoming_msg_id = {$outgoing_id}) order by msg_id"; 
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0)
        {
            while($row = mysqli_fetch_assoc($query))
            {
                if($row['outgoing_msg_id'] === $outgoing_id)
                {
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>';
                }
                else
                {
                    $s = " select * from infusers where id=3 ";
                    $q = mysqli_query($conn, $s);
                    //echo $q;
                    if (!$q) {
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    }else{
                        while($r = mysqli_fetch_array($q)){
                            $output .='<div class="chat incoming">
                                <img src="photo/'. $r['image'] .'" alt="">
                                    <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>';
                    }
}
                }
            }
            echo $output;
        }
    }
?>