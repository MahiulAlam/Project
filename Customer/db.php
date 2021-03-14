<?php
class db{
 
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "registration";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
 return $conn;
 }
 function CheckUser($conn,$registration,$username,$password)
 {
$result = $conn->query("SELECT * FROM ". $registration." WHERE username='". $username."' AND password='". $password."'");
 return $result;
 
 }
 function InsertUser($conn,$registration,$name, $username,$password,$email,$phone,$address,$dob,$gender,$notes)
 {
    $result = "INSERT INTO " . $registration . " (name,username,password, emai, phone, address, dob, gender, notes)
     VALUES('$name','$uname','$pass','$email','$phoneCode','$phoneNum','$address','$city','$state','$postalCode','$dobDay','$dobMonth','$dobYear','$gender','$notes')";
     if ($conn->query($result) === TRUE) {
         echo "New record created successfully";
         return $result;
     } else {
         echo "Error: " . $result . "<br>" . $conn->error;
     }
 }

 function ShowAll($conn,$registration)
 {
$result = $conn->query("SELECT", * FROM  $registration");
 return $result;
 }


function CloseCon($conn)
 {
 $conn -> close();
 }
}
?>