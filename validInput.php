<?php 

function is_valid($s){
 $stack = [];
 $mapping = ['}'=>'{',']'=>'[',')'=>'('];
 for($i=0; $i < strlen($s); $i++){
   $char = $s[$i];
   if(in_array($char,['{','[','('])){
      array_push($stack,$char);
   } else {
      if (empty($stack) || $mapping[$char] != array_pop($stack)){
         return false;
      }
   }
 }  
 return empty($stack);
}
$test_case1 = "{[(]}";
$test_case2 = "({[]})";
$test_case3 = "{[()]}";
$test_case4 = "({[]})";

var_dump(is_valid($test_case1));
var_dump(is_valid($test_case2));
var_dump(is_valid($test_case3));
var_dump(is_valid($test_case4));
?>