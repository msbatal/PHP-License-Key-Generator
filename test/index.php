<?php

    require_once ('SunLicense.php'); // Call 'SunLicense' class

    /*
    // Example with Default Parameters
    $license = new SunLicense(); // generates 1 license key with default parameters
    echo $license->generate(); // returned a string
    */


    /*
    // Example for Using Prefix (Single Key)
    $license = new SunLicense('SLK'); // generates 1 license key with defined prefix and default parameters 
    echo $license->generate(); // returned a string
    */


    /*
    // Example for Using Key Template (Single Key)
    $license = new SunLicense(null, 'AA99-9A9A-A9A9-99AA'); // generates 1 license key with defined template and non-prefix
    echo $license->generate(); // returned a string
    */


    /*
    // Example for Generate Multiple Keys
    $license = new SunLicense(null, null, 5); // generates 5 license keys with default template and non-prefix
    $keys = $license->generate(); // returned an array
    foreach ($keys as $key) {
        echo $key . '<br>';
    }
    */


    // Example with Defined Parameters
    $license = new SunLicense('SLK', 'AA99-9A9A-A9A9-99AA', 5); // prefix, template (A => letters, 9 => numbers), number of keys
    print_r ( $license->generate() ); // prints 5 license keys with defined parameters

?>
