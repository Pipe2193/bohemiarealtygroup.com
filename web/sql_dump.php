<?php

$username = 'XXXXXX';
$password = 'YYYYYY';
$hostname = 'ZZZZZZ';
$database = 'AAAAAA';

////////////////////////////// enviroment switch //////////////////////////////////
$enviroment = 'testing';

if ($enviroment == 'production') {
    $hostServer = "localhost";
    $userServer = "andres";
    $passServer = "b0hem1a";
    $dbname = "intranet_bohemia";
    $dbDealer = "guest_registration";
} elseif ($enviroment == 'testing') {
    $hostServer = "localhost";
    $userServer = "brgny_bohemia";
    $passServer = "b0hem1a2017";
    $dbname = "brgny_intranet_bohemia";
    $dbDealer = "brgny_guest_registration";
} elseif ($enviroment == 'local') {
    $hostServer = "localhost";
    $userServer = "root";
    $passServer = "";
    $dbname = "intranet_bohemia";
    $dbDealer = "guest_registration"; 
} elseif ($enviroment == 'pmiky') {
    $hostServer = "190.85.78.156";
    $userServer = "PMIWeb";
    $passServer = "PMI.Web46";
    $dbname = "onaf_v3";
//    $dbDealer = "dealers";      

} else {
    
}
////////////////////////////// end enviroment switch ////////////////////////////

////////////////////////////// Databases Connections instances /////////////////

/**
 * BOHEMIA database instance 
 */
try {
    $GLOBALS['instance'] = new \PDO("mysql:host=" . $hostServer . ";dbname=" . $dbname, $userServer, $passServer);
    $GLOBALS['instance']->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
     header("Location: settings.php?p=error_dbconnection&error=". $e->getMessage());
}

/**
 * GUEST REGISTRATION database instance 
 */
try {
    $GLOBALS['instanceRegistration'] = new \PDO("mysql:host=" . $hostServer . ";dbname=" . $dbDealer, $userServer, $passServer);
    $GLOBALS['instanceRegistration']->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
     header("Location: settings.php?p=error_dbconnection&error=". $e->getMessage());
}
////////////////////////End Databases Connections instances ////////////////////

function getSearchLandlords() {
    try {
        $sql = "SELECT * "
                . " FROM landlords ";

        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

 $obj_landlords = getSearchLandlords();
foreach ($obj_landlords as $landlord):
  echo $landlord->id . '</br>';
endforeach;