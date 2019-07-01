<?php



$siteKey = "*****";
$secretKey = "*****";


////here we avoid date errors:
date_default_timezone_set('America/LosAngeles');


define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//echo and die --> in case further testing is needed:
//echo THIS_PAGE;
//die;
