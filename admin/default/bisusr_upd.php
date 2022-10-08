<?php session_start();header("X-XSS-Protection: 1; mode=block"); 
    if(!isset($_SESSION['Grp'])){header('Location:admin-sign-in.php');exit();}
    
    
include_once '../config/fn_database.php';
include_once '../include/class/rainyadmin.php';
    $database = new Database();
    $dbs = $database->getConnection();
    $item = new RainyAdmin($dbs);
    $lid=trim($_POST['lid']);
    $tphone=trim($_POST['phone_number']);
    $status=trim($_POST['status']);
    
    $item->ugrp='1';
    
    $item->lid = $lid; 
    $item->tphone=$tphone;
    $item->status=$status;
    $uid="0";
    $usrArr=$item->getUsersFromTP($tphone);
    if($usrArr==null){
        echo "<script>alert('Phone Number NOT Registered As a Consumer!');document.location='register_user.php';</script>";
        exit();
    }else{
        $uid=$usrArr['id'];
        $item->uid=$uid;
        $item->lid=$lid;
        $item->status=$status;
        
        $res = $item->updateUserMap();
    
        if($res=="1")  
         echo "<script>alert('Promotion record Inserted Successfully!');document.location='index.php';</script>";
        elseif($res=="2")  
         echo "<script>alert('Promotion record Insert FAILED.!');history.go(-1);</script>";
        else 
         echo "<script>alert('User Already Registered.!');document.location='index.php';</script>"; 
    }
    
    ?>

