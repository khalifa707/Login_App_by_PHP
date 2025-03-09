<?php
$con = mysqli_connect("localhost","root","","login_app");
 if ($con){
     echo "Connected successfully";
 }else {
     echo "Connection failed";
 }