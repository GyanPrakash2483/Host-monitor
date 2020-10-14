<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Progen - Hosts Monitor</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
<?php

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

$sites = file("./db/sitelist.txt", FILE_IGNORE_NEW_LINES, NULL);
$uptimes = file("./db/uptime.txt", FILE_IGNORE_NEW_LINES, NULL);
$staus = file("./db/status.txt", FILE_IGNORE_NEW_LINES, NULL);
$lastc = file("./db/lastc.txt", FILE_IGNORE_NEW_LINES, NULL);
$i = 0;
if(isMobile()) {
foreach ($sites as $val) {
  $thistime = time();
  $tlc = floor(($thistime - $lastc[$i]) / 60); //this last checked
  echo "<div class=\"mc\">";
  echo "<div class=\"ttle\">http://".$val."</div>";
  echo "<div class=\"ch\">Current Status: ".$staus[$i]."</div>";
  echo "<div class=\"ch\">Uptime: ".$uptimes[$i]."%</div>";
  echo "<div class=\"ch\">Ping: (".gethostbyname($val).") ".explode("/", exec("ping -c 1 ".$val))[4]."ms</div>";
  echo "<div class=\"ch\">Last Checked: ".$tlc." minutes ago </div>";
  echo "</div>";
  echo "<br />";
  $i++;
}
} else {
  $counter = 0;
  foreach ($sites as $val) {
  $thistime = time();
  $tlc = floor(($thistime - $lastc[$i]) / 60); //this last checked
  echo "<div class=\"mc\">";
  echo "<div class=\"ttle\">http://".$val."</div>";
  echo "<div class=\"ch\">Current Status: ".$staus[$i]."</div>";
  echo "<div class=\"ch\">Uptime: ".$uptimes[$i]."%</div>";
  echo "<div class=\"ch\">Ping: (".gethostbyname($val).") ".explode("/", exec("ping -c 1 ".$val))[4]."ms</div>";
  echo "<div class=\"ch\">Last Checked: ".$tlc." minutes ago </div>";
  echo "</div>";
  $i++;
  $counter++;
  if($counter == 4) {
    $counter = 0;
    echo "<br />";
  }
}
}
?>
<a href="./db/atl.php">Add a new site</a>
</body>
</html>
