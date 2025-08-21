<?php

// untuk menyimpan data berupa text (kumpulan karakter)
// bisa menggunakan single quote ('') atau ("")
$nama = 'Bagas';
echo $nama;

// perhatikan quote
// single quote
echo 'Nama = $nama'; // Nama = $nama

// double quote
echo "Nama = $nama"; // Nama = Bagas

// concatenate (menggabungkan beberapa string)
echo 'Nama = ' . $nama; // Nama = Bagas

// string kosong bernilai false
echo ("" == false); // 1 (artinya true)
