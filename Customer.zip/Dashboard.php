<?php
    if(!isset($_COOKIE["uname"])){
		header("Location: Login.php");
	}
?>
<html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>
        <h1>Order list</h1>
        <center>
            <form action="" method="POST">
                <table border="1" style="border: thick;">
                    <tr>
                        <td>
                            <table border="2">
                                <tr>
                                    <td align="left"><a href="order.php">Add New order</a></td>
                                </tr>
                                <tr>
                                    <td><b><u>SR.NO</u></b></td>
                                    <td><b><u>FOOD_NAME</u></b></td>
                                    <td><b><u>FOOD_CATEGORY</u></b></td>
                                    <td><b><u>FOOD_ID</u></b></td>
                                    <td><b><u>QUANTITY</u></b></td>
                                    <td><b><u>PRICE</u></b></td>
                                    <td><b><u>IMAGE</u></b></td>
                                    <td><b><u>DELETE</u></b></td>
                                </tr>
                                <?php
                                    $orders = simplexml_load_file("xml_data/orders.xml");
                                    $i=0;
                                    foreach($orders as $order){
                                        echo "<tr><td>".$i."</td><td>".$order->bname."</td><td>".$order->category."</td><td>".$order->foodid."</td><td>".$order->quantity."</td><td>".$order->price."</td><td><img src=".$order->image." style=\"width:20px;height:20px;\"></td><td><img src=\"images/delete.png\" style=\"width:10px;height:10px;\"></td></tr>";
                                        $i++;
                                    }
                                ?>
                                <tr>
                              
                                 <td><h2>Do you want to <a href="../Customer/logout.php">logout</a></h1></td>
                            </table>
                        </td>
                        
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>