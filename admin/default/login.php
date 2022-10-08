<?php session_start();header("X-XSS-Protection: 1; mode=block");  
include_once '../config/fn_database.php';
include_once '../include/class/rainyadmin.php';

/*////////////////////////
function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}
///////////////////////////*/
if(isset($_POST['username']))
{

$user_unsafe=$_POST['username'];
$pass_unsafe=$_POST['password'];
$dBase = new Database(); 
$con = $dBase->getConnection();
$item = new RainyAdmin($con);
//$branch=$_POST['branch']; 
//$user = $con->quote($user_unsafe);
$user = $user_unsafe;    
//$pass1 = $con->quote($pass_unsafe);
$pass1 = $pass_unsafe;
//$current_id = session_id();
if($user!=""){
$uCode = strtoupper($user);
$pass=md5($pass1);
$salt="";
$pass=$salt.$pass;
$current_id = session_id();
//date_default_timezone_set('Asia/Colombo');

$date = date("Y-m-d H:i:s");
    $res = $item->getLoginUser($uCode);
    $usr_arr = json_decode($res);

    if( !empty($usr_arr)){
        $uGrp = $usr_arr->user_type;
        $uName = $usr_arr->first_name;
        $uTel = $usr_arr->phone_number;
        $uEmail = $usr_arr->email;
        $uLid = $usr_arr->lid;
        $pw = $usr_arr->password;
        $station = $usr_arr->location_name;
        if($uLid=='10') $iName='Super User';else  $iName='Station Admin';
            if (($pw=='' && $pass_unsafe=='') || $pass == $pw){
            $_SESSION['iname']=trim($iName);
            $_SESSION['lname']=trim($location_name);
            $_SESSION['Lid']=$uLid; 
            $_SESSION['stname']=$station;
            $_SESSION['email']=$uEmail; 
            $_SESSION['Grp'] = $uGrp;
            $_SESSION['uname'] = $uName;
            $_SESSION['uTel']=$uTel;

                        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                            $ip = $_SERVER['HTTP_CLIENT_IP'];
                        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                        } else {
                            $ip = $_SERVER['REMOTE_ADDR'];
                        }
    
            $xse_id = session_id();
                echo "<script type='text/javascript'>document.location='index.php'</script>";
                exit();
    }
}
    }   
        session_destroy();
        echo "<script type='text/javascript'>alert('Invalid Login Attempt!!!');
            document.location='admin-sign-in.php'</script>";
}else{
        session_destroy();
        echo "<script type='text/javascript'>alert('Invalid Login Attempt!!!');
            document.location='admin-sign-in.php'</script>";
    }
	 
?>

