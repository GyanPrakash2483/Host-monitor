<?php
function is_on($url) {
  $ping = explode("/", exec("ping -c 1 ".$url))[4];
  if($ping === "" || $ping === null) {
    return false;
  } else {
    return true;
  }
}

$i = 0;
$sitelist = file("./sitelist.txt", FILE_IGNORE_NEW_LINES, NULL);
$uptime = file("./uptime.txt", FILE_IGNORE_NEW_LINES, NULL);
file_put_contents("./status.txt", "");
file_put_contents("./uptime.txt", "");
file_put_contents("./lastc.txt", "");
foreach ($sitelist as $value) {
  if(is_on($value)){
    $status = "<span class=\"gr\">on</span>";
    if($uptime[$i] < 100) {
      $uptime[$i]++;
    }
  } else {
    $status = "<span class=\"rd\">off</span>";
    if($uptime[$i] > 0) {
      $uptime[$i]--;
    }
  }
  file_put_contents("./uptime.txt", $uptime[$i]."\n", FILE_APPEND);
  file_put_contents("./status.txt", $status."\n", FILE_APPEND);
  file_put_contents("./lastc.txt", time()."\n", FILE_APPEND);
  $i++;
}

?>
