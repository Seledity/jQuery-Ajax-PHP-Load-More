<?php
require_once("../inc/conx.php");
$amount = $_GET['amntcnt'];
$contentq = mysqli_query($conx, "SELECT id,post FROM feed LIMIT $amount,3");
while($contentr = mysqli_fetch_assoc($contentq)) {
  $cnt_id = $contentr['id'];
  $cnt_txt = $contentr['post'];
  echo "$cnt_id: $cnt_txt<br>";
}
?>
