<?php
require_once("../inc/conx.php"); //change this to your connection file or info
$cntq = mysqli_query($conx, "SELECT * FROM feed"); //change this to the table you're grabbing from the database
echo mysqli_num_rows($cntq);
?>
