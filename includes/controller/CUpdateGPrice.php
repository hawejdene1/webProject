<?php 

session_start();


require_once  dirname(dirname(__FILE__)) . "/API/StationManagementAPI.php";

if(!isset($_SESSION['SessionType']) || $_SESSION['SessionType'] != "Admin") { 
	header("location: ../../index.php");
} else {
	
	$form = "";
	$formButton = "";


	if(isset($_POST['pricePercentage'])) {
		
		 //update the prices
        //echo $_POST['pricePercentage'];
        $response = updatePriceByPercent($_POST['pricePercentage']);
		if($response) {
			$form = "<div class='alert alert-danger'> An error had occured while updating the files</div>";
		} else {
			$form = "<div class='alert alert-success'>The update was successful</div>";
		}

	} else {

		 $form = "<input type='number' class='form-control' name='pricePercentage' form='updateGPrice' placeholder='Added price percentage' required>";
        $formButton = '<button class="btn btn-primary" name="priceBtn" type="submit">Update Prices</button>';
	
	}
}