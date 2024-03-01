<?php
session_start();
$con = new mysqli("localhost", "root", "Luc@s180", "eudesa99_platform");

$fCon = new mysqli("localhost", "root", "Luc@s180", "eudesa99_forms");
$eCon = new mysqli("localhost", "root", "Luc@s180", "eudesa99_eliminamais");
