<!DOCTYPE HTML>
<html>

<head>
    <title>Registration Page </title>
</head>

<body>
<?php
include('db.php');
session_start(); 

$validatename=$validateemail=$firstname=$email=$validatepassword=$password=$validateusername=$username="";
$validatecpassword=$confirmpassword=$v1=$v2=$v3="";


    if($_SERVER["REQUEST_METHOD"]=="POST")
 {
    $connection = new db();
    $conobj=$connection->OpenCon();
    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];
    $confirmpassword = $_POST["confirmpassword"];


    $userQuery=$connection->InsertUser($conobj,"employee",$firstname,$username,$email,$password,$birthdate,$gender);

    if(empty($_POST["firstname"])||!preg_match("/^[a-zA-Z-' ]*$/",$firstname))
    {
        $validatename="Valid Name is required.";
    }
    else{
            $validatename="Your Name is ".$firstname;
        }
    if (empty($_POST["email"]) || !preg_match("/@/",$email)) {
        $validateemail = "Valid Email is required";
    } 
    else{
        $validateemail = "Your email is ".$email;
    }
    
    if(empty($password))
    {
        $validatepassword = "Invalid password";
    }
    elseif((strlen($password))<6)
    {
        $validatepassword="Atleast 6";
    }
    elseif(!preg_match("/@#%/",$password))
    {
        $validatepassword="Use at least one /@#%/";
    }
    else{
        $validatepassword = "Your password successful ";
    }

    if(empty($username)|| (strlen($username))<5)
    {
        $validateusername = "Invalid user name";
    }
    else{
        $validateusername = "Your username is ".$username;
    }

    if($password!=$confirmpassword){
        $validatecpassword = "Password doesn't match.";
    }

   

    else{

    if(isset($_POST["gender1"])){
        echo $v1=$_POST["gender1"];
    }
    elseif(isset($_POST["gender2"])){
        echo $v2=$_POST["gender2"];
    }elseif(isset($_POST["gender3"])){
        echo $v3=$_POST["gender3"];
    }
 }
 $connection->CloseCon($conobj);
 }

 ?>
    <h1>My Registration Page</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>"method="post">
    
        <table>
            <tr> <td>Name:</td>
                <td> <input type="text" name="firstname"> <?php echo $validatename;?> </td></tr>
            
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email"> <?php echo $validateemail;?></td></tr>
           
            <tr>
                <td>User Name:</td>
                <td><input type="text" name="username"> <?php echo $validateusername;?></td></tr>
           
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"> <?php echo $validatepassword;?></td></tr>
           
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirmpassword"> <?php echo $validatecpassword;?></td></tr>
            
            <tr>
                <td>Gender</td>
                <td><input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other">Other</label>
                    <?php echo $v1;?>
                    <?php echo $v2;?>
                    <?php echo $v3;?>

                </td>
            </tr>
            <tr>
                <td>Date of Birth <br></td>
                <td><input type="date" name="birthdate"></td>
            </tr>
            <tr>

                <td><input type="submit" value="submit">
                    <input type="reset">
                </td>
               

            </tr>

        </table>
        <tr><td align="left"><a href="login.php">LOGIN</a></td>

    </form>
    
</body>

</html>