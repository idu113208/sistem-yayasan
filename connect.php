<?php
$host = 'localhost';$dbname = 'lms_bintrebusih';$username = 'root';$password = '';

try {$pdo = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);} catch (PDOException$e) {
    die("Koneksi gagal:".$e->getMessage());}?>