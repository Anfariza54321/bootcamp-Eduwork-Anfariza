const products = [
  // ADIDAS
  {
    nama: "Adidas Ultraboost Light",
    merek: "Adidas",
    harga: "Rp 3.300.000",
    deskripsi:
      "Sepatu lari dengan bantalan ternyaman dan energi balik maksimal.",
    gambar:
      "https://images.unsplash.com/photo-1587563871167-1ee9c731aefb?q=80&w=500",
  },
  {
    nama: "Adidas Samba OG",
    merek: "Adidas",
    harga: "Rp 2.200.000",
    deskripsi:
      "Ikon gaya jalanan klasik dengan desain retro yang tak lekang oleh waktu.",
    gambar:
      "https://images.unsplash.com/photo-1620794341491-76be6eeb6946?q=80&w=500",
  },

  // NIKE
  {
    nama: "Nike Air Force 1 07",
    merek: "Nike",
    harga: "Rp 1.549.000",
    deskripsi: "Legenda basket yang tetap stylish dengan kenyamanan Air-sole.",
    gambar:
      "https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?q=80&w=500",
  },
  {
    nama: "Nike Air Jordan 1 Low",
    merek: "Nike",
    harga: "Rp 1.939.000",
    deskripsi:
      "Inspirasi dari AJ1 original tahun 1985, sempurna untuk gaya kasual.",
    gambar:
      "https://images.unsplash.com/photo-1584735175315-9d5df23860e6?q=80&w=500",
  },

  // PUMA
  {
    nama: "Puma Suede Classic",
    merek: "Puma",
    harga: "Rp 1.299.000",
    deskripsi: "Sepatu suede ikonik yang mendominasi budaya pop sejak 1968.",
    gambar:
      "https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?q=80&w=500",
  },
  {
    nama: "Puma Deviate Nitro 2",
    merek: "Puma",
    harga: "Rp 2.499.000",
    deskripsi: "Sepatu lari performa tinggi dengan teknologi pelat karbon.",
    gambar:
      "https://images.unsplash.com/photo-1608231387042-66d1773070a5?q=80&w=500",
  },

  // REEBOK
  {
    nama: "Reebok Club C 85",
    merek: "Reebok",
    harga: "Rp 1.199.000",
    deskripsi: "Gaya tenis minimalis yang clean dan cocok untuk outfit apapun.",
    gambar:
      "https://images.unsplash.com/photo-1539185441755-769473a23570?q=80&w=500",
  },
  {
    nama: "Reebok Nano X3",
    merek: "Reebok",
    harga: "Rp 2.099.000",
    deskripsi:
      "Sepatu training terbaik untuk angkat beban hingga lari jarak pendek.",
    gambar:
      "https://images.unsplash.com/photo-1603808033192-082d6919d3e1?q=80&w=500",
  },

  // VANS
  {
    nama: "Vans Old Skool Black White",
    merek: "Vans",
    harga: "Rp 1.100.000",
    deskripsi: "Sepatu skate legendaris dengan sidestripe ikonik.",
    gambar:
      "https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?q=80&w=500",
  },
  {
    nama: "Vans Sk8-Hi",
    merek: "Vans",
    harga: "Rp 1.300.000",
    deskripsi:
      "Model high-top yang memberikan perlindungan ekstra pada pergelangan kaki.",
    gambar:
      "https://images.unsplash.com/photo-1560769629-975ec94e6a86?q=80&w=500",
  },

  // ORTUSEIGHT
  {
    nama: "Ortuseight Forte Helios",
    merek: "Ortuseight",
    harga: "Rp 499.000",
    deskripsi: "Sepatu futsal lokal dengan teknologi Quick-Fit yang responsif.",
    gambar:
      "https://images.unsplash.com/photo-1511556532299-8f662fc26c06?q=80&w=500",
  },
  {
    nama: "Ortuseight Hyperglide",
    merek: "Ortuseight",
    harga: "Rp 550.000",
    deskripsi:
      "Sepatu lari harian dengan bantalan empuk dan berat yang ringan.",
    gambar:
      "https://images.unsplash.com/photo-1539185441755-769473a23570?q=80&w=500",
  },

  // AEROSTREET
  {
    nama: "Aerostreet Hoops",
    merek: "Aerostreet",
    harga: "Rp 169.000",
    deskripsi:
      "Sepatu hoops lokal dengan daya tahan tinggi, tidak akan jebol setelah dicuci.",
    gambar:
      "https://images.unsplash.com/photo-1549298916-b41d501d3772?q=80&w=500",
  },
  {
    nama: "Aerostreet Massive Low",
    merek: "Aerostreet",
    harga: "Rp 159.000",
    deskripsi:
      "Model low-cut yang simpel dan terjangkau untuk penggunaan sekolah/kuliah.",
    gambar:
      "https://images.unsplash.com/photo-1560769629-975ec94e6a86?q=80&w=500",
  },
];

// 1. Ambil data dari localStorage
const dataLama = localStorage.getItem("simpananKeranjang");

// 2. Pastikan datanya di-convert balik jadi Array, kalau kosong kasih []
let keranjang = dataLama ? JSON.parse(dataLama) : [];

// 3. Tambahkan pengecekan keamanan: jika ternyata bukan array, paksa jadi array
if (!Array.isArray(keranjang)) {
  keranjang = [];
}

