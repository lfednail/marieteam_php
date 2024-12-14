<?php

require_once "verify.php";

//verify full form complited
if(
    (isset($_POST['last_name'])) &&
    (isset($_POST['first_name'])) &&
    (isset($_POST['email'])) &&
    (isset($_POST['password']))
){

}else{
    header('register');
}