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
			$admins = simplexml_load_file("xml_data/admins.xml");
			$flag=false;
			foreach($admins as $admin){
                if(strcmp($admin->uname,$_POST["uname"])==0 && strcmp($admin->pass,$_POST["pass"])==0){
					$flag=true;
					break;
                }
			}
			
			if(!$flag){
				echo "Invalid Username or Password";
			}
			else{
				session_start();
			    $_SESSION["uname"] = $uname;
			    setcookie("uname",$uname,time() + 80);
                header("Location: Dashboard.php");
			}
		}
	}
	
?>