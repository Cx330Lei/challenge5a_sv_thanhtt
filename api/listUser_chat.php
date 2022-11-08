<?php
    include '../config.php';
    session_start();
    $output = "";
    $s="select * from infusers";
    $q=mysqli_query($conn,$s);
    if(mysqli_num_rows($q) > 1)
    {
        while($r=mysqli_fetch_array($q))
        {
            $output .= '<a href="chat.php?id='. $r['id'] . '">
                        <div class="content">        
                        <img src="photo/'. $r['image'] .'" alt="">
                            <div class="details">
                            <h3>'. $r['username'] .'</h3>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                        </a>';
        }
        echo $output;
    }else
    {
        echo "No users are available to chat";
    }
?>