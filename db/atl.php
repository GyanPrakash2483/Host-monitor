<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-with, initial-scale=1.0" />
  <title>Add to checklist</title>
</head>
<body>
<?php
if($_GET['auth_key'] == "admin0987") {
  if(isset($_GET['siteurl'])) {
    file_put_contents("./sitelist.txt", $_GET['siteurl']."\n", FILE_APPEND);
    file_put_contents("./uptime.txt", "95\n", FILE_APPEND);
  }
} else {
  die("Security tried to bypass: killing connection, die...");
}
?>
<form method="GET">
  <input type="text" name="siteurl" /><br>
  <input type="text" name="auth_key" /><br>
  <input type="submit" value="Add">
</form>
</body>
</html>