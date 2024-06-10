<?php
function twodigitssumoften($str) {
    $str = preg_replace("/[^0-9?]/","",$str);
    for($i=0; $i<strlen($str)-4;$i++){
        if($str[$i] !== '?' && is_numeric($str[$i]) && is_numeric($str[$i+4])){
            if((intval($str[$i]) + intval($str[$i+4]) === 10) && substr_count(substr($str,$i,5),'?') === 3){
                return true;
            }
        }
    }
    return false;
}

// Example
$str1 = "2c??baaaj2ac??d?7";
$str2 = "7de6kkk?i?v?3???????9";
$result1 = twodigitssumoften($str1);
$result2 = twodigitssumoften($str2);

echo $result1 ? 'true' : 'false';  // Output: true
echo $result2 ? 'true' : 'false';  // Output: true

?>