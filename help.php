<?php

    // LINK FOR DOCUMENTATION -  https://api.covid19india.org/documentation/


    //1. Daily numbers across C,R,D and Tested per state (historical data)
    // $data = file_get_contents('https://api.covid19india.org/v4/min/timeseries.min.json');
    // $coranadata = json_decode($data,true);
    // // echo $coranadata;
    // echo '<pre>';
    // print_r(($coranadata));

    //2. Current day numbers across districts and states.
    //The API is an object with keys corresponding to the two letter StateCode for each state.
    // Each State object has the following keys: districts, delta, delta7, meta and total. The districts object is a hash object where the keys represent individual districts in the state. The remaing three keys have the save behaviour across states and district objects. They are explained below:
    // meta: This substructure provides the following details:
    // last_updated: This tells when the current state/district value was updated.
    // population: This gives the population of the state (based on NCP projections) and districts (based on 2011 census)
    // tested: This has the source and last_updated values for the testing data of the current State/District.
    // notes: This gives any special notes added at the State/District level.
    // delta: This substructure contains the confirmed, deceased and recovered cases for the current day for the current State/District.
    // delta7: This substructure contains the seven day moving average (7DMA) for confirmed, deceased and recovered cases calculated wrt the current day for the current State/District.
    // total: This substructure contains the confirmed, deceased and recovered cases till today for the current State/District.
    $data = file_get_contents('https://api.covid19india.org/v4/min/data.min.json');
    $coranadata = json_decode($data,true);
    // echo $coranadata;
    echo '<pre>';
    print_r(($coranadata));
    // echo $coranadata;
    

?>
