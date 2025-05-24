<?php
header('Content-Type: application/json');
require 'db_connect.php';$data = json_decode(file_get_contents('php://input'), true);

try {$stmt =$pdo->prepare("INSERT INTO mahasiswa (nim, nama, program_studi, angkatan, status, email) VALUES (?,?,?,?,?,?)");$stmt->execute([$data['nim'],$data['nama'],$data['program_studi'],$data['angkatan'],$data['status'],$data['email'] ?? null
    ]);
    echo json_encode(['success' => true]);} catch (PDOException$e) {
    echo json_encode(['success' => false, 'message' =>$e->getMessage()]);}?>

    <?php
// simpan file ini sebagai api/fetch_mahasiswa.php
header('Content-Type: application/json');

$mahasiswa = [
    [
        "nim" => "123456",
        "nama" => "Andi Susanto",
        "program_studi" => "Teknik Informatika",
        "angkatan" => 2020,
        "status" => "aktif"
    ],
    [
        "nim" => "654321",
        "nama" => "Budi Hartono",
        "program_studi" => "Manajemen",
        "angkatan" => 2019,
        "status" => "cuti"
    ],
    [
        "nim" => "112233",
        "nama" => "Citra Dewi",
        "program_studi" => "Akuntansi",
        "angkatan" => 2021,
        "status" => "lulus"
    ]
];

echo json_encode($mahasiswa);
?>