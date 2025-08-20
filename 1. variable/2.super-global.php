<?php

// semua yang ada di valriable super global $_GET, $_POST, $_COOKIES, $_SESSION, $_REQUEST, $_SERVERNAME, dsb...
// all information about server & request
$global = $GLOBALS;
// print_r($global);

// mengambil data dari query string / dari form yang disubmit menggunakan method GET
// hasilnya berupa associative array
$data = $_GET;
// print_r($data);

// mengambil data dari form yang disubmit menggunakan method POST
// hasilnya berupa associative array
$data = $_POST;
// print_r($data);

// semua data yang dikirim menggunakan GET, POST, PUT, PATCH, DELETE
$request = $_REQUEST;
print_r($request);

// menampilkan data session
$session = @$_SESSION;
// print_r($session);

// menampilkan data cookie
$cookies = $_COOKIE;
// print_r($cookies);


// semua informasi tentang server
$server = $_SERVER;
print_r($server);
