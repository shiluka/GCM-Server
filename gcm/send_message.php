<?php
if (isset($_POST["regId"]) && isset($_POST["message"])) {
    $regId = $_POST["regId"];
    $message = $_POST["message"];
     
    $registatoin_ids = $regId;
	print_r( $registatoin_ids);
	
    $message = array("price" => $message);
	
	require_once './gcm/GCM.php'; 
	$gcm = new GCM;
	
 
    $result = $gcm->send_notification($registatoin_ids, $message);
 
    echo $result;
}
?>
