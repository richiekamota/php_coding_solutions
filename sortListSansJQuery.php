<?php
    if (isset($_POST["text"])){
        $text = $_POST["text"];
        $text = explode(",",$text);
        natcasesort($text);
        $text = implode(",",$text);
        echo $text;
        exit;
    }
?>

<!DOCTYPE html>
<body>
  <h1>Sort List</h1>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="hidden" name="action" value="sort">
    <label for="to-sort">Please enter words/phrases separated by commas</label><br/>
    <textarea name="to-sort" id="to-sort" cols="30" rows="10"></textarea><br/>
    <input type="submit" value="Sort" id="submit">
  </form>
  <p><span></span></p>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
      var submitButton = document.getElementById('submit');
      var toSortTextArea = document.getElementById('to-sort');
      var resultSpan = document.querySelector('span');

      submitButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the form from submitting

        var text = toSortTextArea.value;
        var dataText = "text=" + text;

        if (text === "") {
          alert("Please fill in the textarea below");
        } else {
          var xhr = new XMLHttpRequest();
          xhr.open('POST', window.location.pathname, true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
              resultSpan.textContent = xhr.responseText;
            }
          };
          xhr.send(dataText);
        }
      });
    });
  </script>
</body>
</html>
