<?php
/*
Developer: Mirza S. Baig

Date: 1-16-2014

Description: Using the PHP language, have the function TimeConvert(num) take the num parameter 
being passed and return the number of hours and minutes the 
parameter converts to (i.e., if num = 63 then the output should be 1:3). 
Separate the number of hours and minutes with a colon. 
*/

function TimeConvert($num) {  
    // Calculate the number of hours by dividing num by 60 and flooring the result
    $hours = floor($num / 60);
    // Calculate the number of minutes by taking the remainder of num divided by 60
    $minutes = $num % 60;

    // Format the result as "<# of hours>:<# of minutes>"
    return $hours . ":" . $minutes; 
}

// Define test vectors
$vectors = [126, 45, 63];

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '{$vector}':" . PHP_EOL;
    echo "Output: " . TimeConvert($vector) . PHP_EOL;
}
?>
