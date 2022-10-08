<?php session_start();header("X-XSS-Protection: 1; mode=block"); 
    if(!isset($_SESSION['Grp'])){header('Location:admin-sign-in.php');exit();}
include_once '../config/fn_database.php';
include_once '../include/class/rainyadmin.php';
    $database = new Database();
    $dbs = $database->getConnection();
    $item = new RainyAdmin($dbs);
    $sta = 'ALL';
    $lid = $_SESSION['Lid'];
    $sta_arr = $item->getStationS($lid);
//    $adm_arr = $item->getStationAdmins($sta);
    $sta_all = json_decode($sta_arr);
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
    <div class="container col-sm-3"></div>
        <div class="container col-sm-6">
            <div class="pcoded-content">
            <div class="pcoded-inner-content">
             <div class="page-header">
                <div class="col-lg-12">
                    <div class="page-header-title">
                        <div class="d-inline"> 
                            
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">User Registry - <?php echo $_SESSION['stname'];?> </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" onclick="window.location = 'index.php';" style=" font-size: 30px; ">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" name="AddForm" method="post" action="bisusr_upd.php" onsubmit="return validateEntry('AddForm')" enctype='multipart/form-data'>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Business</label> 
                                                <div class="col-sm-9" id="ss_grd">
                                                    <input type="text" class="form-control ucase" id="name" name="station" value="<?php echo $_SESSION['stname'];?>" readonly="">
                                                    <input type="hidden" class="form-control ucase" id="lid" name="lid" value="<?php echo $_SESSION['Lid'];?>"  readonly="">
                                                </div>
                                            </div>                                                                            
                                            <div class="form-group row">
                                                <input type="hidden" class="form-control" name="usr_id" value="<?php //echo $usr_id;?>">
                                                <label class="col-sm-3 col-form-label">Phone Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control ucase" id="phone_number" name="phone_number" value="" placeholder="Phone Number" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control " id="status" name="status" required>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                           <div class="modal-footer">
                                               <button type="button" onclick="window.location = 'index.php';" class="btn btn-default waves-effect" data-dismiss="modal">Home</button>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save User</button>
                                           </div>
                                </form>
                                    </div>
                                 </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div> 
        </div>
    <div class="container col-sm-3"></div>
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



function validateEntry(fn) {
  var x1 = document.forms[fn]["optsta"].value;
  var x2 = document.forms[fn]["station"].value;
  var x3 = document.forms[fn]["location"].value;
  var x4 = document.forms[fn]["tphone"].value;
  var x5 = document.forms[fn]["email"].value;
  
  var phoneval = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  var mailfomat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
       if(x2.length>60){
           alert("Station Name should be shoter than 60 letters");
           return false;
       }else if(x3.length>60){
           alert("Location should be shoter than 60 letters");
           return false;
       }else if(x4.length>20){
           alert("Telephone should be shoter than 20 digits");
           return false;
       }else if(!x4.match(phoneval)){
           alert("Invalid Telephone No");
           return false;
       }else if(!x5.length==0){
            if(!x5.match(mailfomat)){
                alert("Invalid Email");
                return false;    
            }
            else return true;
       } else return true;
      
  }

  $(document).ready(function() {
      var ycode = "";
    $('#bsta').click(function(){
    $('#sta').toggleClass('fa-chevron-down fa-chevron-up');
  });
    $('#badm').click(function(){
      $('#adm').toggleClass('fa-chevron-down fa-chevron-up');
    });

    $(document).on('change', '#Optsta', function(){ 
        var lid = $(this).val();
        html_code = '<option value="0">New Promotion</option>';
         $.getJSON('getpromotions.php?Dcx='+lid+'&lid=1', function(data) { 
             ycode=data;
         if(data[0]==null){ 
            $("#name").val('');
            $("#pro_ttl").val('');  
            $("#discount").val('');
            $("#fr_date").val('');
            $('#to_date').val('');
            $('#pic1').val(''); 
            $('#picx').val('');
            $('#picL').html('');
            $('#Optpro').html(html_code);
        }else{    
         $.each(data, function(i, itm) {
                    html_code += '<option value="'+data[i].pro_id+'" >'+data[i].pro_ttl+'</option>';
                });
                $('#picx').val('');
                $('#picL').html('');
                $('#name').val(data[0].name);
                $('#Optpro').html(html_code);}

          }); 

    });
    
    $(document).on('change', '#Optpro', function(){ 
        var pid=$(this).val();
        $("#pro_ttl").val('');  
        $("#discount").val('');
        $("#fr_date").val('');
        $('#to_date').val('');
        $('#picx').val('');
        $('#picL').html('');
        $('#pic1').html('');
        $.each(ycode, function(i, itm) {
            if(ycode[i].pro_id==pid){
                $("#pro_ttl").val(ycode[i].pro_ttl);  
                $("#discount").val(ycode[i].promotion);
                $("#fr_date").val(ycode[i].fr_date);
                $('#to_date').val(ycode[i].to_date);
                $('#picx').val(ycode[i].pic1);
                $('#picL').html(ycode[i].pic1);
                $('#pic1').html(ycode[i].pic1);
            }
        });
    });
    
    });
    
    
    </script>
</body>

</html>