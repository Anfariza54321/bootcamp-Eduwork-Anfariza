

window.toggleDropdown = function (id) {
    const dropdown = document.getElementById(id);
    document
        .querySelectorAll('[id$="Modal"], [id^="dropdown"]')
        .forEach((el) => {
            if (el.id !== id) {
                el.classList.add("hidden");
            }
        });
    dropdown.classList.toggle("hidden");
};

window.openProductModal = function (id, name, price, image) {
    const modal = document.getElementById("product-modal");
    const form = document.getElementById("add-to-cart-form");

    // 1. Isi tampilan modal
    document.getElementById("modal-title").innerText = name;
    document.getElementById("modal-price").innerText = "Rp " + price;
    document.getElementById("modal-img").src = image;

    // 2. ISI DATA HIDDEN
    document.getElementById("modal-hidden-nama").value = name;
    document.getElementById("modal-hidden-harga").value = price.replace(
        /\./g,
        "",
    );

    const imageName = image.split("/").pop();
    document.getElementById("modal-hidden-gambar").value = imageName;

    // 3. Set Action URL
    form.action = "/cart/add/" + id;

    modal.classList.remove("hidden");
    modal.classList.add("flex");
    document.body.style.overflow = "hidden";
};

window.closeModal = function () {
    const modal = document.getElementById("product-modal");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
    document.body.style.overflow = "auto";
};

// Gabungkan logika window.onclick
window.onclick = function (event) {
    const modal = document.getElementById("product-modal");

    // Tutup modal jika klik di area gelap (overlay)
    if (event.target == modal) {
        window.closeModal();
    }

    // Tutup dropdown jika klik di luar button
    if (!event.target.closest("button")) {
        document
            .querySelectorAll('[id$="Modal"], [id^="dropdown"]')
            .forEach((el) => {
                el.classList.add("hidden");
            });
    }
};
