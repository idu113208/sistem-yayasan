<?php
header('Content-Type: application/json');
require 'db_connect.php';

try {
    // Mahasiswa$stmt =$pdo->query("SELECT COUNT(*) as total FROM mahasiswa WHERE status = 'aktif'");$mahasiswa_total =$stmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    // Tren Mahasiswa (contoh: bandingkan dengan bulan lalu)
    $stmt =$pdo->query("SELECT COUNT(*) as total FROM mahasiswa WHERE status = 'aktif' AND created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)");$mahasiswa_new =$stmt->fetch(PDO::FETCH_ASSOC)['total'];$mahasiswa_trend =$mahasiswa_total > 0? round(($mahasiswa_new /$mahasiswa_total) * 100, 1) : 0;

    // Pelajar$stmt =$pdo->query("SELECT COUNT(*) as total FROM pelajar WHERE status = 'aktif'");$pelajar_total =$stmt->fetch(PDO::FETCH_ASSOC)['total'];$stmt =$pdo->query("SELECT COUNT(*) as total FROM pelajar WHERE status = 'aktif' AND tanggal_daftar >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)");$pelajar_new =$stmt->fetch(PDO::FETCH_ASSOC)['total'];$pelajar_trend =$pelajar_total > 0? round(($pelajar_new /$pelajar_total) * 100, 1) : 0;

    // Karyawan$stmt =$pdo->query("SELECT COUNT(*) as total FROM karyawan WHERE status = 'aktif'");$karyawan_total =$stmt->fetch(PDO::FETCH_ASSOC)['total'];$stmt =$pdo->query("SELECT COUNT(*) as total FROM karyawan WHERE status = 'aktif' AND created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)");$karyawan_new =$stmt->fetch(PDO::FETCH_ASSOC)['total'];$karyawan_trend =$karyawan_total > 0? round(($karyawan_new /$karyawan_total) * 100, 1) : 0;

    // Kerja Sama$stmt =$pdo->query("SELECT COUNT(*) as total FROM kerja_sama WHERE tanggal_selesai >= CURDATE() OR tanggal_selesai IS NULL");$kerja_sama_total =$stmt->fetch(PDO::FETCH_ASSOC)['total'];$stmt =$pdo->query("SELECT COUNT(*) as total FROM kerja_sama WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)");$kerja_sama_new =$stmt->fetch(PDO::FETCH_ASSOC)['total'];

    echo json_encode([
        'mahasiswa' => ['total' =>$mahasiswa_total, 'trend' =>$mahasiswa_trend],
        'pelajar' => ['total' =>$pelajar_total, 'trend' =>$pelajar_trend],
        'karyawan' => ['total' =>$karyawan_total, 'trend' =>$karyawan_trend],
        'kerja_sama' => ['total' =>$kerja_sama_total, 'new' =>$kerja_sama_new]
    ]);} catch (PDOException$e) {
    echo json_encode(['error' =>$e->getMessage()]);}?> 