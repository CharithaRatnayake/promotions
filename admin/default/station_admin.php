<?php
session_start();
header("X-XSS-Protection: 1; mode=block");
if (!isset($_SESSION['Grp'])) {
    header('Location:admin-sign-in.php');
    exit();
}
include_once '../config/fn_database.php';
include_once '../include/class/rainyadmin.php';
$database = new Database();
$dbs = $database->getConnection();
$item = new RainyAdmin($dbs);
$sta = 'ALL';
$sta_arr = $item->getStationS($sta);
//   $adm_arr = $item->getStationAdmins($sta);
$sta_all = json_decode($sta_arr);
//    $adm_all = json_decode($adm_arr);
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
                                            <h4 class="modal-title">Station Admin Entry </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" onclick="window.location = 'index.php';" style=" font-size: 30px; ">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" name="AddForm" method="post" action="staadmin_upd.php" onsubmit="return validateEntry('AddForm')" enctype='multipart/form-data'>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Select Business</label> 
                                                    <div class="col-sm-9" id="ss_grd">
                                                        <select class="form-control" id="Optsta" name="optsta" required>
                                                            <option value="" >Select Business</option>  
<?php foreach ($sta_all as $arr) {
    echo '<option value="' . $arr->location_id . '" >' . $arr->location_name . '</option>';
} ?>
                                                        </select>
                                                    </div>
                                                </div>                                                                            
                                                <div class="form-group row">
                                                    <input type="hidden" class="form-control" name="usr_id" value="<?php //echo $usr_id; ?>">
                                                    <label class="col-sm-3 col-form-label">Business Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control ucase" id="location_name" name="location_name" value="" placeholder="Business Name" readonly="">
                                                    </div>
                                                </div> 
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Select Admin</label> 
                                                    <div class="col-sm-9" id="ss_uid">
                                                        <select class="form-control" id="staAdm" name="uid" required>
                                                            <option value="0" >New Station Admin</option>  

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Admin Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Admin Name" value="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">New Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" autocomplete="off" id="pw" name="password" placeholder="New Passworde" value="" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Confirm Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" autocomplete="off" id="pwc" name="Conpword" placeholder="Confirm Passworde" value="" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Telephone</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Telephone" value="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">E-Mail</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="" >
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Status</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control " id="is_active" name="is_active" required>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="modal-footer">
                                                    <button type="button" onclick="window.location = 'index.php';" class="btn btn-default waves-effect" data-dismiss="modal">Home</button>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Save Station</button>
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
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-23581568-13');

            const rmCheck = document.getElementById("rememberMe"),
                    emailInput = document.getElementById("username");

            $('#bsta').click(function () {
                $('#sta').toggleClass('fa-chevron-down fa-chevron-up');
            });
            $('#badm').click(function () {
                $('#adm').toggleClass('fa-chevron-down fa-chevron-up');
            });

            function validateEntry(fn) {
                var x1 = document.forms[fn]["optsta"].value;
                var x2 = document.forms[fn]["location_name"].value;
                var x3 = document.forms[fn]["first_name"].value;
                var x4 = document.forms[fn]["phone_number"].value;
                var x5 = document.forms[fn]["email"].value;
                var x6 = document.forms[fn]["password"].value;
                var x7 = document.forms[fn]["Conpword"].value;

                var phoneval = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
                var mailfomat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (x2.length > 60) {
                    alert("Location should be shoter than 60 letters");
                    return false;
                } else if (x3.length > 20) {
                    alert("User Name should be shoter than 20 letters");
                    return false;
                } else if (x4.length > 20) {
                    alert("Telephone should be shoter than 20 digits");
                    return false;
                } else if (x6.length == 0 && x1 == "0") {
                    alert("Empty Password NOT Alowed");
                    return false;
                } else if (x6 !== x7) {
                    alert("Given Passwords are NOT Matched");
                    return false;
                } else if (!x4.match(phoneval)) {
                    alert("Invalid Telephone No");
                    return false;
                } else if (!x5.length == 0) {
                    if (!x5.match(mailfomat)) {
                        alert("Invalid Email");
                        return false;
                    } else
                        return true;
                } else
                    return true;

            }

            $(document).on('change', '#Optsta', function () {
                var xcode;
                var lid = $(this).val();

                $.getJSON('getstation.php?Dcx=' + lid + '&lid=1', function (data) {
                    if (data[0] == null) {
                        $("#location_name").val('');
                        $("#first_name").val('');
                        $("#phone_number").val('');
                        $("#email").val('');
                        $('#is_active').val(1);
                    } else {
                        xcode = data[0];
                        $("#name").val(xcode['name']);
                        $("#location_name").val(xcode['location_name']);
                        html_code = '<option value="0">New Admin</option>';
                        $.getJSON('getstaadmin.php?Dcx=' + lid + '&lid=1', function (datAdm) {
                            if (datAdm[0] == null) {
                                $("#first_name").val('');
                                $("#phone_number").val('');
                                $("#email").val('');
                                $('#is_active').val(1);
                                $('#staAdm').html(html_code);
                            } else {
                                $.each(datAdm, function (i, itm) {
                                    html_code += '<option value="' + datAdm[i].id + '" >' + datAdm[i].first_name + '</option>';
                                });
                                $('#staAdm').html(html_code);
                            }
                        });
                    }

                });

            });

            $(document).on('change', '#staAdm', function () {
                var xcode, ycode = "";
                var uid = $(this).val();
                if (uid != "") {
                    $.getJSON('getuserinfo.php?Dcx=' + uid + '&grp=1', function (datAdm) {
                        if (datAdm[0] == null) {
                            $("#first_name").val('');
                            $("#phone_number").val('');
                            $("#email").val('');
                            $('#is_active').val(1);
                        } else {
                            $.each(datAdm, function (i, itm) {
                                $("#first_name").val(datAdm[i].first_name);
                                $("#phone_number").val(datAdm[i].phone_number);
                                $("#email").val(datAdm[i].email);
                                $('#is_active').val(1);
                            });
                        }
                    });
                } else {
                    $("#first_name").val('');
                    $("#phone_number").val('');
                    $("#email").val('');
                    $('#is_active').val(1);
                }
            });
        </script>
    </body>

</html>