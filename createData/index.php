<?php include "../data/index.php";

$nim = "";
$nama = "";
$alamat = "";
$fakultas = "";
$sukses = "";
$error = "";
$err_nim = "";
$err_nama = "";
$err_alamat = "";
$err_fakultas = "";

if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $fakultas = $_POST['fakultas'];

    if (empty($nim)) {
        $err_nim = "Silahkan Masukan NIM";
    }
    if (empty($nama)) {
        $err_nama = "Silahkan Masukan Nama";
    }
    if (empty($alamat)) {
        $err_alamat = "Silahkan Masukan ALamat";
    }
    if (empty($fakultas)) {
        $err_fakultas = "Silahkan Masukan Fakultas";
    }
    if ($nim && $nama && $alamat && $fakultas) {
        try {
            $sql = "INSERT INTO mahasiswa(nim, nama, alamat, fakultas) VALUES ('$nim', '$nama','$alamat', '$fakultas')";
            $q1 = mysqli_query($db, $sql);
            if ($q1) {
                $sukses = "berhasil";
            } else {
                $error = "gagal";
            }
        } catch (mysqli_sql_exception $e) {
            $error = "Nim Tidak Boleh Sama";
        }
    } 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- Masukan Data -->
        <div class="card">
            <h5 class="card-header">Create</h5>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $sukses ?>
                    </div>
                <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                        <p><?= $err_nim ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        <p><?= $err_nama ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        <p><?= $err_alamat ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas</label>
                        <select class="form-control" name="fakultas" id="fakultas">
                            <option value="">Pilih Fakultas</option>
                            <option value="saintek" <?php if ($fakultas == "saintek") echo "selected" ?>>saintek</option>
                            <option value="soshum" <?php if ($fakultas == "soshum") echo "selected" ?>>soshum</option>
                        </select>
                        <p><?= $err_fakultas ?></p>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="simpan data" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>