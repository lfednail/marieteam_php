<?php
if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
    header('location: /marieteam_php');
}