<?php
    include_once "control/order_val.php" ;
    if(!isset($_COOKIE["uname"])){
		header("Location: Login.php");
	}
?>
<html>
    <head>
        <title>Order</title>
    </head>
    <body>
        <h1>Add order</h1><br>
        <form action="" method="POST">
            <table>
                <tr>
                    <td align="left">Food Name:</td>
                    <td align="left"><input type="text" value="<?php echo $bname;?>" name="bname"></td>
                    <td align="left"><span style="color:red;">*<?php echo $err_bname;?></span></td>
                </tr>
                <tr>
                    <td align="left">Category:</td>
                    <td align="left">
                        <select name="category">
                            <option disabled selected>Select a Category</option>
                            <option>Normal foods</option>
                            <option>Fast foods</option>
                            <option>Drinks </option>
                        </select>
                    </td>
                    <td align="left"><span style="color:red;">*<?php echo $err_category;?></span></td>
                </tr>
                <tr>
                    <td align="left">Description:</td>
                    <td align="left">
                        <textarea name="description"></textarea>
                    </td>
                    <td align="left"><span style="color:red;">*<?php echo $err_description;?></span></td>
                </tr>
                <tr>
                    <td align="left">Foodid:</td>
                    <td align="left"><input type="text" value="<?php echo $foodid;?>" name="foodid"></td>
                    <td align="left"><span style="color:red;">*<?php echo $err_foodid;?></span></td>
                </tr>

                <tr>
                    <td align="left">Quantity:</td>
                    <td align="left"><input type="number" value="<?php echo $quantity;?>" name="quantity"></td>
                    <td align="left"><span style="color:red;">*<?php echo $err_quantity;?></span></td>
                </tr>
                <tr>
                    <td align="left">PRICE:</td>
                    <td align="left"><input type="number" value="<?php echo $price;?>" name="price"></td>
                    <td align="left"><span style="color:red;">*<?php echo $err_price;?></span></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="add" value="ADD">
                        <h2>Do you want to <a href="../Customer/logout.php">logout</a></h2>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>