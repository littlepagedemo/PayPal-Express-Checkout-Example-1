<?php

/********************************************	 
	Defines all the global variables 
********************************************/
	
	
$SandboxFlag = true;	// sandbox live


//'------------------------------------
//' PayPal API Credentials
//'------------------------------------
$API_UserName=""; //PayPal API Username
$API_Password=""; //Paypal API password
$API_Signature=""; //Paypal API Signature


//'------------------------------------
//' BN Code 	is only applicable for partners
$sBNCode = "PP-ECxxxxx";
	
	
//'------------------------------------	
//' API version
$version = urlencode('84.0'); // 76.0


//'------------------------------------
//' The currencyCodeType and paymentType 
//' are set to the selections made on the Integration Assistant 
//'------------------------------------
$PayPalCurrencyCode = "SGD";		// Paypal Currency Code - USD
$paymentType = "Sale";				// or 'Sale' or 'Order' or 'Authorization'

	
	
$domain = 'http://'.$_SERVER['SERVER_NAME'];
//'------------------------------------
//' The returnURL is the location where buyers return to when a
//' payment has been succesfully authorized.
//'
//' This is set to the value entered on the Integration Assistant 
//'------------------------------------	
$PayPalReturnURL 		= $domain.'/paypal/ecsection1/order_success.php'; //Return URL after user sign in from Paypal
	
	
//'------------------------------------
//' The cancelURL is the location buyers are sent to when they hit the
//' cancel button during authorization of payment during the PayPal flow
//'
//' This is set to the value entered on the Integration Assistant 
//'------------------------------------	
$PayPalCancelURL 		= $domain.'/paypal/ecsection1/cart.php'; // Cancel URL if user clicks cancel



//'--------------------------------------
//' User's Address (Member)
//' For Shipping page
//'---------------------------------------
$SHIPTONAME='little Page';
$SHIPTOSTREET='123 Main St';
$SHIPTOSTREET2='';
$SHIPTOCITY='San Jose';
$SHIPTOSTATE='CA';
$SHIPTOCOUNTRYCODE='US';
$SHIPTOZIP='95131';
$SHIPTOPHONENUM='';


//'--------------------------------------
//' Shipping Methods
//' To be sent to SetExpressCheckout  
//'---------------------------------------
$shipping_method0="Method A";
$shipping_label0="Method A";
$shipping_amount0="20.00";
$shipping_isdef0="false";

$shipping_method1="Method B";
$shipping_label1="Method B";
$shipping_amount1="10.00";
$shipping_isdef1="true";

$shipping_method2="Method C";
$shipping_label2="Method C";
$shipping_amount2="30.00";
$shipping_isdef2="false";



?>
