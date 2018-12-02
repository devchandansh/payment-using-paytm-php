<?php
require_once("PaytmKit/lib/config_paytm.php");
require_once("PaytmKit/lib/encdec_paytm.php");

    // define("merchantMid", "dZlzzF17647713571019");
    // Key in your staging and production MID available in your dashboard
    // define("merchantKey", "O0zUdI1&G%OQViK_");
    // Key in your staging and production merchant key available in your dashboard
    // define("orderId", "order1");
    // define("channelId", "WEB");
    // define("website", "WEBSTAGING");
    // define("industryTypeId", "Retail");
    // define("callbackUrl", "http://127.0.0.1/devchandan/payment-using-paytm/response.php");
    // define("txnAmount", "100.12");
    // This is the staging value. Production value is available in your dashboard
    // This is the staging value. Production value is available in your dashboard
    // define("callbackUrl", "https://<Merchant_Response_URL>");

    $orderId 	= time();
    $txnAmount 	= "100.50";
    $custId 	= "cust123";
    $mobileNo 	= "7777777777";
    $email 		= "username@emailprovider.com";

    $paytmParams = array();
    $paytmParams["ORDER_ID"] 	= $orderId;
    $paytmParams["CUST_ID"] 	= $custId;
    $paytmParams["MOBILE_NO"] 	= $mobileNo;
    $paytmParams["EMAIL"] 		= $email;
    $paytmParams["TXN_AMOUNT"] 	= $txnAmount;
    $paytmParams["MID"] 		= PAYTM_MERCHANT_MID;
    $paytmParams["CHANNEL_ID"] 	= PAYTM_CHANNEL_ID;
    $paytmParams["WEBSITE"] 	= PAYTM_MERCHANT_WEBSITE;
    $paytmParams["INDUSTRY_TYPE_ID"] = PAYTM_INDUSTRY_TYPE_ID;
    $paytmParams["CALLBACK_URL"] = PAYTM_CALLBACK_URL;
    $paytmChecksum = getChecksumFromArray($paytmParams, PAYTM_MERCHANT_KEY);
    $transactionURL = PAYTM_TXN_URL;
    // $transactionURL = "https://securegw-stage.paytm.in/theia/processTransaction";
    // $transactionURL = "https://securegw.paytm.in/theia/processTransaction"; // for production
?>
<html>
    <head>
        <title>Merchant Checkout Page</title>
    </head>
    <body>
        <center><h1>Please do not refresh this page...</h1></center>
        <form method='post' action='<?php echo $transactionURL; ?>' name='f1'>
            <?php
                foreach($paytmParams as $name => $value) {
                    echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
                }
            ?>
            <input type="hidden" name="CHECKSUMHASH" value="<?php echo $paytmChecksum ?>">
            <input type="submit" name="submit" value="submit" />
        </form>
        <!-- <script type="text/javascript">
            document.f1.submit();
        </script> -->
    </body>
</html>




