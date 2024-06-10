<?php
function MinWindowSubstring($strArr) {
  $str1 = $strArr[1];
  $str2 = $strArr[0];
  $charCount = array_count_values(str_split($str1));

  $windowStart = 0;
  $windowEnd = 0;
  $minLength = PHP_INT_MAX;
  $charMatchCount = count($charCount);
  $minWindow = "";

  while($windowEnd < strlen($str2)){
    if(isset($charCount[$str2[$windowEnd]])){
      $charCount[$str2[$windowEnd]]--;

      if($charCount[$str2[$windowEnd]] == 0){
        $charMatchCount--; 
      }
    }

    while($charMatchCount == 0){
      $currentLength = $windowEnd - $windowStart + 1;
      if ($currentLength < $minLength){
         $minLength = $currentLength;
         $minWindow = substr($str2,$windowStart,$currentLength);
      } 

      if(isset($charCount[$str2[$windowStart]])){
        $charCount[$str2[$windowStart]]++;

        if($charCount[$str2[$windowStart]] > 0){
          $charMatchCount++;
        }
      }
      $windowStart++;
    }
    $windowEnd++;
  }
  return $minWindow;
}
echo MinWindowSubstring(array("ahffaksfajeeubsne", "jefaa"));
?>