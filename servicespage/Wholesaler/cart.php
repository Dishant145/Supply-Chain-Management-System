<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
</head>
<body>

<?php

include 'connec.php';
session_start();
 
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
                'item_category'     =>  $_POST["hidden_category"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
            'item_name'			=>	$_POST["hidden_name"],
            'item_category'     =>  $_POST["hidden_category"],
            'item_price'		=>	$_POST["hidden_price"],
            'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
 
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}
 
?>	

<form action="select.php" method="post">
	<input type="hidden" name="m_name" value="<?php echo $_SESSION['mname']; ?>">
	<input type="submit" name="select" value="Go Back" class ="goback">
</form>

	<h3 id="orderhead"><center>Order Details</center></h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Name</th>
						<th width="10%">Category</th>
						<th width="20%">Price</th>
						<th width="15%">Quantity</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_category"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="4" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>   

	<form action="" method = "post">
		<input type="submit" name="order" value="Order" class="orderbutton">
	</form>


<?php

if (isset($_POST['order'])&&isset($_SESSION["shopping_cart"]) && isset($_SESSION['mname']) && isset($_SESSION['whname'])) 
{
    $mname = $_SESSION['mname'];
	echo "<input type='hidden' name='m_name' value='$mname'>";
    foreach($_SESSION["shopping_cart"] as $keys => $values)
	{	
        $wname = $_SESSION['whname'];
		$item_id = $values["item_id"];
        $item_name = $values["item_name"];
        $item_category = $values["item_category"];
        $item_price = $values["item_price"];
        $item_quantity = $values["item_quantity"];
		$cart = $wname;
		$cart.= 'cart';
		$_SESSION['cart'] = $cart;
		$create = mysqli_query($conn, "CREATE TABLE IF NOT EXISTS $cart (c_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, c_name VARCHAR(255) NOT NULL, c_category VARCHAR(255) NOT NULL, c_price INT(11) NOT NULL, c_quantity INT(11) NOT NULL, c_manufacturer VARCHAR(255) NOT NULL)");
        $sql = "INSERT INTO $cart (c_name, c_category, c_price, c_quantity,c_manufacturer) VALUES ( '$item_name', '$item_category', '$item_price', '$item_quantity','$mname')";
        $update = "UPDATE $mname SET p_quantity = p_quantity - '$item_quantity' WHERE p_id = '$item_id'";
		$uresult = mysqli_query($conn, $update);
		$result = mysqli_query($conn, $sql);
        if ($result) {
            ?>

            <script>
            Swal.fire({
                icon: 'success',
                title: 'Order Placed Successfully!',
                showConfirmButton:false,
            })
            </script>
            <?php
            header("Refresh:2; url=choice.php");
            
        } 
    }
}

?>
   