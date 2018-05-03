<?php 

session_start();
require_once dirname(dirname(__FILE__)) . "/api/StationManagementAPI.php" ;

if(true /*$_SESSION['SessionType']=="Admin"*/) {

	//$linename =  array('Sfax Tunis' => array('Sfax' ,'Tunis','Sousse'),'Tabarka Tunis2' => array('Tabarka' ,'Tunis2','Beja') ,'Sfax2 Mednine' => array('Sfax2' ,'Mednine','Gabes'));


	$form = "";
	$formButton = "";


    $linename=getLines();


    if($linename===true) {

        $form = "<div><h1>" . "empty Data Base" . "</h1></div>";
    }else{
    if($_SERVER['REQUEST_METHOD']=='POST') {
        // IF the user had already chosen a Line to update

    	if(isset($_POST['linename'])) {
                $_SESSION['linename']=$_POST['linename'];
    	        //Do something to get the station on the line
    	        $formButton = '<button class="btn btn-primary" name="updatePriceBtn" type="submit">update Station Prices</button>';


    	        //Input Station name
                    $stations=getStationsInLine($_POST['linename']);
    	            $form .= formSelectInput($stations,"station", "updatePrice", "Station");


    	        //Input station prices
    	            $form .= formHorizantalInput("Category 1", "firstPrice", "firstPrice", "Category 1 Price", "number");
    	            $form .= formHorizantalInput("Category 2", "secondPrice", "secondPrice", "Category 2 Price", "number");
    	            $form .= formHorizantalInput("Category 3", "thirdPrice", "thirdPrice", "Category 3 Price", "number");

    	} else if(isset($_POST['station'])) {


	    			if(isset($_POST['firstPrice'])) {
	    				if(!filter_var($_POST['firstPrice'],FILTER_VALIDATE_INT) && $_POST['firstPrice'] != "") {
	    					$_SESSION['errorMessage'] = "Prices form is invalid";
	    					header("location: ../../interface/adminDashboard/updatePrice.php");
	    				} else {
	    					//update price
	    					$requestResponse  = true; //contains wetheir the operation succeeded or not
	    					if(!$requestResponse) {
	    						$form = "<div class='alert alert-danger'> An error had occured while updating the files</div>";
	    					}
	    				}
	    			}

    				if(isset($_POST['secondPrice'])) {
	    				if(!filter_var($_POST['secondPrice'] ,FILTER_VALIDATE_INT)  && $_POST['secondPrice']!= "") {
	    					$_SESSION['errorMessage'] = "Prices form is invalid";
	    					header("location: ../../interface/adminDashboard/updatePrice.php");
	    				}
    				}


    				if(isset($_POST['thirdPrice'])) {
	    				if(!filter_var($_POST['thirdPrice'] ,FILTER_VALIDATE_INT) && $_POST['thirdPrice']!= "") {
	    					$_SESSION['errorMessage'] = "Prices form is invalid";
	    					header("location: ../../interface/adminDashboard/updatePrice.php");
	    				} else {
	    					//update price
	    					$requestResponse  = true; //contains wetheir the operation succeeded or not
	    					if(!$requestResponse) {
	    						$form = "<div class='alert alert-danger'> An error had occured while updating the files</div>";
	    					} else {
	    					   
                                modifyStationPrice($_POST['station'],$_SESSION['linename'],$price=array($_POST['firstPrice'],$_POST['secondPrice'],$_POST['thirdPrice']));
	    						$form = "<div class='alert alert-success'>The update was successful</div>";
	    						unset($_SESSION['errorMessage']);

	    					}
	    				}
    				}
    			}

    	} else {

	        if(count($linename) == 0) {
	            $formButton = "";
	            $form .= '<div class="alert alert-warning">No line in database</div>'.
	            '<a>Get back to Homepage</a>';

	        } else {
	    		unset($_SESSION['errorMessage']);

	            $formButton = '<button class="btn btn-primary" type="submit" name="line">Select Line</button>';
	            $form .= formSelectInput($linename, "linename", "updatePrice", "Linename");
	        }
    }


} }else {
	header("location:  ../../index.php");
}




function formHorizantalInput($labelName, $name, $id, $value, $type) { //This function's purpose is to make the code more visible
    $string = '<div class="form_group">';
    $string .='<label class="col-md-2" for="'.$id.'">'.$labelName.'</label>';
    $string .= '<div class="col-md-10"><input type="'.$type.'" class="form-control" name="'.$name.'" id="'.$id.'" value="'.$value.'" ></div></div>';
    return $string;
}



function formSelectInput($list, $name, $formname, $labelName) {
        $string ='<label class="col-md-2" for="'.$name.'">'.$labelName.'</label>';
        $string .="<div class='col-md-10'><select class='form-control' id=".$name." name='".$name."' form='".$formname."' required>";
        foreach ($list as  $value) {
            $string .="<option value='".$value."'>".$value."</option>";
        }
        $string .="</select></div>";

        return $string;
}

