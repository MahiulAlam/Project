<?php
  
    if(!isset($_COOKIE["uname"])){
        header("Location: login.php");
    }
?>
<h2>Do you want to <a href="logout.php">logout</a></h2>
