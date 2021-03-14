<?php
    session_start();
    $uname="";
    $err_uname="";
    $pass="";
    $err_pass="";
    $hasError=false;
    $flag=false;
    if(isset($_POST["login"])){
        if(empty($_POST["uname"])){
            $err_uname="Username Required";
            $hasError =true;    
        }
        else{
            $uname = htmlspecialchars($_POST["uname"]);
        }
        if(empty ($_POST["pass"])){
            $err_pass="Password Required";
            $hasError = true;
        }
        else{
            $pass=htmlspecialchars($_POST["pass"]);
        }
        
        if(!$hasError){
            $employees = simplexml_load_file("xml_data/employee.xml");
            $flag=false;
            foreach($employees as $employee){
                if(strcmp($employee->uname,$_POST["uname"])==0 && strcmp($employee->pass,$_POST["pass"])==0){
                    $flag=true;
                    break;
                }
            }
            
            if(!$flag){
                echo "Invalid Credentials!";
            }
            else{
                session_start();
                $_SESSION["uname"] = $uname;
                setcookie("uname",$uname,time() + 120);
                header("Location: employee.php");
            }
        }
    }
    
?>