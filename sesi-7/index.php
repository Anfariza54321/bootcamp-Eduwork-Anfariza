<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas PHP</title>

    <!-- Bootsrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Lexend Deca", sans-serif;
        }
    </style>


</head>

<body>
    <div class="container w-50 py-5 my-2 rounded shadow bg-primary-subtle">
        <form action="fileSimpan.php" method="POST" id="formSepatu" enctype="multipart/form-data">
            <h1 class="text-center mb-3">FORM ADD SEPATU</h1>
            <div class="mb-3">
                <label for="gambarInput" class="form-label">Masukkan Gambar</label>
                <input type="file" class="form-control" id="gambarInput" accept=".jpg, .jpeg" name="gambar_input">
                <small id="errorGambar" style="color: red; font-style:italic;"></small>
            </div>
            <div class="mb-3">
                <label for="nameInput" class="form-label">Nama Sepatu</label>
                <input type="text" class="form-control" id="nameInput" placeholder="Contoh : Adidas Samba OG" name="name_input">
                <small id="errorName" style="color: red; font-style:italic;"></small>
            </div>
            <div class="mb-3">
                <label for="priceInput" class="form-label">Harga</label>
                <input type="Number" class="form-control" id="priceInput" placeholder="Contoh : 1500000" name="price_input">
                <small id="errorPrice" style="color: red; font-style:italic;"></small>
            </div>
            <div class="mb-3">
                <label for="merekSelect" class="form-label">Merek Sepatu</label>
                <select class="form-select" aria-label="Default select example" id="merekSelect" name="merek_select">
                    <option value="" selected>Pilih merek</option>
                    <option value="1">Adidas</option>
                    <option value="2">Nike</option>
                    <option value="3">Vans</option>
                    <option value="3">Reebok</option>
                    <option value="3">Puma</option>
                    <option value="3">Ortuseight</option>
                    <option value="3">Aerostreet</option>
                </select>
                <small id="errorSelect" style="color: red; font-style:italic;"></small>
            </div>
            <div class="mb-3">
                <label for="totalInput" class="form-label">Jumlah</label>
                <input type="Number" class="form-control" id="totalInput" placeholder="Contoh : 10" name="total_input">
                <small id="errorTotal" style="color: red; font-style:italic;"></small>
            </div>
            <div class="mb-3">
                <label for="deskripsiInput" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsiInput" rows="3" name="deskripsi_input"></textarea>
                <small id="errorDeskripsi" style="color: red; font-style:italic;"></small>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary mt-3" id="addBtn" type="submit">Tambah</button>
            </div>
        </form>
    </div>
    <script>
        const addBtn = document.getElementById('addBtn');
        const formSepatu = document.getElementById('formSepatu');
        const nameInput = document.getElementById('nameInput');
        const priceInput = document.getElementById('priceInput');
        const merekSelect = document.getElementById('merekSelect');
        const totalInput = document.getElementById('totalInput');
        const deskripsiInput = document.getElementById('deskripsiInput');
        const errorName = document.getElementById('errorName');
        const errorPrice = document.getElementById('errorPrice');
        const errorSelect = document.getElementById('errorSelect');
        const errorTotal = document.getElementById('errorTotal');
        const errorDeskripsi = document.getElementById('errorDeskripsi');
        const gambarInput = document.getElementById('gambarInput');


        function cekValidasi(e) {
            e.preventDefault();
            let isFormValid = true;
            const file = gambarInput.files[0];

            nameInput.classList.remove('is-invalid');
            priceInput.classList.remove('is-invalid');
            merekSelect.classList.remove('is-invalid');
            totalInput.classList.remove('is-invalid');

            errorName.innerHTML = "";
            errorPrice.innerHTML = "";
            errorSelect.innerHTML = "";
            errorTotal.innerHTML = "";

            if (nameInput.value.trim() === "") {
                errorName.innerHTML = 'Masukkan nama yang benar';
                nameInput.classList.add('is-invalid');
                isFormValid = false;
            } else {
                nameInput.classList.add('is-valid');
            };
            if (priceInput.value < 100000) {
                errorPrice.innerHTML = 'Masukkan minimal 100000';
                priceInput.classList.add('is-invalid');
                isFormValid = false;
            } else {
                priceInput.classList.add('is-valid');
            };
            if (merekSelect.value === "") {
                errorSelect.innerHTML = 'Masukkan Merek terlebih dahulu';
                merekSelect.classList.add('is-invalid');
                isFormValid = false;
            } else {
                merekSelect.classList.add('is-valid');
            };
            if (totalInput.value <= 0) {
                errorTotal.innerHTML = 'Jumlah tidak boleh kosong'
                totalInput.classList.add('is-invalid');
                isFormValid = false;
            } else {
                totalInput.classList.add('is-valid');
            };
            if (gambarInput.value.length === 0) {
                errorGambar.innerHTML = 'Pilih file terlebih dahulu';
                gambarInput.classList.add('is-invalid');
                isFormValid = false;
            } else {
                if (gambarInput.files[0].size > 2 * 1024 * 1024) {
                    errorGambar.innerHTML = 'Ukuran file terlalu besar (Maks 2MB)';
                    gambarInput.classList.add('is-invalid');
                    isFormValid = false;
                } else if (file) {
                    const namaFile = file.name.toLowerCase();

                    if (!namaFile.endsWith('.jpg') && !namaFile.endsWith(',jpeg')) {
                        errorGambar.innerHTML = 'Hanya boleh file .jpg atau . jpeg';
                        gambarInput.classList.add('is-invalid');
                        isFormValid = false;
                    } else {
                        gambarInput.classList.remove('is-invalid');
                        gambarInput.classList.add('is-valid');
                        errorGambar.innerHTML = "";
                    }
                }

            };

            if (isFormValid === true) {
                formSepatu.submit();
            }
        }

        addBtn.addEventListener("click", cekValidasi);

        nameInput.addEventListener("input", function() {
            if (nameInput.value.trim() !== "") {
                nameInput.classList.remove('is-invalid');
                nameInput.classList.add('is-valid');
                errorName.innerHTML = "";
            } else {
                nameInput.classList.add('is-invalid');
                nameInput.classList.remove('is-valid');
                errorName.innerHTML = 'Masukkan nama yang benar';
            }
        })

        priceInput.addEventListener("input", function() {
            if (priceInput.value !== "") {
                priceInput.classList.remove('is-invalid');
                priceInput.classList.add('is-valid');
                errorPrice.innerHTML = "";
            } else {
                priceInput.classList.add('is-invalid');
                priceInput.classList.remove('is-valid');
                errorPrice.innerHTML = 'Masukkan minimal 100000';
            }
        })

        merekSelect.addEventListener("input", function() {
            if (merekSelect.value !== "") {
                merekSelect.classList.remove('is-invalid');
                merekSelect.classList.add('is-valid');
                errorSelect.innerHTML = "";
            } else {
                merekSelect.classList.add('is-invalid');
                merekSelect.classList.remove('is-valid');
                errorSelect.innerHTML = 'Masukkan Merek Terlebih dahulu';
            }
        })

        totalInput.addEventListener("input", function() {
            if (totalInput.value !== "") {
                totalInput.classList.remove('is-invalid');
                totalInput.classList.add('is-valid');
                errorTotal.innerHTML = "";
            } else {
                totalInput.classList.add('is-invalid');
                totalInput.classList.remove('is-valid');
                errorTotal.innerHTML = 'Jumlah tidak boleh kosong';
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>