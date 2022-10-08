<html lang="en">
<head>
       <title>Sign In | RainyDay</title>
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
        content="Admin , Responsive, Landing, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="..\files\assets\images\flavicon.png" type="image/png">
    <!-- Google font-->
    <!-- Style.css -->
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
    <form class="md-float-material form-material" name="RegForm" action="logsignupup.php" method="post" onsubmit="return validateEntry('RegForm')">
    <br>
    <br>
    <br>
    <br>
    <h2>Please register here</h2>
    <br>
    <br>    
    <br>
    <input type="text" name="username" placeholder=" Enter user name" required=""> <br>
    <br>
    <input type="password" name="Pass"  placeholder=" Enter your password  " required=""><br>
    <br>
    <input type="password" name="rePass"  placeholder=" Re-enter your password  " required="">
    <br>
    <br>
    <br>    
    <br>
    <button type="submit" class="btn2"> Register </button>
    </form>
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
  var x2 = document.forms[fn]["Pass"].value;
  var x3 = document.forms[fn]["rePass"].value;
  x1=x1.trim();x2=x2.trim();x3=x3.trim();    
  if (x1.length <=4) {
      alert("Username is too shoter");
      return false;
  } else if(x2.length <=6){  
      alert("Password is too shoter");
      return false;
  }else if(x2 !=x3){  
      alert("Password & confirm Password are Mismatched");
      return false;
  }else return true;
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