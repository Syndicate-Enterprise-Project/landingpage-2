<?php
session_start();
class flash
{
    public static function setFlash($title, $pesan, $icon)
    {
        $_SESSION['flash'] = [
            'title' => $title,
            'pesan' => $pesan,
            'icon' => $icon
        ];
    }
}
