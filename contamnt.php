<?php
require_once("../inc/conx.php"); //change this to your connection file or info
echo mysqli_num_rows(mysqli_query($conx, "SELECT id FROM feed")); //change this to the table you're grabbing from the database
?>
