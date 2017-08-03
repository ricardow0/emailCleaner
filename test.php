<?php
require('smtp-validate-email.php');

$from = 'a-happy-camper@campspot.net';
$csv = file('emails.csv');
$email = array();
$mailsBons = array();

for ($i = 0; $i < 1; $i++) {
   $clean = preg_replace("/[\\n]/", '', $csv[$i]);
    var_dump($clean);
    try {
        $validator = new SMTP_Validate_Email($clean, $from);
        $smtp_results = $validator->validate();
        var_dump($smtp_results);
        echo array_values($smtp_results)[0]; 
        if(array_values($smtp_results)[0]) {
            array_push($mailsBons, key($smtp_results));
            var_dump($mailsBons);
        } 
    } catch (Exception $e) {
        echo "error";
   }
}

    $fp = fopen('file.txt', 'w');
    fwrite($fp, print_r($mailsBons, TRUE));
    fclose($fp);