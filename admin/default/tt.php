<?php 
$host = "techleadsecuritycom.domaincommysql.com";
 $database_name = "rainy_day";
 $username = "rainydayuser";
 $password = "TechDay@2364";
 
 $con=mysqli_connect("techleadsecuritycom.domaincommysql.com","rainydayuser","TechDay@2364","rainy_day");

   $result = array();
   $result['data'] = array();
   $select = "SELECT * FROM promotion";
   $response = mysqli_query($con,$select);

   while($row = mysqli_fetch_array($response))
   {
     $fNo = str_pad($row['lid'], 6, '0', STR_PAD_LEFT);
     $fNo= "sta-".$fNo."/".$row['pic1'];
       $index['pro_id'] =$row['pro_id'];
       $index['url'] =$fNo;
       $index['pic1'] =$row['pic1'];
      $index['pro_ttl'] =$row['pro_ttl'];
      array_push($result['data'],$index);
   }
   $result["success"] = "1";
   echo json_encode($result);
   

