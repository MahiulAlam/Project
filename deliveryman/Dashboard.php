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
        <h1>Customer Name and Order List:</h1>
        <center>
            <form action="" method="POST">
                <table border="1" style="border: thick;">
                    <tr>
                        <td>
                            <table border="2">
                                <tr>
                                    <td align="left"></a></td>
                                </tr>
                                <tr>
                                    <td><b><u>SR.NO</u></b></td>
                                    <td><b><u>FOOD_NAME</u></b></td>
                                    <td><b><u>FOOD_CATEGORY</u></b></td>
                                    <td><b><u>FOOD_ID</u></b></td>
                                    <td><b><u>QUANTITY</u></b></td>
                                    <td><b><u>PRICE</u></b></td>
                                    
                                </tr>
                                
                                <?php
                                    $orders = simplexml_load_file("xml_data/orders.xml");
                                    $i=0;
                                    foreach($orders as $order){
                                        echo "<tr><td>".$i."</td><td>".$order->bname."</td><td>".$order->category."</td><td>".$order->foodid."</td><td>".$order->quantity."</td><td>".$order->price."</td><td><img src=".$order->image." ></td></tr>";
                                        $i++;
                                    }
                                ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>