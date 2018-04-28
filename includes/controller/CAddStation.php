<?php
	

    //Session Check



    $linename =  array('Sfax Tunis' => array('Sfax' ,'Tunis','Sousse'),'Tabarka Tunis2' => array('Tabarka' ,'Tunis2','Beja') ,'Sfax2 Mednine' => array('Sfax2' ,'Mednine','Gabes'));


	$form = "";
	$formButton = "";

if($_SERVER['REQUEST_METHOD']=='POST') {


    // IF the user had already chosen a Line to update
    //Do something to get the station on the line 
    $formButton = '<button class="btn btn-primary" name="station" type="submit">Add Station</button>';
    $form .= "<div class='radio'>";
    var_dump($_POST['linename']);

    //Input NEW station name
        $form .= formHorizantalInput("New Station Name", "stationName", "stationName", "New Station Name", "text");
    //Input station prices
        $form .= formHorizantalInput("Category 1", "fistPrice", "firstPrice", "Category 1 Price", "number");
        $form .= formHorizantalInput("Category 2", "secondPrice", "secondPrice", "Category 2 Price", "number");
        $form .= formHorizantalInput("Category 3", "thirdPrice", "thirdPrice", "Category 3 Price", "number");

    //Separator

    //Show relative station
    foreach ($linename[$_POST['linename']] as $value) {
        $form .= "<label class='checkbox list-group-item'>
              <input name='optionsStation' type='radio' value='{$value}'> {$value}
    //Input direction and distance
              </label>";

        $form .='<input>'
    }
    $form .="</div>";
    //Show distance 

    
    //Show direction (close to terminal one or terminal two)

} else {  
	


    if(count($linename) == 0) {
        $formButton = "";
        $form .= '<div class="alert alert-warning">No line in database</div>'.
        '<a>Get back to Homepage</a>';

    } else {

        $formButton = '<button class="btn btn-primary" type="submit" name="line">Select Line</button>';
        $form .='<select class="form-control" name="linename" form="deleteStation">';
        foreach ($linename as $key => $value) {
            $form .="<option value='{$key}'>{$key}</option>";
        }     
        $form .="</select>";


}
}




function formHorizantalInput($labelName, $name, $id, $placeholder, $type) { //This function's purpose is to make the code more visible
    $string = '<div class="form_group">';
    $string .='<label class="col-md-2" for="'.$id.'">'.$labelName.'</label>';
    $string .= '<div class="col-md-10"><input type="'.$type.'" class="form-control" name="'.$name.'" id="'.$id.'" placeholder="'.$value.'" '.$additionalState.' ></div></div>';
    return $string;
}