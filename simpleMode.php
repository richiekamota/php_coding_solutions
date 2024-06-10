<?php
 /*
  *
 Developer: Mirza S. Baig
 
 Date: 4-23-2014
 
 Description:    Using the PHP language, have the function SimpleMode(arr) take the
                 array of numbers stored in arr and return the number that appears most
                 frequently (the mode). For example: if arr contains [10, 4, 5, 2, 4]
                 the output should be 4. If there is more than one mode return the one
                 that appeared in the array first (ie. [5, 10, 10, 6, 5] should return
                 5 because it appeared first). If there is no mode return -1. The array
                 will not be empty.
 
 */
 
 function SimpleMode($arr) {
     // Evaluate the frequency of each element in the array
     $frequency = array_count_values($arr);
 
     // Sort the frequency array by value in descending order
     arsort($frequency);
 
     // Iterate over the sorted frequency array to find the first mode
     foreach ($frequency as $element => $count) {
         // If the count of the element is greater than 1, it's the mode
         if ($count > 1) {
             return $element;
         }
     }
 
     // If no mode is found (all elements are unique), return -1
     return -1;
 }
 
 // Test vectors for the SimpleMode function
 $arr1 = array(10, 4, 5, 2, 4);
 $arr2 = array(5, 10, 10, 6, 5);
 $arr3 = array(5, 5, 2, 2, 1);
 $arr4 = array(3, 4, 1, 6, 10);
 
 // Create and store all test vectors in an array
 $vectors = array($arr1, $arr2, $arr3, $arr4);
 
 // Execute the test vectors using the function and display results
 foreach ($vectors as $vector) {
     echo "Test Vector: '" . implode(" , ", $vector) . "':" . PHP_EOL;
     echo "Output:" . " " . SimpleMode($vector) . PHP_EOL;
 }
 ?>
 

?>