<?php
function is_palindrome($word){
  $words = str_split($word);
  $len = count($words);
  for($i=0; $i<$len; $i++){
    if ($word[$i] != $word[$len - 1 - $i]){
      return false; 
    }
  }
  return true;
}

function file_palindrome($path){
  $file = fopen($path,"r");
  if(!$file){
    die("Can't open file");
  }
  $palindromes = [];
  while (($line = fgets($file)) !== false){
    $words = preg_split("/s\+/",$line);
  
    foreach($words as $word){
      if (is_palindrome($word)){
       array_push($palindromes,$word);
      }
    }  
  }
  return $palindromes;
}



$path = __DIR__."/palindromes.txt";
$palindromes = file_palindrome($path);
foreach($palindromes as $palindrome){
  echo $palindrome.PHP_EOL;
}
?>