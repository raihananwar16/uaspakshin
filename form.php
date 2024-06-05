<?php
require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
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
                if (isset($_POST["submit"])) :
                    $sql = "INSERT INTO tbsiswa VALUES (
											null,
                                            '" . $_POST["nama"] . "',
                                            '" . $_POST["email"] . "',
                                            '" . $_POST["umur"] . "',
                                            '" . $_POST["jurusan"] . "',
											'" . $_POST["sosmed"] . "',
											'" . $_POST["alamat"] . "'
                                            )";
                    if (mysqli_query($conn, $sql)) : ?>
                        <div class="alert alert-success" role="alert">
                            Berhasil menambahkan data siswa
                        </div>
                    <?php else : ?>
                        <div class="alert alert-danger" role="alert">
                            Gagal menambahkan data siswa
                        </div>
                <?php endif;
                endif;
                ?>
                <div class="card">
                    <div class="card-header">
                        Input Data
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="text" class="form-control" id="umur" name="umur">
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan">
                            </div>
                            <div class="mb-3">
                                <label for="sosmed" class="form-label">Sosial Media Instagram</label>
                                <input type="text" class="form-control" id="sosmed" name="sosmed">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Tinggal</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>