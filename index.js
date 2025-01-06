document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault();

    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const message = document.getElementById("message").value;

    if (name && email && message) {
        alert(`Terima kasih, ${name}! Pesan Anda telah terkirim.`);
    } else {
        alert("Harap isi semua kolom.");
    }
});
