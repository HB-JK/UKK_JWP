<?php 
require 'connection.php';

//function yang digunakan untuk mencari data apakah ada atau tidak
function checkData($table, $field, $data){
    global $conn;
    
    $sqlCheck = "SELECT * FROM $table WHERE $field='$data'";
    $queryCheck = mysqli_query($conn, $sqlCheck);
    
    return mysqli_num_rows($queryCheck);
}

//function yang digunakan untuk fetch data dari tabel
function fetchData($table, $field, $data){
    global $conn;
    
    $sqlFetch = "SELECT * FROM $table WHERE $field='$data'";
    $queryFetch = mysqli_query($conn, $sqlFetch);
    $data = mysqli_fetch_array($queryFetch);
    
    return $data;
}