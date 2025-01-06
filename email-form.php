<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Bagian Hubungi Kami -->
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <p class="text-primary fs-5">Hubungi Kami</p>
                <h1 class="fw-bold mb-4">Ingin bertanya lebih lanjut? Jangan ragu untuk hubungi Kami</h1>
            </div>
        </div>

        <div class="row">
            <!-- Formulir Kontak -->
            <div class="col-md-6 mb-4">
                <form action="send_email.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail Anda</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="e-mail Anda">
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Tinggalkan Pesan Anda Di Sini</label>
                        <textarea class="form-control" id="message" name="message" rows="6"
                            placeholder="Tinggalkan Pesan Anda Di Sini"></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Kirim</button>
                    </div>
                </form>
            </div>

            <!-- Google Maps -->
            <div class="col-md-6">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
