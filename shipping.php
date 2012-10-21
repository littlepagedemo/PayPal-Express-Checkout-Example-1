<?php

session_start();
include_once("config.php");
include_once("paypal_ecfunctions.php");


/* ==================================================================
'  Shipping Page
'
'  User is member - review shipping address and select shipping method
   ===================================================================
*/


if ($_SESSION['cart_item_arr']) 
{			
			
	include("header.php");


		
				
	// Display Shipping Method Options here 		
	// Display confirm page	
?>
	<div id="content-container">
		
		<div id="content">
			<h2>Shipping Address:</h2>
			
			<form action='shipping_order_review.php' METHOD='POST'>			
			<table border='1'>
			<tr><td>Ship to Name:</td>
				<td><?php echo $SHIPTONAME; ?>
				<input type="hidden" name="SHIPTONAME" value="<?php echo $SHIPTONAME; ?>"></td>
			</tr>
			<tr><td>Ship to Street:</td>
				<td><?php echo $SHIPTOSTREET; ?>
				<input type="hidden" name="SHIPTOSTREET" value="<?php echo $SHIPTOSTREET; ?>"></td>
			</tr>
			<tr><td>Ship to Street2:</td>
				<td><input type="hidden" name="SHIPTOSTREET2" value="<?php echo $SHIPTOSTREET2; ?>"></td>
			</tr>
			<tr><td>Ship to City:</td>
				<td><?php echo $SHIPTOCITY; ?>
				<input type="hidden" name="SHIPTOCITY" value="<?php echo $SHIPTOCITY; ?>"></td>
			</tr>
			<tr><td>Ship to State:</td>
				<td><?php echo $SHIPTOSTATE; ?>
				<input type="hidden" name="SHIPTOSTATE" value="<?php echo $SHIPTOSTATE; ?>"></td>
			</tr>
			<tr><td>Ship to Country Code:</td>
				<td><?php echo $SHIPTOCOUNTRYCODE; ?>
				<input type="hidden" name="SHIPTOCOUNTRYCODE" value="<?php echo $SHIPTOCOUNTRYCODE; ?>"></td>
			</tr>
			<tr><td>Ship to Zip:</td>
				<td><?php echo $SHIPTOZIP; ?>
				<input type="hidden" name="SHIPTOZIP" value="<?php echo $SHIPTOZIP; ?>"></td>
			</tr>	
			<tr><td>Ship to PHONENUM:</td>
				<td><?php echo $SHIPTOPHONENUM; ?>
				<input type="hidden" name="SHIPTOPHONENUM" value="<?php echo $SHIPTOPHONENUM; ?>"></td>
			</tr>																				
			</table>
					

		
				<!-- submit shipping address and amount -->
		
				<br><br>
				Select Shipping methods:		
				
				<table border='1' width='300px'>
				<tr><td>Method 1:</td>
					<td><input type="radio" name="SHIPPING_AMT" value="10.00">$10.00</td>
				</tr>
				<tr><td>Method 2:</td>
					<td><input type="radio" name="SHIPPING_AMT" value="20.00">$20.00</td>
				</tr>
				<tr><td>Method 3:</td>
					<td><input type="radio" name="SHIPPING_AMT" value="30.00">$30.00</td>
				</tr>								
				</table>
				
				<br><input type="submit" class='chkbtn' name="continue" value="Continue">
			</form>					
	
		</div>
		<!-- content -->
		
		
		<div id="aside">
			<h3>
				Review Shipping Address and Select shipping method.
			</h3>						
			<p>	<br>3) Click on continue go to the Shipping Billing Payment Option<br><br>
			</p>
			
			
		</div>

<?php

		include("footer.php");

 } 

 // no token
 else {
	
		header("Location: index.php"); // back to cart if don't have cart items 
		exit;

 }
	




?>
