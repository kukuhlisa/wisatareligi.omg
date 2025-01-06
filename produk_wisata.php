<?php
include "header.php";
include "sidebar.php";
?>

<main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->
    <h2>Form Upload Data Produk Wisata</h2>
    <form action="upload_produk_wisata.php" method="post" enctype="multipart/form-data">
        <label for="nama_wisata">Nama Wisata:</label><br>
        <input type="text" id="nama_wisata" name="nama_wisata" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" rows="4" cols="50" required></textarea><br><br>

        <label for="foto">Foto Wisata:</label><br>
        <input type="file" id="foto" name="foto" accept="image/*" required><br><br>

        <input type="submit" value="Upload Produk Wisata">
    </form>
    </div>
</div>
</main>

<?php

include "footer.php";

?>