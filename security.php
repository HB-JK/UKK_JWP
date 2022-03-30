<?php 
    session_start();
    require 'connection.php';

    if(!$_SESSION['login']){
        header('location: ../login.php');
    }