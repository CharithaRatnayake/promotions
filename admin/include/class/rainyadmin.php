<?php
    class RainyAdmin{
        // Connection
        private $conn;
        private $salt="";//a1Bz20ydqelm8m1wqz";
        private $pass;
        // Table
        private $db_user = "user";
        private $db_station = "location";
        private $db_promo = "promotion";
        private $db_busiMap ="user_location_map";
        // Columns
        public $uid;
        public $ugrp;
        public $fname;
        public $lid;
        public $tphone;
        public $reg_id;
        public $auth_key;
        public $email; 
        public $passw;
        public $status;
        public $st_lid;
        public $st_name;
        public $st_address;
        public $st_location;
        public $st_tele;
        public $st_email;
        public $st_status;
        public $pro_id; 
        public $pro_ttl;
        public $pro_pic1;
        public $fr_date;
        public $to_date;
        public $pic1;  
        public $pro_status;
        public $st_sms;
        public $created_at;
        public $updated_at;
        public $uidX;

        //
        public $qState;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getUser(){
            $sqlQuery = "SELECT uid, ugrp, fname, lid, tphone,reg_id,auth_key, email,status  FROM " . $this->db_user . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createUser(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_user ."
                    SET
                        ugrp = :ugrp,
                        fname = :fname,
                        lid = :lid,
                        tphone= :tphone, 
                        reg_id = :reg_id, 
                        auth_key = :auth_key, 
                        email = :email, 
                        status = :status";

            $stmt = $this->conn->prepare($sqlQuery);

            // sanitize
            $this->ugrp='U';
            $this->fname=htmlspecialchars(strip_tags($this->fname));
            $this->lid=htmlspecialchars(strip_tags($this->lid));
            $this->tphone=htmlspecialchars(strip_tags($this->tphone));
            $this->reg_id=htmlspecialchars(strip_tags($this->reg_id));
            $this->auth_key=htmlspecialchars(strip_tags($this->auth_key));
            $this->email='';
            $this->status='1';
        
            // bind data
            $stmt->bindParam(":ugrp", $this->ugrp);
            $stmt->bindParam(":fname", $this->fname);
            $stmt->bindParam(":lid", $this->lid);
            $stmt->bindParam(":tphone", $this->tphone);
            $stmt->bindParam(":reg_id", $this->reg_id);
            $stmt->bindParam(":auth_key", $this->auth_key);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":status", $this->status); 
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        

        public function updateStaAdm($grp='1'){

            // sanitize
            $this->ugrp=htmlspecialchars(strip_tags($grp));
            $this->fname=htmlspecialchars(strip_tags($this->fname));
            $this->lid=htmlspecialchars(strip_tags($this->lid));
            $this->uid=htmlspecialchars(strip_tags($this->uid));
            $this->tphone=htmlspecialchars(strip_tags($this->tphone)); 
            $this->st_email=htmlspecialchars(strip_tags($this->st_email));
            $this->passw=htmlspecialchars(strip_tags($this->passw));
            $this->status=htmlspecialchars(strip_tags($this->status));
            $this->created_at = time();
            $this->updated_at = time();
            $this->uidX = md5($this->tphone); 
            $this->st_sms="3";
            if($this->passw!=""){
                $this->pass=md5($this->passw);
                $this->pass=$this->salt.$this->pass;}else{$this->pass="";};
        if ($this->uid=="0"){ 
            $sqlQuery = "INSERT INTO ". $this->db_user .
                     " SET first_name = '$this->fname',
                     user_type = $this->ugrp,
                     phone_number = '$this->tphone',
                     email = '$this->st_email',
                     lid = $this->lid,
                     created_at=$this->created_at,
                     updated_at=$this->updated_at,
                     is_active=$this->status,
                     uid='$this->uidX',
                     send_count=$this->st_sms";
                     if($this->passw!="") $sqlQuery = $sqlQuery . ",password='$this->pass' ";
            
                 /*   " SET first_name = :fname,
                     user_type = :ugrp,
                     phone_number = :tphone,
                     email = :email,
                     lid = :lid,
                     password=:password,
                     created_at=:created_at,
                     updated_at=:updated_at,
                     is_active=:is_active,
                     uid=:uid,send_count=:send_count";*/
                     $stmt = $this->conn->prepare($sqlQuery);
                     
                /*    $stmt->bindParam(":fname", $this->fname,PDO::PARAM_STR);
                    $stmt->bindParam(":ugrp", $this->ugrp,PDO::PARAM_INT);
                    $stmt->bindParam(":tphone", $this->tphone,PDO::PARAM_STR);
                    $stmt->bindParam(":email", $this->st_email,PDO::PARAM_STR);
                    $stmt->bindParam(":lid", $this->lid,PDO::PARAM_INT);
                    $stmt->bindParam(":password", $this->pass,PDO::PARAM_STR);
                    $stmt->bindParam(":created_at", $this->created_at,PDO::PARAM_INT);
                    $stmt->bindParam(":updated_at", $this->updated_at,PDO::PARAM_INT);

                    $stmt->bindParam(":is_active", $this->status,PDO::PARAM_INT);
                    $stmt->bindParam(":uid", $this->uidX,PDO::PARAM_STR);
                    $stmt->bindParam(":send_count", $this->st_sms,PDO::PARAM_INT); */
                    
        }else{ $sqlQuery = "UPDATE ". $this->db_user .  
                " SET first_name = '$this->fname',
                     user_type = $this->ugrp,
                     phone_number = '$this->tphone',
                     email = '$this->st_email',
                     lid = $this->lid,
                     updated_at=$this->updated_at,
                     is_active=$this->status,
                     uid='$this->uidX',
                     send_count=$this->st_sms";
                     if($this->passw!="") $sqlQuery = $sqlQuery . ",password='$this->pass' ";
                     $sqlQuery = $sqlQuery . " Where id=$this->uid";
                     $stmt = $this->conn->prepare($sqlQuery);
                     
                    
                 //   $stmt->bindParam(":fname", $this->fname,PDO::PARAM_STR);
                 //   $stmt->bindParam(":ugrp", $this->ugrp,PDO::PARAM_INT);
                 //   $stmt->bindParam(":tphone", $this->tphone,PDO::PARAM_STR);
                 //   $stmt->bindParam(":email", $this->st_email,PDO::PARAM_STR);
                 //   $stmt->bindParam(":lid", $this->lid,PDO::PARAM_INT);
                 //   $stmt->bindParam(":updated_at", $this->updated_at,PDO::PARAM_INT);
                 //   $stmt->bindParam(":is_active", $this->status,PDO::PARAM_INT);
                 //   $stmt->bindParam(":uid", $this->uidX,PDO::PARAM_STR);
                 //   $stmt->bindParam(":send_count", $this->st_sms,PDO::PARAM_INT);
                 //   if($this->passw!="")$stmt->bindParam(":password", $this->pass,PDO::PARAM_STR);
                 //   $stmt->bindParam(":id", $this->uid,PDO::PARAM_INT); 
            }
        
        

            // bind data

         
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
 
        // READ single
        public function getLoginUser($un){
            
            if ($un!='' && $un!='ALL'){
            $sqlQuery = "SELECT
                        USR.id,
                        USR.first_name,
                        USR.phone_number, 
                        USR.lid,
                        USR.email,USR.user_type, 
                        USR.password,
                        LOC.location_name,
                        USR.is_active,
                        USR.uid
                      FROM
                        ". $this->db_user ." AS USR LEFT JOIN ". $this->db_station ." LOC ON LOC.location_id=USR.lid 
                    WHERE 
                       USR.is_active <>0 AND USR.user_type <>2 AND USR.first_name= ? 
                    ORDER BY USR.first_name
                    ";
            }else{  return false;}
            $stmt = $this->conn->prepare($sqlQuery); ;
            $stmt->bindParam(1, $un, PDO::PARAM_STR);
            $stmt->execute(); 
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            $json = json_encode($results);
            return $json;
    /*        $this->uid = $dataRow['uid'];
            $this->ugrp = $dataRow['ugrp'];
            $this->fname = $dataRow['fname'];
            $this->lid = $dataRow['lid'];
            $this->tphone = $dataRow['tphone'];
            $this->reg_id = $dataRow['reg_id'];
            $this->auth_key = $dataRow['auth_key'];
            $this->email = $dataRow['email'];
            $this->status = $dataRow['status'];*/
        }
        
        public function getBissUsers($grp, $uid=null){
            if($uid != null) $Arg = "id=? AND user_type=?"; else $Arg ="ugrp=?";
            $sqlQuery = "SELECT
                        USR.id,
                        USR.user_type,
                        USR.first_name, 
                        USR.lid,
                        USR.phone_number,
                        USR.email,
                        USR.is_active
                      FROM 
                        ". $this->db_user ." USR 
                        INNER JOIN ". $this->db_busiMap . " BMAP 
                        ON BMAP.uid=USR.id AND USR.lid=BMAP.lid
                    WHERE ". $Arg ." LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            if($uid != null){ 
                $stmt->bindParam(1, $uid, PDO::PARAM_INT); 
                $stmt->bindParam(2, $grp, PDO::PARAM_STR);
            }else $stmt->bindParam(1, $grp, PDO::PARAM_STR); 
            $stmt->execute();
            $dataRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($dataRow);
            return $json;
        }
        
        public function getUsersFromTP($tp){
            
            $sqlQuery = "SELECT
                        USR.id,
                        USR.user_type,
                        USR.first_name, 
                        USR.lid,
                        USR.phone_number,
                        USR.email,
                        USR.is_active
                      FROM 
                        ". $this->db_user ." USR 
                        
                    WHERE USR.phone_number =? AND USR.user_type=2 LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $tp, PDO::PARAM_STR); 
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $dataRow;
        }
        public function updateUserMap(){ 
           
        
            $this->lid=htmlspecialchars(strip_tags($this->lid));
            $this->uid=htmlspecialchars(strip_tags($this->uid));
            $this->status=htmlspecialchars(strip_tags($this->status));
            $this->update_at = time();
            
            $sqlQuery = "SELECT * 
                      FROM ". $this->db_busiMap ." WHERE uid = $this->uid AND lid=$this->lid ";
            $stmt = $this->conn->prepare($sqlQuery);
            
            $res = $stmt->execute();
            $usrRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!$usrRow){
            $sqlQuery = "INSERT INTO ". $this->db_busiMap .
                     " SET uid =:uid,
                     lid = :lid,
                     is_active = :is_active,
                     update_at= :update_at";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(":uid", $this->uid, PDO::PARAM_INT); 
            $stmt->bindParam(":update_at",  $this->update_at, PDO::PARAM_INT);
            $stmt->bindParam(":lid", $this->lid, PDO::PARAM_INT); 
            $stmt->bindParam(":is_active",  $this->status, PDO::PARAM_INT);
            if($stmt->execute())return 1; 
            else return 2;
            }else{
                return 3;
            }
        }
 
        public function getUserInfo($grp, $uid=null){
            if($uid != null) $Arg = "id=? AND user_type=?"; else $Arg ="ugrp=?";
            $sqlQuery = "SELECT
                        id,
                        user_type,
                        first_name, 
                        lid,
                        phone_number,
                        password,
                        send_count,
                        email,
                        is_active
                      FROM 
                        ". $this->db_user ."
                    WHERE ". $Arg ." LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            if($uid != null){ 
                $stmt->bindParam(1, $uid, PDO::PARAM_INT); 
                $stmt->bindParam(2, $grp, PDO::PARAM_STR);
            }else $stmt->bindParam(1, $grp, PDO::PARAM_STR); 
            $stmt->execute();
            $dataRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($dataRow);
            return $json;
        }
        
        // UPDATE
        public function updateUser(){
            $sqlQuery = "UPDATE
                        ". $this->db_user ."
                    SET
                        fname = :fname, 
                        tphone = :tphone, 
                        email = :email, 
                        reg_id = :reg_id, 
                        auth_key = :auth_key,
                        status = :status
                    WHERE 
                        uid = :uid";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->ugrp=htmlspecialchars(strip_tags($this->ugrp));
            $this->fname=htmlspecialchars(strip_tags($this->fname));
            $this->lid=htmlspecialchars(strip_tags($this->lid));
            $this->tphone=htmlspecialchars(strip_tags($this->tphone));
            $this->reg_id=htmlspecialchars(strip_tags($this->reg_id));
            $this->auth_key=htmlspecialchars(strip_tags($this->auth_key));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->status=htmlspecialchars(strip_tags($this->status));
        
            // bind data
            $stmt->bindParam(":ugrp", $this->ugrp);
            $stmt->bindParam(":fname", $this->fname);
            $stmt->bindParam(":lid", $this->lid);
            $stmt->bindParam(":tphone", $this->tphone);
            $stmt->bindParam(":reg_id", $this->reg_id);
            $stmt->bindParam(":auth_key", $this->auth_key);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":status", $this->status); 
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteUser($tp){
            $sqlQuery = "DELETE FROM " . $this->db_user . " WHERE tphone = ?";
            $stmt = $this->conn->prepare($sqlQuery);        
            $this->id=htmlspecialchars(strip_tags($this->uid));        
            $stmt->bindParam(1, $tp);
            $stmt->execute();            
            return $stmt->rowCount();            
        }
/*******************************************************************  Stations ***********************************************/
        public function createStation(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_station ."
                    SET 
                        name = :name, 
                        address= :address, 
                        location = :location, 
                        tele = :tele, 
                        email = :email, 
                        status = :status";
        
            $stmt = $this->conn->prepare($sqlQuery);
            
            // sanitize
            $this->st_name=htmlspecialchars(strip_tags($this->st_name));
            $this->st_address=htmlspecialchars(strip_tags($this->st_address));
            $this->st_location=htmlspecialchars(strip_tags($this->st_location));
            $this->st_tele=htmlspecialchars(strip_tags($this->st_tele));
            $this->st_email=htmlspecialchars(strip_tags($this->st_email));
            $this->st_status='1';
        
            // bind data
            $stmt->bindParam(":name", $this->st_name);
            $stmt->bindParam(":address", $this->st_address);
            $stmt->bindParam(":location", $this->st_location);
            $stmt->bindParam(":tele", $this->st_tele);
            $stmt->bindParam(":email", $this->st_email);
            $stmt->bindParam(":status", $this->st_status);
            $stmt->execute();
            $lastId = $this->conn->lastInsertId();
            
            if($lastId){
               return true;
            }
            return false;
        }

public function getStationS($st){ 

            if ($st!='ALL'){
            $sqlQuery = "SELECT
                     location_id, location_name, email, phone_number, phone_number, created_at, updated_at, is_sms_promotion
                      FROM
                        ". $this->db_station ."
                    WHERE 
                       location_id = ? 
                    ORDER BY location_name 
                    ";
            }else{ $sqlQuery = "SELECT
                        location_id, location_name, email, phone_number, phone_number, created_at, updated_at, is_sms_promotion 
                      FROM
                        ". $this->db_station ."
                       ORDER BY location_name
            ";}
            $stmt = $this->conn->prepare($sqlQuery); ;
            $stmt->bindParam(1, $st, PDO::PARAM_INT);
            $stmt->execute(); 
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($results);
            return $json;
        } 
        
        
        public function getpromotions($st){ 

            if ($st=='ALL'){
                $sqlQuery = "SELECT
                        PRO.pro_id,PRO.lid,PRO.pro_ttl,PRO.promotion,PRO.fr_date,PRO.to_date,PRO.pic1,PRO.status,STA.location,STA.name
                      FROM
                        ". $this->db_promo ." AS PRO 
                        INNER JOIN ". $this->db_station ." AS STA 
                        ON PRO.lid=STA.lid
                    ORDER BY PRO.fr_date,PRO.pro_ttl
                    ";
            }else{ $sqlQuery = "SELECT
                        PRO.pro_id,PRO.lid,PRO.pro_ttl,PRO.promotion,PRO.fr_date,PRO.to_date,PRO.pic1,PRO.status,STA.location,STA.name
                      FROM
                        ". $this->db_promo ." AS PRO 
                        INNER JOIN ". $this->db_station ." AS STA 
                        ON PRO.lid=STA.lid
                    WHERE 
                       PRO.lid =?
                    ORDER BY PRO.fr_date,PRO.pro_ttl
                    ";}
            $stmt = $this->conn->prepare($sqlQuery); ;
            $stmt->bindParam(1, $st, PDO::PARAM_INT);
            $stmt->execute(); 
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($results);
            return $json;
        }
        
        public function getStationAdmins($st){ 

            if ($st=='ALL'){
                $sqlQuery = "SELECT
                        USR.id, 
                        STA.location_name,
                        STA.phone_number Stele,STA.is_sms_promotion,
                        STA.email,
                        USR.phone_number,
                        USR.first_name, 
                        USR.lid,
                        USR.is_active
                      FROM
                        ". $this->db_user ." AS USR 
                        INNER JOIN ". $this->db_station ." AS STA 
                        ON USR.lid=STA.location_id
                    WHERE 
                       USR.user_type ='1'
                    ORDER BY STA.location_name,USR.first_name
                    ";
            }else{ $sqlQuery = "SELECT
                        USR.id, 
                        STA.location_name,
                        STA.phone_number Stele,STA.is_sms_promotion,
                        STA.email,
                        USR.phone_number,
                        USR.first_name, 
                        USR.lid,
                        USR.is_active
                      FROM
                        ". $this->db_user ." AS USR 
                        LEFT JOIN ". $this->db_station ." STA 
                        ON USR.lid=STA.location_id
                    WHERE 
                       USR.user_type ='1' AND
                       USR.lid = ".$st."
                    ORDER BY STA.location_name,USR.first_name
                    ";}
            $stmt = $this->conn->prepare($sqlQuery); ;
            $stmt->bindParam(1, $st, PDO::PARAM_INT);
            $stmt->execute(); 
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($results);
            return $json;
        }
        
        public function updateStation($op){
            if($op=='U'){
            $sqlQuery = "UPDATE
                        ". $this->db_station ."
                    SET
                        location_name = :name, 
                        email = :email,  
                        phone_number = :tele, 
                        created_at = :cerate_at,
                        updated_at = :updated_at,
                        is_sms_promotion = :sms
                    WHERE 
                        location_id = :lid";
        }else {
            $sqlQuery = "INSERT
                        ". $this->db_station ."
                    SET
                        location_name = :name, 
                        email = :email,  
                        phone_number = :tele, 
                        created_at = :cerate_at,
                        updated_at = :updated_at,
                        is_sms_promotion = :sms";
        }  
            $stmt = $this->conn->prepare($sqlQuery);
            $this->st_lid=htmlspecialchars(strip_tags($this->st_lid));
            $this->st_location=htmlspecialchars(strip_tags($this->st_location));    
            $this->st_email=htmlspecialchars(strip_tags($this->st_email)); 
            $this->st_tele=htmlspecialchars(strip_tags($this->st_tele));
            $this->st_sms=htmlspecialchars(strip_tags($this->st_sms));      
        
            // bind data
            $s=time();
            $this->updated_at=$s;
            $this->created_at=$s;
            if($op=='U') $stmt->bindParam(":lid", $this->st_lid);
            $stmt->bindParam(":name", $this->st_location);
            $stmt->bindParam(":email", $this->st_email);
            $stmt->bindParam(":tele", $this->st_tele);
            $stmt->bindParam(":cerate_at", $this->updated_at,PDO::PARAM_INT );
            $stmt->bindParam(":updated_at", $this->created_at,PDO::PARAM_INT);   
            $stmt->bindParam(":sms", $this->st_sms);
            $data=$stmt->execute(); 
                if ($this->st_lid=="0" && $data){
                    $id=$this->conn->lastInsertId();
                    $ret = array("id"=>$id, "stat"=>true);
                    return $ret;
                }elseif($data){
                    $ret = array("id"=>$this->st_lid, "stat"=>true);
                    return $ret;
                }else{
                    $ret = array("id"=>$this->st_lid, "stat"=>false);
                    return $ret;
                } 
        }
        
        public function InsertStation(){
            $sqlQuery = "UPDATE
                        ". $this->db_station ."
                    SET
                        location_name = :name, 
                        email = :email,  
                        phone_number = :tele, 
                        create_at = :cerate_at,
                        update_at = :status
                    WHERE 
                        location_id = :lid";
        
            $stmt = $this->conn->prepare($sqlQuery);
   
            $this->st_name=htmlspecialchars(strip_tags($this->st_name));
            $this->st_address=htmlspecialchars(strip_tags($this->st_address));
            $this->st_location=htmlspecialchars(strip_tags($this->st_location));
            $this->st_tele=htmlspecialchars(strip_tags($this->st_tele));
            $this->st_email=htmlspecialchars(strip_tags($this->st_email)); 
            $this->st_status=htmlspecialchars(strip_tags($this->st_status));
        
            // bind data
            $stmt->bindParam(":name", $this->st_name);
            $stmt->bindParam(":address", $this->st_address);
            $stmt->bindParam(":location", $this->st_location);
            $stmt->bindParam(":tele", $this->st_tele);
            $stmt->bindParam(":email", $this->st_tele); 
            $stmt->bindParam(":status", $this->st_status); 
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        
        public function updatePromotion(){
 
            $this->pro_id=htmlspecialchars(strip_tags($this->pro_id)); 
            $this->pro_ttl=htmlspecialchars(strip_tags($this->pro_ttl));
            $this->st_lid=htmlspecialchars(strip_tags($this->st_lid));
            $this->fr_date=htmlspecialchars(strip_tags($this->fr_date));
            $this->to_date=htmlspecialchars(strip_tags($this->to_date));
            $this->pro_pic1=htmlspecialchars(strip_tags($this->pro_pic1));
            $this->pro_status=htmlspecialchars(strip_tags($this->pro_status));
            
        if ($this->pro_id=="0"){ 
            $updMode= "INSERT INTO ";
            $updSele=""; }else{ 
                $updMode= "UPDATE ";
                $updSele=" Where pro_id=:pro_id"; 
            }
        
        $sqlQuery = "$updMode
            ". $this->db_promo ."
        SET 
            lid = :lid,
            pro_ttl = :pro_ttl,
            promotion = :promotion,    
            fr_date = '$this->fr_date', 
            to_date = '$this->to_date',
            pic1 = :pic1,
            status = :status $updSele"; 
/*
            lid = :lid,
            pro_ttl = :pro_ttl,
            promotion = :promotion,    
            fr_date = :fr_date, 
            to_date = :to_date,
            pic1 = :pic1,
            status = :status $updSele"; 
 */
        $stmt = $this->conn->prepare($sqlQuery);

            // bind data
        if ($this->pro_id!="0"){ 
            $stmt->bindParam(":pro_id", $this->pro_id );} 
            $stmt->bindParam(":lid", $this->st_lid );  
            $stmt->bindParam(":pro_ttl", $this->pro_ttl);
            $stmt->bindParam(":promotion",$this->pro_pic1 );
        /*    $stmt->bindParam(":fr_date ", $this->fr_date, PDO::PARAM_STR  );
            $stmt->bindParam(":to_date ", $this->to_date, PDO::PARAM_STR   );   */
            $stmt->bindParam(":pic1", $this->pro_pic1 ); 
            $stmt->bindParam(":status", $this->pro_status); 
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
    }
    
class txtArrayObject extends ArrayObject {   
    public function __set($name, $val) {
        $this[$name] = $val;
    }

    public function __get($name) {
        return $this[$name];
    }
}
?>