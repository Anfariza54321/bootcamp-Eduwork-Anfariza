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

window.openProductModal = function (id, name, price, image, slug) {
    const modal = document.getElementById("product-modal");
    const form = document.getElementById("add-to-cart-form");

    document.getElementById("modal-title").innerText = name;
    document.getElementById("modal-price").innerText = "Rp " + price;
    document.getElementById("modal-img").src = image;

    
    document.getElementById("modal-hidden-nama").value = name;
    document.getElementById("modal-hidden-harga").value = price.replace(
        /\./g,
        "",
    );

    const imageName = image.split("/").pop();
    document.getElementById("modal-hidden-gambar").value = imageName;

    
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


window.onclick = function (event) {
    const modal = document.getElementById("product-modal");

    if (event.target == modal) {
        window.closeModal();
    }

    if (!event.target.closest("button")) {
        document
            .querySelectorAll('[id$="Modal"], [id^="dropdown"]')
            .forEach((el) => {
                el.classList.add("hidden");
            });
    }
};
