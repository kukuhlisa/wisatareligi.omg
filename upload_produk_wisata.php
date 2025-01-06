<?php
// Konfigurasi koneksi ke database
$host = "localhost";
$user = "root";      // Sesuaikan dengan username database Anda
$pass = "";          // Sesuaikan dengan password database Anda
$db   = "religiwisata";    // Sesuaikan dengan nama database Anda

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_wisata = $conn->real_escape_string($_POST['nama_wisata']);
    $deskripsi   = $conn->real_escape_string($_POST['deskripsi']);
    
    // Proses upload foto
    $target_dir = "uploads"; // Folder untuk menyimpan foto
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
    // Cek jika file gambar valid
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }
    
    // Cek apakah file sudah ada
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES["foto"]["size"] > 5000000) { // 5MB limit
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    // Cek format file
    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }

    // Jika semuanya OK, coba upload file
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " has been uploaded.<br>";

            // Menyimpan data ke database
            $foto = basename($_FILES["foto"]["name"]);
            $sql = "INSERT INTO produk_wisata (nama_wisata, deskripsi, foto, tanggal_update)
                    VALUES ('$nama_wisata', '$deskripsi', '$foto', CURRENT_TIMESTAMP())";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully.<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }
}

// Tutup koneksi
$conn->close();
?>
