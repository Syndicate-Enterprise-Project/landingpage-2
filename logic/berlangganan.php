<?php
require('config.php');
require('Flash.php');

if (isset($_POST['berlangganan'])) {
    $email = $_POST['email'];
    $stmt = $conn->prepare("INSERT INTO langganan VALUES ('',?)");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    flash::setFlash('Berhasil', 'Belangganan', 'success');
    header("Location: ../home.php");
} else {
    flash::setFlash('Gagal', 'Belangganan', 'error');
    header("Location: ../home.php");
}
