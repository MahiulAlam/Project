?php
    include_once "control/order_val.php" ;
    if(!isset($_COOKIE["uname"])){
        header("Location: Login.php");
    }
?>