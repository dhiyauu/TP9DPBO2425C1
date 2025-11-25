# TP9DPBO2425C1
## Janji

Saya Dhiya Ulhaq dengan NIM 2407716 Mengerjakan Tugas Praktikum 9 (MVP) dalam Mata Kuliah Desain Pemrograman Berorientasi Objek untuk Keberkahan-Nya Maka Saya Tidak Akan Melakukan Kecurangan Seperti Yang Telah di Spesifikasikan. Aamiin

## Penjelasan Desain Program
Sistem ini dibangun menggunakan arsitektur **MVP (Model – View – Presenter)** untuk memisahkan logika bisnis, tampilan, dan kontrol alur data.
Terdapat dua entitas utama dalam aplikasi:
1. Pembalap
2. Mobil

Setiap mobil harus terhubung dengan satu pembalap menggunakan **foreign key** (`pembalap_id`), sehingga hubungan keduanya bersifat **one-to-many** (1 pembalap bisa punya banyak mobil).

Terdapat 2 tabel beserta atribut pada database, diantaranya:
1. **Tabel `pembalap`**

    Berfungsi untuk menyimpan data pembalap.

    `id` : ID unik pembalap

    `nama` : Nama pembalap

    `tim` : Tim pembalap

    `negara` : Negara asal

    `poin_musim` : Total poin

    `jumlah_menang` : Jumlah kemenangan

2. **Tabel `mobil`**

    Berfungsi untuk menyimpan data mobil dari pembalap. Sehingga relasinya satu mobil harus terhubung ke satu pembalap yang valid.

    `id` : ID unik mobil

    `nama_mobil` : Nama mobil

    `tipe` : Tipe mobil (prototype, street, dll)

    `cc` : Kapasitas mesin

    `top_speed` : Kecepatan maksimum

    `pembalap_id` : Menghubungkan mobil dengan pemilik/pembalap

### Desain Arsitektur Program
1. Model

    Model bertanggung jawab pada operasi database:

    - TabelPembalap.php
    
        `getAllPembalap()`

        `getPembalapById()`

        `addPembalap()`

        `updatePembalap()`

        `deletePembalap()`

    - TabelMobil.php

        `getAllMobil()`

        `getMobilById()`

        `addMobil()`

        `updateMobil()`

        `deleteMobil()`

    Model menggunakan class `DB` untuk menjalankan query SQL.
2. View

    View hanya menampilkan tampilan HTML (tanpa logika bisnis):
    - ViewPembalap

        * menyusun tabel pembalap

        * menyusun form pembalap

    - ViewMobil

        * menyusun tabel mobil

        * menyusun form mobil

Setiap view membaca template dari folder `/template/`.

3. Presenter

    Presenter menjadi penghubung Model ↔ View:

    - PresenterPembalap

        * memanggil model untuk mengambil data pembalap

        * memanggil view untuk merender tabel

        * menangani aksi tambah/edit/hapus pembalap

    - PresenterMobil

        * memanggil model untuk mengambil data mobil

        * memanggil view untuk merender tabel

        * menangani aksi tambah/edit/hapus mobil

    Presenter yang menerima request dari `index.php`.

## Penjelasan Alur Program

### a. Menampilkan Daftar Pembalap

Pada proses menampilkan daftar pembalap, file *index.php* bertugas memanggil **PresenterPembalap**. Presenter ini kemudian berinteraksi dengan **TabelPembalap** untuk mengambil seluruh data pembalap dari database. Setelah data berhasil diperoleh, presenter meneruskannya ke **ViewPembalap**, yang kemudian menyusun data tersebut ke dalam tampilan HTML dalam bentuk tabel yang rapi. Dengan alur ini, setiap kali halaman dibuka, daftar pembalap yang ada akan diperlihatkan kepada pengguna secara dinamis.

### b. Menampilkan Daftar Mobil

Untuk menampilkan daftar mobil, mekanismenya sama seperti pembalap. File index.php memanggil **PresenterMobil**. Presenter mengambil data mobil dari database melalui **TabelMobil**, lalu mengirimkan data tersebut ke **ViewMobil**. View inilah yang bertanggung jawab untuk membangun tabel daftar mobil dalam format HTML. Dengan pendekatan ini, data mobil dapat ditampilkan secara konsisten dan terstruktur.

### c. Menambah Mobil

Proses penambahan mobil dimulai ketika pengguna menekan tombol “+ **Tambah Mobil**”. Tindakan tersebut membuat index.php memanggil fungsi **tampilkanFormMobil()**, sehingga form khusus untuk pengisian data mobil muncul. Setelah pengguna mengisi dan mengirimkan formulir, data tersebut diterima oleh presenter. Presenter kemudian memvalidasi, terutama memastikan bahwa pembalap_id sesuai dengan data pembalap yang sudah ada. Jika validasi berhasil, presenter meneruskan data tersebut ke TabelMobil untuk disimpan ke database. Setelah proses berhasil, pengguna diarahkan kembali ke halaman daftar mobil.

### d. Penghapusan Data

Penghapusan data dilakukan melalui tombol Hapus, yang telah dilengkapi dengan JavaScript. Tombol ini akan membuat sebuah form POST tersembunyi yang dikirimkan secara otomatis ke server. Presenter kemudian menerima permintaan tersebut dan meneruskannya ke model untuk menghapus data dari database. Setelah data dihapus, halaman akan memuat ulang daftar terbaru.

### e. Desain Antarmuka (UI)

Antarmuka pengguna dirancang dengan gaya modern dan bersih. Setiap bagian ditata menggunakan kartu (card) terpisah untuk pembalap dan mobil, sehingga informasi mudah dibaca. Tampilan tabel dibuat sederhana namun profesional, dilengkapi dengan tombol aksi seperti **Edit** dan **Hapus**, serta penanda total data. Efek hover tambahan memberikan kesan interaktif yang halus. Selain itu, seluruh layout dirancang responsif agar tetap rapi ketika diakses melalui perangkat mobile. Tombol “+ Tambah” juga mengikuti skema warna yang konsisten sesuai tema keseluruhan antarmuka.


## Dokumentasi
https://github.com/user-attachments/assets/a7fbbeb6-1505-41dc-8d53-5c6622be9dde
