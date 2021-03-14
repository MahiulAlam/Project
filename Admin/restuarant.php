<!DOCTYPE HTML>
<html>

<head>
    <title>Registration Page </title>
</head>

<body>
<?php
include('db.php');
session_start(); 

$validatename = $validateemail = $firstname = $email = $validatepassword = $password = $validateusername = $username = "";
$validatecpassword = $confirmpassword = $birthdate = $gender = $genderErr = "";


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


    $userQuery=$connection->InsertUser($conobj,"registration",$firstname,$username,$email,$password,$birthdate,$gender);

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
    elseif(!preg_match("/#/",$password))
    {
        $validatepassword="Use at least one /#/";
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

    if($confirmpassword == null){
        $validatecpassword = "Password dosen't match.";
    }
    elseif($password == $confirmpassword) {
        $validatecpassword = "Password match.";
    }

   
    if (empty($_POST["gender"])) 
    {
    $genderErr = "Gender is required";
    } else
    {
        $genderErr= "Selected";
   }
    
 $connection->CloseCon($conobj);
 }

 ?>
 <center>
    <fieldset>
    <h1>Admin Registration Form</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>"method="post">
    <br><br>
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
                <td>
                
                
                  <input type="radio" name="gender"
               
                  value="female">Female 
                  <input type="radio" name="gender"
                 
                  value="male">Male  
                  <input type="radio" name="gender"
                
                  value="other">Other  
                  <?php echo $genderErr;?>
                
                

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
        
    </form>
            <tr><td align="left"><br>
          <br><a href="Login.php"> <td><input type="submit" value="Login"></a></td></tr>
          </fieldset> 
          </center> 
</body>

</html>