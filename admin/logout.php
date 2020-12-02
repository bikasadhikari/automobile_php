<?php
session_start();
unset($_SESSION["adminuser"]);
header("location:index.php");


?>