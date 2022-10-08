<?php session_start();header("X-XSS-Protection: 1; mode=block"); 
    if(!isset($_SESSION['Grp'])){header('Location:admin-sign-in.php');exit();}
    
    
include_once '../config/fn_database.php';
include_once '../include/class/rainyadmin.php';
    $database = new Database();
    $dbs = $database->getConnection();
    $item = new RainyAdmin($dbs);
    $lid=trim($_POST['optsta']);
    $pro_id = trim($_POST['optpro']);
    $station=trim($_POST['station']);
    $pro_ttl=trim($_POST['pro_ttl']);
    $pro_pic1=trim($_FILES["pro_pic1"]["name"]);
    $pro_picx=trim($_POST["pro_picx"]);
    $fr_date=trim($_POST['fr_date']);
    $to_date=trim($_POST['to_date']);
    $status=trim($_POST['status']);
    if($pro_pic1==''){
        $item->pro_pic1 =$pro_picx;
    }else{
        $item->pro_pic1 = $pro_pic1;
    }
    
    $item->st_lid = $lid; 
    $item->pro_id = $pro_id;
    $item->pro_ttl = $pro_ttl;
    $item->fr_date = $fr_date;
    $item->to_date = $to_date; 
    $item->pro_status = $status;
                         
			if ($pro_pic1=="")
			{
				$pro_pic1="default.png";
			}
			else
			{
				$type = $_FILES["pro_pic1"]["type"];
				$size = $_FILES["pro_pic1"]["size"];
				$temp = $_FILES["pro_pic1"]["tmp_name"];
				$error = $_FILES["pro_pic1"]["error"];
			
				if ($error > 0 && $lid=='0'){
					die("Error uploading the Image! Code $error.");
					}
				else{
					if($size > 100000000000) //conditions for the file
						{
						//die("Format is not allowed or file size is too big!");
						}
				else
				      {
                                        $fNo = str_pad($item->st_lid, 6, '0', STR_PAD_LEFT);
					move_uploaded_file($temp, "../promotions/sta-".$fNo."/".$pro_pic1);
				      }
				}
			}
    if($lid=="0") $op="I" ;else $op="U";
    if($item->updatePromotion()){
        if($lid=="0")  
         echo "<script>alert('Promotion Inserted Successfully!');document.location='index.php';</script>";
        else 
         echo "<script>alert('Promotion Updated Successfully!');document.location='index.php';</script>";
    } else{
        if($lid=="0")  
         echo "<script>alert('Promotion Insert FAILED.!');history.go(-1);</script>";
        else 
         echo "<script>alert('Promotion Updation FAILED.!');history.go(-1);</script>"; 
    }
    ?>

