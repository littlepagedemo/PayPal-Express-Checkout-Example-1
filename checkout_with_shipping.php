<?php

session_start();
include_once("config.php");
include_once("paypal_ecfunctions.php");

/* ----------------------------------------------------
//  PayPal Express Checkout Call - SetExpressCheckout()
//  and redirect to paypal side
//
//  3. Checkout from Payment Option 
//-----------------------------------------------------
*/


// Checkout from Payment Option
// submit from shipping_order_review.php
// User is member and need pass the shipping address and shipping amount to paypal
if (isset($_REQUEST['PaymentOption'])) 
{

        //'------------------------------------
        //' Shipping address details entered by the user on the Shipping page.
        //'------------------------------------
        $shipToName = $_POST["SHIPTONAME"];
        $shipToStreet = $_POST["SHIPTOSTREET"];
        $shipToStreet2 = $_POST["SHIPTOSTREET2"];
        $shipToCity = $_POST["SHIPTOCITY"];
        $shipToState = $_POST["SHIPTOSTATE"];
        $shipToCountryCode = $_POST["SHIPTOCOUNTRYCODE"]; // Please refer to the PayPal country codes in the API documentation
        $shipToZip = $_POST["SHIPTOZIP"];
        $phoneNum = $_POST["SHIPTOPHONENUM"];
        

		$shipping_amt = $_POST["SHIPPING_AMT"];

        //'------------------------------------
        //' The paymentAmount is the total value of 
        //' the shopping cart, that was set 
        //' earlier in a session variable 
        //' by the shopping cart page
        //'------------------------------------

        $paymentAmount =  $_SESSION['cart_item_total_amt'] + $shipping_amt + $tax_amt;        
        $_SESSION["Payment_Amount"] = $paymentAmount;

} // else others payment options




	// Checkout from Billing options
	$_SESSION['useraction'] = 'commit';


	//-------------------------------------------
	// Prepare url for items details information
	//-------------------------------------------
	if ($_SESSION['cart_item_arr']) 
	{

		// Cart items
		$padata = get_payment_request();
		
		$paymentAmount = $_SESSION["Payment_Amount"];	// from cart.php
		
		
		//-------------------------------------------------
		// Data to be sent to paypal - in SetExpressCheckout
		//--------------------------------------------------
		/*$shipping_data = '';
		if($shipping_amt)
				$shipping_data = '&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($shipping_amt);
				
		$tax_data = '';
		if($tax_amt)
				$tax_data = '&PAYMENTREQUEST_0_TAXAMT='.urlencode($tax_amt);		
		
		$padata = 	$shipping_data.
					$tax_data.					
				 	$payment_request;	*/			
		//echo '<br>padata='.$padata;			
					
					
		//'--------------------------------------------------------------------		
		//'	Tips:  It is recommend that to save this info for the drop off rate 
		///	Function to save data into DB
		//'--------------------------------------------------------------------
		SaveCheckoutInfo($padata);
		
						
		if (isset($_REQUEST['PaymentOption']) == "paypal") 			

        	//'------------------------------------
        	//' Calls the SetExpressCheckout API call
        	//'
        	//' The CallMarkExpressCheckout function is defined in the file PayPalFunctions.php,
        	//' it is included at the top of this file.
        	//'-------------------------------------------------
        	$resArray = CallMarkExpressCheckout ($paymentAmount, $shipToName, $shipToStreet, $shipToCity, $shipToState,
                                            $shipToCountryCode, $shipToZip, $shipToStreet2, $phoneNum, $padata
        	);
		
		
		
		$ack = strtoupper($resArray["ACK"]);
		if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING")
		{
			//print_r($resArray);
			RedirectToPayPal ( $resArray["TOKEN"] );	// redirect to PayPal side to login
		} 
		else  
		{
			//Display a user friendly Error on the page using any of the following error information returned by PayPal
			DisplayErrorMessage('SetExpressCheckoutExpress', $resArray, $padata);
			
		}
			
	
	}else {
	
		header("Location: cart.php"); // back to cart if don't have cart items 
		exit;
	
	}
	


			
?>