// Fungsi ini hanya untuk MENAMPILKAN data apa saja yang dikirim ke dalamnya
function renderKeHTML(dataYangAkanMuncul) {
  const productContainer = document.getElementById("produkList");
  productContainer.innerHTML = "";

  if (dataYangAkanMuncul.length === 0) {
    productContainer.innerHTML = `<div class="col-12 text-center py-5"><h3>Produk tidak ditemukan.</h3></div>`;
    return;
  }

  dataYangAkanMuncul.forEach((p) => {
    productContainer.innerHTML += `
            <div class="col-md-4 mb-4">
                <div class="card card-product h-100 shadow-sm border-0">
                    <img src="${p.gambar}" class="card-img-top p-3" alt="${p.nama}" style="height: 180px; object-fit: contain;">
                    <div class="card-body d-flex flex-column text-start">
                        <small class="text-uppercase text-danger fw-bold">${p.merek}</small>
                        <h6 class="card-title fw-bold mt-1">${p.nama}</h6>
                        <p class="text-primary fw-bold mt-auto">${p.harga}</p>
                        <button class="btn btn-dark w-100 btn-sm rounded-0" onclick="tambahKeKeranjang('${p.nama}')">BELI SEKARANG</button>
                    </div>
                </div>
            </div>`;
  });
}

function filterSepatu(merek) {
  const hasil =
    merek === "all"
      ? products
      : products.filter((p) => p.merek.toLowerCase() === merek.toLowerCase());

  renderKeHTML(hasil);
}

function cariSepatu() {
  const kataKunci = document.getElementById("searchInput").value.toLowerCase();

  const hasilCari = products.filter((sepatu) => {
    return (
      sepatu.nama.toLowerCase().includes(kataKunci) ||
      sepatu.merek.toLowerCase().includes(kataKunci)
    );
  });

  renderKeHTML(hasilCari); // Panggil fungsi render, bukan filterSepatu!
}

document.addEventListener("DOMContentLoaded", () => {
  renderKeHTML(products); // Munculkan semua produk saat web baru dibuka
});

function tambahKeKeranjang(namaSepatu) {
  const sepatuDitemukan = products.find((item) => item.nama === namaSepatu);

  if (sepatuDitemukan) {
    keranjang.push(sepatuDitemukan);

    updateTampilanKeranjang();

    alert(namaSepatu + " berhasil ditambah ke keranjang");

    console.log("Isi keranjang saat ini:", keranjang);
  }
}

function updateTampilanKeranjang() {
  const elemenAngka = document.getElementById("jumlah-keranjang");

  if (elemenAngka) {
    elemenAngka.innerHTML = keranjang.length;
  }
}

function bukaKeranjang() {
  const isiModal = document.getElementById("isiModalKeranjang");
  const totalElemen = document.getElementById("totalBelanja");

  // 1. Kosongkan isi modal sebelum diisi ulang
  isiModal.innerHTML = "";

  if (keranjang.length === 0) {
    isiModal.innerHTML = "<p class='text-center'>Keranjang masih kosong.</p>";
    totalElemen.innerText = "Total: Rp 0";
  } else {
    let totalHarga = 0;

    // 2. Looping isi keranjang untuk membuat tampilan list
    keranjang.forEach((item, index) => {
      isiModal.innerHTML += `
                <div class="d-flex align-items-center mb-3 border-bottom pb-2">
                    <img src="${item.gambar}" style="width: 50px; height: 50px; object-fit: contain;" class="me-3">
                    <div class="flex-grow-1">
                        <h6 class="mb-0">${item.nama}</h6>
                        <small class="text-muted">${item.harga}</small>
                    </div>
                    <button class="btn btn-sm btn-danger" onclick="hapusDariKeranjang(${index})">Hapus</button>
                </div>
            `;

      // Logika sederhana menghitung total (mengambil angka dari string harga)
      const hargaAngka = parseInt(item.harga.replace(/[^0-9]/g, ""));
      totalHarga += hargaAngka;
    });

    totalElemen.innerText = `Total: Rp ${totalHarga.toLocaleString("id-ID")}`;
  }

  // 3. Munculkan modalnya menggunakan Bootstrap JavaScript
  const myModal = new bootstrap.Modal(
    document.getElementById("modalKeranjang"),
  );
  myModal.show();
}

function hapusDariKeranjang(index) {
  // 1. Ambil instance modal yang sedang terbuka
  const modalElement = document.getElementById("modalKeranjang");
  const modalInstance = bootstrap.Modal.getInstance(modalElement);

  // 2. Tutup modal secara resmi agar backdrop (layar gelap) hilang
  if (modalInstance) {
    modalInstance.hide();
  }

  // 3. Hapus datanya dari array
  keranjang.splice(index, 1);

  // 4. Update angka di ikon merah navbar
  updateTampilanKeranjang();

  // 5. Buka kembali modalnya untuk memperlihatkan daftar terbaru
  // Beri sedikit jeda (delay) agar Bootstrap tidak bentrok saat menutup & membuka
  setTimeout(() => {
    bukaKeranjang();
  }, 300);
}

function prosesCheckout() {
  if (keranjang.length === 0) {
    alert("Pilih sepatu dulu sebelum checkout!");
    return;
  }

  // 1. Hitung total akhir
  let totalHarga = 0;
  keranjang.forEach((item) => {
    totalHarga += parseInt(item.harga.replace(/[^0-9]/g, ""));
  });

  // 2. Beri pesan sukses
  alert(
    `Terima kasih! Pesanan Anda sebanyak ${keranjang.length} item dengan total Rp ${totalHarga.toLocaleString("id-ID")} sedang diproses.`,
  );

  // 3. KOSONGKAN KERANJANG
  keranjang = []; // Menghapus isi array di variabel
  localStorage.removeItem("simpananKeranjang"); // Menghapus catatan di memori browser

  // 4. Update Tampilan
  updateTampilanKeranjang(); // Angka di navbar jadi 0 kembali

  // Tutup modal secara otomatis
  const modalElement = document.getElementById("modalKeranjang");
  const modalInstance = bootstrap.Modal.getInstance(modalElement);
  if (modalInstance) {
    modalInstance.hide();
  }
}