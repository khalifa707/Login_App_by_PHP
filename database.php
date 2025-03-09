<?php
$conn = mysqli_connect("localhost","root","","login_app");
 if ($conn){
     echo "Connected successfully";
 }else {
     echo "Connection failed";
 }