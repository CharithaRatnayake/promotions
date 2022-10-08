<?php session_start();header("X-XSS-Protection: 1; mode=block"); 
    if(!isset($_SESSION['Grp'])){header('Location:admin-sign-in.php');exit();}
include_once '../config/fn_database.php';
include_once '../include/class/rainyadmin.php';
    $database = new Database();
    $dbs = $database->getConnection();
    $item = new RainyAdmin($dbs);
    $sta = 'ALL';
    if($_SESSION['Grp']=='10'){
    $sta_arr = $item->getStationS($sta);
    $adm_arr = $item->getStationAdmins($sta);
    }elseif($_SESSION['Grp']!='2'){
        $grp=trim($_SESSION['Lid']);
        $usr_arr = $item->getBissUsers($grp);
    }
    ?>
﻿<!DOCTYPE html>
<html lang="en">

<head>
    <title>RainyDay</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="..\files\assets\images\flavicon.png" type="image/png">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\themify-icons\themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\icofont\css\icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\style1.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="..\files\assets\icon\font-awesome\css\font-awesome.min.css">
</head>

<body class="fix-menu">

    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
<?php 
     include '../include/page-headder.php';
?>
        <div class="container">
            <div class="pcoded-content">
            <div class="pcoded-inner-content">
             <div class="page-header">
            <?php if($_SESSION['Grp']=='10'){?>
                                        <div class="row align-items-end">
                                            <div class="col-lg-12">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4>Supper Admin <?php echo $_SESSION['stname']?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="padding:  15px 0 15px 0">
                                                <div class="page-header-breadcrumb">
                                                   
            <div class="d-flex flex-column flex-sm-row">
            <a href="station_main.php" class="btn btn-lr btn-outline-secondary col-sm-3" >Create Business</a>
            <div class="col-sm-1"></div>
            <a href="station_admin.php" class="btn btn-lr btn-outline-secondary col-sm-3" >Create Business Admin</a>
            </div>  
                                                 </div>
                                            </div>
                                        </div>
                
        <div class="card">      
        <button type="button" id="bsta" class="btn btn-secondary" data-toggle="collapse" data-target="#station" >Stations <i id="sta" class="fa fa-chevron-up float-right"></i></button>
  <br>
  <div id="station" class="collapse show">
  <br>     
  
                                        
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="Sartable"
                                                                class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Business</th> 
                                                                        <th>Email</th>
                                                                        <th>Telephone</th> 

                                                                        <th>Edit</th><th>Delete</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
<?php $sta_all = json_decode($sta_arr); foreach($sta_all as $arr){ $st='Active';?>
                                                                    <tr>
                        <td><?php echo $arr->location_id;?></td>
                        <td><?php echo $arr->location_name;?></td>
                        <td><?php echo $arr->email;?></td>
                        <td><?php echo $arr->phone_number;?></td> 
                        <td>
                            <a href="#updatecourse" data-target="#updatecourse" data-toggle="modal" style="color:#fff;" class="btn btn-primary  btn-sm waves-effect waves-light"><i class="fa fa-edit"></i> Edit</a>
                        </td>
                        <td>
                            <input type="button" onclick="DeleteItem('')" class="btn btn-sm btn-danger waves-effect waves-light  fa fa-trash btn-xs"  Value='Delete' >
                        </td> 
                      </tr>
<?php } ?>
                      


                                                                </tbody>
                                                                
                                                            </table>
                                                        </div>
                                                    
                                                </div>          
                 </div>
    <br>             
    <div class="card">      
        <button id="badm" type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#admins" >Stations Admins <i id="adm" class="fa fa-chevron-up float-right"></i></button>
  <br>
  <div id="admins" class="collapse show">
  <br>     
  
                                        
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="Sartable"
                                                                class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>User ID</th>
                                                                        <th>Admin</th> 
                                                                        <th>Business</th> 
                                                                        <th>Phone</th> 

                                                                        <th>Edit</th><th>Delete</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
<?php $sadm_all = json_decode($adm_arr); foreach($sadm_all as $arr){ if($arr->is_active==1)$ast='Active';else $ast='Inactive';?>
                                                                    <tr>
                        <td><?php echo $arr->lid;?></td>
                        <td><?php echo $arr->first_name;?></td>
                        <td><?php echo $arr->location_name;?></td>
                        <td><?php echo $arr->phone_number;?></td> 
                        <td><input type="button" class="btn btn-sm btn-success waves-effect waves-light  fa fa-trash btn-xs"  Value='<?php echo $ast;?>' ></td>
                        <td>
                            <a href="#updatecourse" data-target="#updatecourse" data-toggle="modal" style="color:#fff;" class="btn btn-primary  btn-sm waves-effect waves-light"><i class="fa fa-edit"></i> Edit</a>
                        </td>
                        <td>
                            <input type="button" onclick="DeleteItem('')" class="btn btn-sm btn-danger waves-effect waves-light  fa fa-trash btn-xs"  Value='Delete' >
                        </td> 
                      </tr>
<?php } ?>                      


                                                                </tbody>
                                                                
                                                            </table>
                                                        </div>
                                                    
                                                </div>          
                 </div>
                 
            <?php }else if($_SESSION['Grp']=='1'){?>
                                        <div class="row align-items-end">
                                            <div class="col-lg-12">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4>Business Admin <?php echo $_SESSION['stname']?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="padding:  15px 0 15px 0">
                                                <div class="page-header-breadcrumb">
                                                   
            <div class="d-flex flex-column flex-sm-row">
                <a href="register_user.php" class="btn btn-lr btn-outline-secondary col-sm-3" >Register User</a>
                <div class="col-sm-1"></div>
                <!--<a href="promo_send.php" class="btn btn-lr btn-outline-secondary col-sm-3" >Send Promotion</a>-->
            </div>  
                                                 </div>
                                            </div>
                                        </div>
                
        <div class="card">      
        <button type="button" id="bsta" class="btn btn-secondary" data-toggle="collapse" data-target="#station" >Promotions <i id="sta" class="fa fa-chevron-up float-right"></i></button>
  <br>
  <div id="station" class="collapse show">
  <br>     
  
                                        
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="Sartable"
                                                                class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Pro_ID</th>
                                                                        <th>Location</th> 
                                                                        <th>Title</th>
                                                                        <th>Posting</th>
                                                                        <th>Duration</th>
                                                                        <th>Discount</th> 
                                                                        <th>Edit</th><th>Delete</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
<?php /*$pro_all = json_decode($pro_arr); foreach($pro_all as $arr){ if($arr->status==1)$st='Active';else $st='Inactive'; 
    $fr=date_format(date_create($arr->fr_date),"M, d/Y H:i");$to=date_format(date_create($arr->to_date),"H:i");$fNo = str_pad($arr->lid, 6, '0', STR_PAD_LEFT);*/?>
<!--                                                                    <tr>
                        <td><?php //echo $arr->pro_id;?></td>
                        <td><?php //echo $arr->location;?></td>
                        <td><?php //echo $arr->pro_ttl;?></td>
                        <td><img style="width:60px;height:60px" src="../promotions/sta-<?php //echo $fNo;?>/<?php //echo $arr->pic1;?>"></td> 
                        <td><?php echo "From ".$fr ." to ".$to;?></td>
                        <td><input type="button" class="btn btn-sm btn-success waves-effect waves-light  fa fa-trash btn-xs"  Value='<?php //echo $st;?>' ></td>
                        <td>
                            <a href="#updatecourse" data-target="#updatecourse" data-toggle="modal" style="color:#fff;" class="btn btn-primary  btn-sm waves-effect waves-light"><i class="fa fa-edit"></i> Edit</a>
                        </td>
                        <td>
                            <input type="button" onclick="DeleteItem('')" class="btn btn-sm btn-danger waves-effect waves-light  fa fa-trash btn-xs"  Value='Delete' >
                        </td> 
                      </tr>-->
<?php //} ?>
                      


                                                                </tbody>
                                                                
                                                            </table>
                                                        </div>
                                                    
                                                </div>          
                 </div>
                 
              
            <?php }?>
            </div>
            </div>
            </div> 
        </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->

    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\css-scrollbars.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="..\files\bower_components\i18next\js\i18next.min.js"></script>
    <script type="text/javascript"
        src="..\files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript"
        src="..\files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <script type="text/javascript" src="..\files\assets\js\common-pages.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
        
        const rmCheck = document.getElementById("rememberMe"),
    emailInput = document.getElementById("username");

$('#bsta').click(function(){
  $('#sta').toggleClass('fa-chevron-down fa-chevron-up');
});
$('#badm').click(function(){
  $('#adm').toggleClass('fa-chevron-down fa-chevron-up');
});
function validateEntry(fn) {
  var x1 = document.forms[fn]["username"].value;
      
  if (x1.length >0) {
      return true;
  }else 
      return false;
  }
  

    </script>
</body>

</html>