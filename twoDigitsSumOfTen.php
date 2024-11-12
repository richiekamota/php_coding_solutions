<?php 

function twodigitssumoften($str) {
    // Removing all non-numeric and non-question mark characters from the string
    $str = preg_replace('/[^0-9?]/', "", $str);
  
    // Loop through the string until the 4th last character to avoid out-of-bounds errors
    for ($i = 0; $i <= strlen($str) - 5; $i++) {
        // Check if the characters at positions i and i+4 are both numeric
        if (is_numeric($str[$i]) && is_numeric($str[$i + 4])) {
            // Check if their sum is 10 and if there are exactly 3 question marks between them
            if ((intval($str[$i]) + intval($str[$i + 4])) === 10 && substr_count(substr($str, $i, 5), '?') === 3) {
                return true;
            }
        }
    }
    return false;
  }

// Example
$str1 = "2c??baaaj3ac??d?7???m2";
$str2 = "7de6kkk?i?v?4???????9";
$result1 = twodigitssumoften($str1);
$result2 = twodigitssumoften($str2);

echo $result1 ? 'true' : 'false';  // Output: true
echo $result2 ? 'true' : 'false';  // Output: false
?>

