<?php session_start();header("X-XSS-Protection: 1; mode=block"); 
    if(!isset($_SESSION['Grp'])){header('Location:admin-sign-in.php');exit();}
    
    
include_once '../config/fn_database.php';
include_once '../include/class/rainyadmin.php';
    $database = new Database();
    $dbs = $database->getConnection();
    $item = new RainyAdmin($dbs);
    $lid=trim($_POST['optsta']);
    $uid = trim($_POST['uid']);
    $fname=trim($_POST['first_name']);
    $location=trim($_POST['location_name']);
    $tphone=trim($_POST['phone_number']);
    $email=trim($_POST['email']);
    $status=trim($_POST['is_active']);
    $pword =trim($_POST['password']);
    
    $item->ugrp='1';
    
    $item->uid = $uid; 
    $item->lid = $lid;
    $item->fname = $fname; 
    $item->st_location = $location;
    $item->tphone = $tphone;
    $item->st_email = $email;
    $item->status = $status;
    $item->passw = $pword;
    $gp="1";
    if($item->updateStaAdm($gp)){
        if($uid=="0")  
         echo "<script>alert('Admin record Inserted Successfully!');document.location='index.php';</script>";
        else 
         echo "<script>alert('Admin record Updated Successfully!');document.location='index.php';</script>";
    } else{
        if($lid=="0")  
         echo "<script>alert('Admin record Insert FAILED.!');history.go(-1);</script>";
        else 
         echo "<script>alert('Admin record FAILED.!');history.go(-1);</script>"; 
    }
    ?>

