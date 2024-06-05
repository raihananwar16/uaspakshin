<?php
require_once 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg  bg-secondary-subtle">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/logo.png" alt="Logo" width="30" class="d-inline-block align-text-top">
                SMK NEGERI 1 PROBOLINGGO
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="table.php">Data</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="table.php">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
                    <button class="btn btn-warning" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <main class="container-fluid py-3">
        <div class="row">
            <div class="col"></div>
            <div class="col-9">
                <?php
                if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['success'] ?>
                    </div>
                <?php
                    unset($_SESSION['success']);
                endif;
                if (isset($_SESSION['fail'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['fail'] ?>
                    </div>
                <?php
                    unset($_SESSION['fail']);
                endif; ?>
                <div class="card">
                    <div class="card-header">
                        Data Siswa SMK Negeri 1 Probolinggo <a href="form.php" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped mt-2 shadow-sm">
                            <thead class="table-dark">
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Umur</th>
                                    <th>Jurusan</th>
                                    <th>Instagram</th>
                                    <th>Alamat</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                <?php 
                                $counter = 1;
                                $sql = "SELECT * FROM tbsiswa WHERE nama LIKE '%".($_GET['query']??"")."%' 
                                ";
                                $result = mysqli_query($conn, $sql);
                                while ($data = mysqli_fetch_array($result)) : ?>
                                    <tr>
                                        <td><?= $counter++ ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['email'] ?></td>
                                        <td><?= $data['umur'] ?></td>
                                        <td><?= $data['jurusan'] ?></td>
                                        <td><?= $data['sosmed'] ?></td>
                                        <td><?= $data['alamat'] ?></td>
                                        <td>
                                            <form method="POST" action="hapus-siswa.php">
                                                <button type="submit" class="btn btn-danger" name="id" value="<?= $data['id'] ?>">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>