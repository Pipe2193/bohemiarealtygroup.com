<?php
include('../functions.php');

$f1 = sanitize($_POST['featured_1']);
$f2 = sanitize($_POST['featured_2']);
$f3 = sanitize($_POST['featured_3']);
$f4 = sanitize($_POST['featured_4']);

$d['value'] = $f1;
update("homepage",$d,"item='featured1'",true); 

$d['value'] = $f2;
update("homepage",$d,"item='featured2'",true); 

$d['value'] = $f3;
update("homepage",$d,"item='featured3'",true); 

$d['value'] = $f4;
update("homepage",$d,"item='featured4'",true); 

?>