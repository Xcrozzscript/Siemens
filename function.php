<?php
session_start();
// Konfigurasi Database
$conn = mysqli_connect("localhost", "root", "", "siemens_db");

if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error()); // Ini akan menghentikan eksekusi dan menampilkan error
}

//else {
    //echo "Koneksi database berhasil!"; // Tambahkan ini
//}
