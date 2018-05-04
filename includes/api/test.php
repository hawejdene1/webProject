<?php


    require_once  "MachineRequestAPI.php";

    echo getRecieveMachines();
    setRecieveMachines(true);
    echo getRecieveMachines();
    setRecieveMachines(false);
    echo getRecieveMachines();


    ?>