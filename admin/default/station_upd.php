<?php session_start();header("X-XSS-Protection: 1; mode=block"); 
    if(!isset($_SESSION['Grp'])){header('Location:admin-sign-in.php');exit();}
    
    
include_once '../config/fn_database.php';
include_once '../include/class/rainyadmin.php';
    $database = new Database();
    $dbs = $database->getConnection();
    $item = new RainyAdmin($dbs);
    $lid=trim($_POST['optsta']);
    $location=trim($_POST['location_name']);
    $tphone=trim($_POST['phone_number']);
    $email=trim($_POST['email']); 
    $st_sms = trim($_POST['st_sms']);
    $item->st_lid = $lid;    
    $item->st_location = $location;
    $item->st_tele = $tphone;
    $item->st_email = $email;
    $item->st_sms = $st_sms;
    if($lid=="0") $op="I" ;else $op="U";
    $ret=$item->updateStation($op);
    
    if($ret['id']>0){
        $fNo = str_pad($ret['id'], 6, '0', STR_PAD_LEFT);
        $dir = "../promotions/sta-".$fNo."";
    /*    if (!is_dir($dir)) {
            if (false === @mkdir($dir, 0777, true)) {
                throw new \RuntimeException(sprintf('Unable to create the %s directory', $dir));
            }
        }*/
        if($lid=="0")  
         echo "<script>alert('Station Inserted Successfully!');document.location='index.php';</script>";
        else 
         echo "<script>alert('Station Updated Successfully!');document.location='index.php';</script>";
    } else{
        if($lid=="0")  
         echo "<script>alert('Station Insert FAILED.!');history.go(-1);</script>";
        else 
         echo "<script>alert('Station Updation FAILED.!');history.go(-1);</script>"; 
    }
    ?>

