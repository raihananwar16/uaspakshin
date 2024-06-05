<?php
    session_start();
    require_once 'connection.php';
    if(!isset($_POST['id'])){
        header("Location: table.php");
        exit();
    }

    $sql = "DELETE FROM tbsiswa WHERE id = ".$_POST["id"];
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Hapus data siswa berhasil";
    }else{
        $_SESSION['fail'] = "Hapus data siswa gagal";
    }

    header("Location: table.php");
    exit();
?>