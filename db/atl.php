<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-with, initial-scale=1.0" />
  <title>Add to checklist</title>
</head>
<body>
<?php
  if(isset($_GET['siteurl'])) {
    file_put_contents("./sitelist.txt", $_GET['siteurl']."\n", FILE_APPEND);
    file_put_contents("./uptime.txt", "95\n", FILE_APPEND);
  }
?>
<form method="GET">
  <input type="text" name="siteurl" />
  <input type="submit">
</form>
</body>
</html>