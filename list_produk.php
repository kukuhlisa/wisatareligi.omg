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

// Hapus data jika tombol hapus diklik
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    // Hapus file foto dari folder
    $result = $conn->query("SELECT foto FROM produk_wisata WHERE id = $delete_id");
    $row = $result->fetch_assoc();
    if (file_exists("uploads" . $row['foto'])) {
        unlink("uploads" . $row['foto']);
    }
    // Hapus data dari database
    $conn->query("DELETE FROM produk_wisata WHERE id = $delete_id");
    header("Location: list_produk.php"); // Redirect setelah menghapus
    exit;
}

// Ambil semua data dari tabel produk_wisata
$sql = "SELECT * FROM produk_wisata";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk Wisata</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Produk Wisata</h1>
        <a href="form_upload.php" class="btn btn-primary mb-3">Tambah Produk Wisata</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Wisata</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Tanggal Update</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['nama_wisata']) ?></td>
                            <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                            <td>
                                <img src="uploads<?= $row['foto'] ?>" alt="<?= htmlspecialchars($row['nama_wisata']) ?>" width="100">
                            </td>
                            <td><?= $row['tanggal_update'] ?></td>
                            <td>
                                <a href="edit_produk.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="?delete_id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
