<?php 

session_start();



if(true/*$_SESSION['SessionType']=="Admin"*/) {

$form = "";
$formButton = "";


	if(isset($_POST['pricePercentage'])) {
		
		$response = true; //update the prices

		if(!$response) {
			$form = "<div class='alert alert-danger'> An error had occured while updating the files</div>";
		} else {
			$form = "<div class='alert alert-success'>The update was successful</div>";
		}

	} else {

		 $form = "<input type='number' class='form-control' name='pricePercentage' form='updateGPrice' placeholder='Added price percentage' required>";
        $formButton = '<button class="btn btn-primary" name="priceBtn" type="submit">Update Prices</button>';
	
	}

} else {
	header("location:  ../../index.php");
}