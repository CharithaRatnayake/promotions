<?php session_start();header("X-XSS-Protection: 1; mode=block");?>
<html lang="en">
<?php 
if (!isset($_SESSION['Grp']))
    {
    if (!isset($_SESSION['Sarid'])){
        echo "<script type='text/javascript'>document.location='default/admin-sign-in.php'</script>";
    }else{
        echo "<script type='text/javascript'>document.location='default/index.php'</script>";
    }    
    }else{
        echo "<script type='text/javascript'>document.location='default/index.php'</script>";
    }
?>

</html>

