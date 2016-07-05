<?php
require_once("../inc/conx.php");
$cntq = mysqli_query($conx, "SELECT * FROM feed");
echo mysqli_num_rows($cntq);
?>
