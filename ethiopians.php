<?php
function replaceEthiopia($source,$target){
  $input = fopen($source,"r");
  if (!$input){
     die("Cannot open file");
  }

  $output = fopen($target,"w");
  if (!$output){
    die("Cannot open file");
  }

  $start = microtime(true);
  $regex = "/Ethiopia(ns?|n)?/";
  while (($line = fgets($input)) !== false){
    $replaced_line = preg_replace_callback($regex,function($matches){
       if (substr($matches[0],-1) == "a"){
         return "Zimbabwe";
       }else if(substr($matches[0],-1) == "n") {
         return "Zimbabwean";
       }else{
         return "Zimbabweans";
       }
    },$line);
    fwrite($output,$replaced_line);
  }
  fclose($input);
  fclose($output);
  $source_len = filesize($source);
  $target_len = filesize($target);
  $time_elapsed = microtime(true) - $start;
  echo "Source length: ".$source_len."bytes\n";
  echo "Target length: ".$target_len."bytes\n";
  echo "Time elapsed: ".$time_elapsed;
}
  $source = __DIR__."/ethiopians.txt";
  $target = "zimbabweans.txt";
  replaceEthiopia($source,$target);

?>