<?php
require_once("../inc/conx.php"); //change this to your connection file or info
$amount = $_GET['amntcnt'];
$contentq = mysqli_query($conx, "SELECT id,post FROM feed LIMIT $amount,3"); //change this to what you're grabbing from the database
while($contentr = mysqli_fetch_assoc($contentq)) {
  $cnt_id = $contentr['id'];
  $cnt_txt = $contentr['post'];
  echo "$cnt_id: $cnt_txt<br>";
}
?>
