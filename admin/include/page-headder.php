<?php
if($_SESSION['Grp']=='SA'){
    echo'   <div class="navbar col-md-12">
        <div class="icon col-md-6">
            <div class="logo"> 
                <img src="../files/assets/images/logos.png" alt="Italian Trulli">
            </div>
        </div>
            <div class="menu col-md-4 "></div>
            <div class="head-usr col-md-2  ">'.$_SESSION['uname'].'</div>
             </div> 
            <div class="menu col-md-4 "></div>
            <div id="logout" onclick="document.location='."'admin-sign-in.php'".'" class="head-usr col-md-2 btn btn-success" style="top: 80px;background-color: #06a9e9;">Logout</div>
             </div>';
}else{
    echo'   <div class="navbar col-md-12">
        <div class="icon col-md-6">
            <div class="logo"> 
                <img src="../files/assets/images/logos.png" alt="Italian Trulli">
            </div>
        </div>
            <div class="menu col-md-4 "></div>
            <div class="head-usr col-md-2  ">'.$_SESSION['uname'].'</div>
             </div> 
            <div class="menu col-md-4 "></div>
            <div id="logout" onclick="document.location='."'admin-sign-in.php'".'"  class="head-usr col-md-2 btn btn-success" style="top: 80px;background-color: #06a9e9;">Logout</div>
             </div>';
}