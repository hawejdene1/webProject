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
    foreach ($linename[$_POST['linename']] as $value) {
        $form .= "<label class='checkbox list-group-item'>
              <input name='optionsStation' type='radio' value='{$value}'> {$value}
              </label>";
    }

    $form .="</div>";
    //  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 


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
