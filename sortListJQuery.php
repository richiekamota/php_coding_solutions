<?php
if (isset($_POST['text'])){
  $text = $_POST['text'];
  $text = explode(",",$text);
  natcasesort($text);
  $text = implode(",",$text);
  return $text;
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To sort</title>
  <script src="./js/jquery.js"></script>
  <script text="javascript">
    $(document).ready(function(){
      $("#submit").click(function(){
        let text = $("#to-sort").val();
        let dataText = "text=" + text;
        if (text != ''){
          alert('Fill in the textarea below');
        } else {
          $.post("test.php",dataText,function(result){
            $("span").html(result);
          });
        }
        return false;
      });
    });
  </script>
</head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>">
   <input type="hidden" name="action" value="sort">
   <label for="to-sort">Please enter words/phrases separated by commas</label>
   <textarea name="to-sort" id="" cols="30" rows="10"></textarea>
   <input type="submit" value="Submit" id="submit">
   <p><span></span></p>
  </form>
</body>
</html>