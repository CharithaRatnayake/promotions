<?php session_start();header("X-XSS-Protection: 1; mode=block");
if(!isset($_GET['Dcx'])){header('Location:index.php');exit();}
    include_once '../config/fn_database.php';
    include_once '../include/class/rainyadmin.php';
    $database = new Database();
    $dbs = $database->getConnection();
    $item = new RainyAdmin($dbs);
    $sta=$_GET['Dcx'];
    $adm_arr = $item->getStationAdmins($sta);
    
    echo $adm_arr; 
 
?>

