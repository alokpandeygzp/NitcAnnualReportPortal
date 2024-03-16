<?php

$sql = "SELECT role FROM entity where id='$mail'";
$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($rs);
$userRole = $row['role'];

?>