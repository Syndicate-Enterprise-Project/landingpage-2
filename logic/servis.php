<?php
require('config.php');
require('Flash.php'); // Sesuaikan dengan nama dan path file Flash.php

// require './vendor/autoload.php';
require __DIR__ . '/../vendor/autoload.php';

# use "use" after include or require

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/../vendor/phpmailer/phpmailer/src/Exception.php';
require __DIR__ . '/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/../vendor/phpmailer/phpmailer/src/SMTP.php';

function generateQueueNumber()
{
    // Mendapatkan tanggal saat ini
    $currentDate = date('Y-m-d');

    // Mendapatkan bulan dan tanggal dari tanggal saat ini
    $month = date('M', strtotime($currentDate));
    $day = date('d', strtotime($currentDate));

    // Mendapatkan nomor antrian untuk tanggal saat ini
    $queueNumber = 1;

    // Direktori penyimpanan nomor antrian
    $directory = 'queue_numbers/';

    // Membuat direktori jika belum ada
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }

    // Jika file penyimpanan nomor antrian untuk tanggal saat ini ada
    $filename = $directory . $currentDate . '.txt';
    if (file_exists($filename)) {
        // Baca nomor antrian terakhir dari file
        $lastQueueNumber = intval(file_get_contents($filename));
        // Increment nomor antrian
        $queueNumber = $lastQueueNumber + 1;
    }

    // Simpan nomor antrian ke file untuk digunakan pada hari berikutnya
    file_put_contents($filename, $queueNumber);

    // Format nomor antrian dengan format "Bulan-Tanggal-NomorAntrian"
    $formattedQueueNumber = sprintf("%s-%02d-%04d", $month, $day, $queueNumber);

    return $formattedQueueNumber;
}

// Contoh penggunaan

$result = $conn->query("SELECT ID_pegawai FROM pegawai");
$id = [];
while ($data = $result->fetch_assoc()) {
    $id[] = intval($data['ID_pegawai']);
}

$antrian = generateQueueNumber();
$servis = $_POST['servis'];
$nama = $_POST['user-name'];
$phone = $_POST['user-phone'];
$tanggal = $_POST['date'];
$pesan = $_POST['pesan'];
$idPegawaiIndex = array_rand($id);
$idPegawai = $id[$idPegawaiIndex];


$stmt = $conn->prepare("INSERT INTO servis VALUES ('',?,?,?,?,?,?,?)");
$stmt->bind_param('sssssss', $servis, $nama, $phone, $antrian, $tanggal, $pesan, $idPegawai);
$stmt->execute();
$email = $_POST['user-email'];


// PHPMail
if (isset($_POST["send"])) {
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chery.syndicate@gmail.com';
        $mail->Password = 'ybjm ctcj ayws pwlp';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = '465';

        $mail->setFrom('chery.syndicate@gmail.com');
        $mail->addAddress($_POST["user-email"]);
        $mail->isHTML(true);
        $mail->Subject = 'Antrian Servis Chery Samarinda';
        $mail->Body = "Antrian: " . $antrian;
        $mail->send();

        Flash::setFlash('Berhasil','Mendaftar Servis','success');
        header("Location: ../servis.php");
    } catch (Exception $e) {
        echo "<script>alert('Gagal mengirim email. Pesan error: {$mail->ErrorInfo}');</script>";
    }
}
