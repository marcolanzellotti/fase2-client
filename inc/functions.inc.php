<?php
require_once "conf.inc.php";
function issetPostFields(array $fields)
{
    foreach ($fields as $field) if (!in_array($field, array_keys($_POST))) return false;
    return true;
}

function Q($query)
{
    global $con;
    return $con->query($query);
}

function E($str)
{
    global $con;
    return mysqli_escape_string($con, $str);
}
