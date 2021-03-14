<?php include_once "login_val.php" ;

?>
<html>
    <head>
        <title> Admin Login</title>
    </head>
    <body>
        <center><h1>Login</h1></center>
        <center>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td align="left">User Name:</td>
                        <td align="left"><input type="text" value="<?php echo $uname;?>" name="uname"></td>
                        <td align="left"><span style="color:red;">*<?php echo $err_uname;?></span></td>
                    </tr>
                    <tr>
                        <td align="left">Password:</td>
                        <td align="left"><input type="password" value="<?php echo $pass;?>" name="pass"></td>
                        <td align="left"><span style="color:red;">*<?php echo $err_pass;?></span></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="login" value="Login">
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>