<?php
    $bname="";
    $err_bname="";
    $category="";
    $err_category="";
    $description="";
    $err_description="";
    $foodid="";
    $err_foodid="";
    $quantity="";
    $err_quantity="";
    $price="";
    $err_price="";
    $hasError=false;

    if(isset($_POST["add"])){
        if(empty($_POST["bname"])){
			$err_bname="Food Name Required";
			$hasError =true;	
		}
		else{
			$bname = htmlspecialchars($_POST["bname"]);
        }
        if(isset($_POST["category"])){
            $category=$_POST["category"];
        }
        else{
            $err_category="Select a Category";
            $hasError=true;
        }
        if(empty($_POST["description"])){
            $err_description="extra food ,Description Required";
            $hasError=true;
        }
        else{
            $description=htmlspecialchars($_POST["description"]);
        }
        if(empty($_POST["foodid"])){
            $err_foodid="foodid Required";
            $hasError=true;
        }
        else{
            $foodid=htmlspecialchars($_POST["foodid"]);
        
        }
        if(empty($_POST["quantity"])){
            $err_quantity="quantity Required";
            $hasError=true;
        }
        else{
            $quantity=htmlspecialchars($_POST["quantity"]);
        }
        if(empty($_POST["price"])){
            $err_price="Price Required";
            $hasError=true;
        }
        else{
            $price=htmlspecialchars($_POST["price"]);
        }

        if(!$hasError){
            $orders = simplexml_load_file("xml_data/orders.xml");
			
            $order = $orders->addChild("order");
            $order->addChild("bname",$bname);
			$order->addChild("category",$category);
            $order->addChild("description",$description);
            $order->addChild("foodid",$foodid);
            $order->addChild("quantity",$quantity);
            $order->addChild("price",$price);
            $order->addChild("image","images/defaultorder.png");
			
			$xml = new DOMDocument("1.0");
			$xml->preserveWhiteSpace=false;
			$xml->formatOutput= true;
			$xml->loadXML($orders->asXML());
			
			$file = fopen("xml_data/orders.xml","w");
			fwrite($file,$xml->saveXML());
        }
    }
?>