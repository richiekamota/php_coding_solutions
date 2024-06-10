<?php 

function is_vowel($word){
  $lower_word = strtolower($word);
  return in_array($lower_word,['a','e','i','o','u']);
}

function goat_latin($phrase){
  $words = explode(" ",$phrase);
  $result = "";

  foreach($words as $index=>$word){
    $modified_word = $word;
    if (is_vowel($modified_word[0])){
      $first_letter = $modified_word[0];
      $modified_word = substr($modified_word,1).$first_letter;
    }
      $modified_word .= "m";
      $modified_word .= "a";
      $modified_word .= str_repeat("a",$index+1);
      $result .= $modified_word;
      $result .= "\n";
  }
  return $result;
}

$phrase = "I Speak Goat Latin";
$result = goat_latin($phrase);
echo $result;
?>