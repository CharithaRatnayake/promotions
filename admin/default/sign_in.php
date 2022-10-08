<?php session_start();
header("X-XSS-Protection: 1; mode=block");
include_once '../config/fn_database.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Rainyday Admin</title>
        <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css">

    </head>
    <body>
        <div class="main">
            <div class="navbar">
                <div class="icon">
                    <div class="logo"> 
                        <img src="../files/assets/images/logos.png" alt="Italian Trulli">
                    </div>
                </div>
                <div class="menu"></div>
                <ul>

                    <li><a href="#">Info</a></li>
                </ul>
            </div>

            <div class="content">

                <h1>Rainy Day <span> Admin </span></h1>
            </div>

            <div class="form">
                <form class="md-float-material form-material" name="LoginForm" action="login.php" method="post" onsubmit="return validateEntry('LoginForm')">

                    <br>
                    <br>
                    <br>
                    <br>
                    <h2>Please Login Here</h2>
                    <br>
                    <br>    
                    <br>
                    <input type="text" name="username" placeholder=" Enter user name" required=""> <br>
                    <br>
                    <input type="password" name="password"  placeholder=" Enter your password  ">
                    <br>
                    <br>
                      
                        <label>
                            <input type="checkbox" value="lsRememberMe" id="rememberMe">
                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                            <span class="text-inverse">Remember me</span>
                        </label>
                     
                    <button type="submit" class="btn"><a href="./sign_up.php">  Sign In </a></button>

                    <br>    
                    <br>
                    <br>    
                    <br>
                </form>

                <p class="link"> Don't have an account </p>
                <button class="btn2"> <a href="./sign_up.php" onclick="lsRememberMe()" >Sign Up</a></button>


            </div>

        </div> 
        
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
        
        const rmCheck = document.getElementById("rememberMe"),
    emailInput = document.getElementById("username");

if (localStorage.checkbox && localStorage.checkbox !== "") {
  rmCheck.setAttribute("checked", "checked");
  emailInput.value = localStorage.username;
} else {
  rmCheck.removeAttribute("checked");
  emailInput.value = "";
}

function validateEntry(fn) {
  var x1 = document.forms[fn]["username"].value;
      
  if (x1.length >2) {  
           return true;    
  }else{  
      return false;
  }
}

function lsRememberMe() {
  if (rmCheck.checked && emailInput.value !== "") {
    localStorage.username = emailInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.checkbox = "";
  }
}
    </script>

    </body>
</html>