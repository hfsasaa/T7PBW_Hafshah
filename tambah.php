<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Data KRS Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Tambah Data KRS</h2>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="npm" class="form-label">Mahasiswa</label>
                    <select name="npm" id="npm" class="form-control" required>
                        <option value="">-- Pilih Mahasiswa --</option>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
                        while ($mhs = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$mhs['npm']}'>{$mhs['npm']} - {$mhs['nama']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="mk" class="form-label">Mata Kuliah</label>
                    <select name="mk" id="mk" class="form-control" required>
                        <option value="">-- Pilih Mata Kuliah --</option>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM matakuliah");
                        while ($mk = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$mk['kodemk']}'>{$mk['kodemk']} - {$mk['nama']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="d-flex mt-4">
                    <button type="submit" name="simpan" class="btn btn-success me-2">
                        <i class="fas fa-save me-2"></i>Simpan
                    </button>
                    <a href="index.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['simpan'])) {
        $npm = mysqli_real_escape_string($conn, $_POST['npm']);
        $mk = mysqli_real_escape_string($conn, $_POST['mk']);

        $insert = mysqli_query($conn, "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$npm', '$mk')");
        if ($insert) {
            echo "<div class='alert alert-success mt-3'>Data berhasil ditambahkan!</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Gagal menyimpan data: " . mysqli_error($conn) . "</div>";
        }
    }
    ?>
</body>
</html>