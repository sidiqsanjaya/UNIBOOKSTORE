<?php
//program ini dibuat oleh siddiq sanjaya bakti (INAdik)
date_default_timezone_set('Asia/Jakarta'); //waktu
header("Cache-Control: no-cache, must-revalidate"); //no cache
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); //no cache
header("Pragma: no-cache"); //no cache
define('MyConst', TRUE);
define('debug', FALSE); //set TRUE jika mau debug, SET FALSE jika tidak
ob_start();


$config = [];
$config['database_host'] = '127.0.0.1';     //ip database
$config['database_name'] = 'data';    //nama database
$config['database_user'] = 'root';          //username database
$config['database_pass'] = 'root';          //password database
$config['base_url'] = 'https://localhost';  //alamat web
$config['minimal']  = 10;                   //minimal pengadaan

include 'class.php';

if (!empty($_GET['p'])) {
    $url = $_GET['p'];
} else {
    $url = '';
}

$edb = dbconnect();
if ($edb->connect_errno == 0) {
    if ($url == '' or $url == 'home') {
        include 'view/home.php';
    } elseif ($url == 'admin') {
        include 'view/admin.php';
    } elseif ($url == 'pengadaan') {
        include 'view/pengadaan.php';
    } else {
        echo "not Found 404";
        redirect('');
    }
} else {
    echo '<center><h1 style="background-color:Tomato;">koneksi ke database error<br><u>' . $edb->connect_error . '</u><br>Harap cek kembali konfigurasi untuk database</h1></center>';
}
