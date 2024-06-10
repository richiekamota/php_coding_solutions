<?php

function BracketCombinations($num){
 if ($num <= 0){
    return 0;
 }
  $result = 0;
  generateCombinations('',0,0,$num,$result);
  return $result;
}

function generateCombinations($current,$open,$close,$max,&$result){
  if(strlen($current) === $max*2){
    if($open == $close){
      $result++;
    }
  }

  if($open < $max){
    generateCombinations($current.'(',$open+1,$close,$max,$result);
  }

  if($close < $open){
   generateCombinations($current.')',$open,$close+1,$max,$result);
  }
}

echo BracketCombinations(3); // Output: 5
?>