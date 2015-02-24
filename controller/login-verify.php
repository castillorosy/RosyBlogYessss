<?php
//this page  is to make sure the user is logged in
require_once (__DIR__ . "/../model/config.php");
//if its not set if it isnt true they cannot login
function authenticateUser(){
   if(!isset($_SESSION["authenticated"])){
       return false;
   }
   else {
       if($_SESSION["authenticated"] != true){
       }
       else{
           return true;
       }
   }
}