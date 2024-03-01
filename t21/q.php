<?php
require_once("./inc/conf.inc.php");

die(var_dump($con->query($_POST['q'])->fetch_assoc()));
