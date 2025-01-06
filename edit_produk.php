<?php
// Konfigurasi koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db = "religiwisata";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data produk berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM produk_wisata WHERE id = $id");
    $row = $result->fetch_assoc();
} else {
    header("Location: list_produk.php");
    exit;
}

// Update data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_wisata = $_POST['nama_wisata'];
    $deskripsi = $_POST['deskripsi'];
    $foto = $row['foto'];

    // Proses upload foto baru jika ada
    if ($_FILES['foto']['name']) {
        // Hapus foto lama
        if (file_exists("uploads" . $foto)) {
            unlink("uploads" . $foto);
        }

        $foto = basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads" . $foto);
    }

    // Update data di database
    $sql = "UPDATE produk_wisata SET 
            nama_wisata = '$nama_wisata', 
            deskripsi = '$deskripsi', 
            foto = '$foto', 
            tanggal_update = CURRENT_TIMESTAMP
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: list_produk.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk Wisata</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Produk Wisata</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_wisata" class="form-label">Nama Wisata</label>
                <input type="text" name="nama_wisata" id="nama_wisata" class="form-control" value="<?= htmlspecialchars($row['nama_wisata']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required><?= htmlspecialchars($row['deskripsi']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
                <p>Foto saat ini: <img src="uploads<?= $row['foto'] ?>" alt="" width="100"></p>
            </div>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="list_produk.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
