# Laporan Praktikum 7

| Komponen | Keterangan |
|---|---|
| Mata Kuliah | Pemrograman Web |
| Program Studi | Teknik Informatika |
| Nama | *Suyatno* |
| NIM | *312510129* |
| Kelas | *I253C* |

---

## 1. Tujuan Praktikum

1. Memahami perbedaan pemrosesan *client-side* dan *server-side*.
2. Mengenali sintaks PHP dan menjalankan file PHP melalui server lokal.
3. Menggunakan variabel, tipe data, operator, percabangan, perulangan, dan *function*.
4. Menerima dan memproses data dari form HTML menggunakan metode GET dan POST.
5. Melakukan validasi dan sanitasi input dasar sebelum data ditampilkan atau diproses.
6. Membangun aplikasi sederhana yang menerima, memproses, dan menampilkan data pengguna.

---

## 2. Perangkat yang Digunakan

| Perangkat | Keterangan |
|---|---|
| Perangkat keras | Laptop/PC |
| Sistem operasi | *Windows 11* |
| Web server | XAMPP (Apache) — versi *3.3.0* |
| Bahasa pemrograman | PHP — versi *(8.2.12)* |
| Editor kode | Visual Studio Code |
| Web browser | *Google Chrome* |
| Version control | Git dan GitHub |

---

## 3. Cara Menjalankan Server Lokal

1. Pasang **XAMPP**, lalu buka **XAMPP Control Panel**.
2. Klik **Start** pada modul **Apache** hingga statusnya berwarna hijau. Modul MySQL belum diperlukan pada praktikum ini.

<img width="849" height="564" alt="1  Install jalankan apache" src="https://github.com/user-attachments/assets/c32cfd3a-330c-4a5d-8181-f6f58a79f5e9" />

3. Salin folder proyek `Lab7Web_PHP` ke direktori `C:\xampp\htdocs\`. Direktori `htdocs` merupakan *document root* Apache, yaitu folder yang dilayani server sebagai isi situs.
4. Buka browser dan akses `http://localhost/Lab7Web_PHP/`, lalu pilih file yang ingin dijalankan. Contoh:
   `http://localhost/Lab7Web_PHP/latihan1_menjalankan_php.php`
5. File PHP **tidak boleh** dibuka dengan klik ganda (protokol `file://`), karena tanpa web server kode PHP tidak diinterpretasikan dan tampil sebagai teks mentah.
6. Setelah selesai, hentikan layanan dengan menekan **Stop** pada modul Apache.

---

## 4. Struktur File

```
Lab7Web_PHP/
├── README.md
├── latihan1_menjalankan_php.php
├── latihan2_variabel_percabangan.php
├── latihan3_perulangan_array.php
├── latihan4_function.php
├── latihan5_form_get.php
├── latihan6_form_post.php
├── latihan7_pengolahan_data_sederhana.php
├── mini_project_formulir_mahasiswa.php
├── eksperimen_mandiri.php
└── screenshots/
    └── (tangkapan layar hasil setiap latihan)
```

| File | Keterangan |
|---|---|
| `latihan1_menjalankan_php.php` | Menjalankan PHP dan menampilkan waktu server |
| `latihan2_variabel_percabangan.php` | Variabel, operator, dan percabangan (nilai akhir dan predikat) |
| `latihan3_perulangan_array.php` | Perulangan `foreach` dan array |
| `latihan4_function.php` | Pembuatan *function* |
| `latihan5_form_get.php` | Pemrosesan form dengan metode GET |
| `latihan6_form_post.php` | Pemrosesan form dengan metode POST |
| `latihan7_pengolahan_data_sederhana.php` | Perhitungan subtotal transaksi dengan validasi |
| `mini_project_formulir_mahasiswa.php` | Aplikasi formulir data mahasiswa |
| `eksperimen_mandiri.php` | Lima eksperimen mandiri dalam satu halaman |

---

## 5. Ringkasan Hasil

### Latihan 1 — Menjalankan PHP
File dijalankan melalui `localhost` dan menampilkan teks "PHP berhasil dijalankan" beserta waktu server dari fungsi `date()`. Kode PHP tidak tampil di browser, hanya keluarannya dalam bentuk HTML. Hal ini membuktikan bahwa PHP diproses di sisi server.

<img width="1919" height="1030" alt="2  Latihan 1" src="https://github.com/user-attachments/assets/e1d8c4d6-5fa1-424f-9ec4-10dd8e708da5" />
### Latihan 2 — Variabel, Operator, dan Percabangan
Nilai akhir dihitung dengan bobot tugas 30%, UTS 30%, dan UAS 40%. (batas predikat A adalah 85). Pengujian dengan kombinasi nilai lain menghasilkan predikat yang sesuai dengan percabangan `if–elseif–else`.

<img width="1913" height="835" alt="3  Latihan 2" src="https://github.com/user-attachments/assets/0879f5ba-316e-478d-ac0a-0d1d69f20393" />
<img width="1918" height="913" alt="3  Latihan 2 (kombinasi 3)" src="https://github.com/user-attachments/assets/a30b45f2-d8a3-4ea2-adf3-bc46633178b8" />
<img width="1919" height="893" alt="3  Latihan 2 (kombinasi 2)" src="https://github.com/user-attachments/assets/97b90b89-d4f2-459a-8599-9013b2689b4d" />

### Latihan 3 — Perulangan dan Array
Array nama mahasiswa ditampilkan sebagai daftar bernomor menggunakan `foreach`. Daftar awal berisi empat nama, kemudian ditambah tiga nama (Eka, Fajar, Gita) sehingga seluruhnya berjumlah tujuh nama.

<img width="1917" height="689" alt="4  Latihan 3" src="https://github.com/user-attachments/assets/1e7b489e-9f22-476c-ac42-7687a31c5615" />

### Latihan 4 — Function
Function `hitungDiskon()` menghitung harga setelah diskon. Untuk harga Rp150.000 dengan diskon 10%, hasilnya **Rp135.000**. Ditambahkan dua function lain, yaitu `hitungLuasPersegiPanjang()` (8 × 4 = 32) dan `tentukanKelulusan()` (nilai ≥ 60 dinyatakan lulus). Function membuat kode dapat dipakai ulang tanpa penulisan berulang.

<img width="1918" height="765" alt="5  Latihan 4" src="https://github.com/user-attachments/assets/00359f39-d9dd-4112-8222-e743062d3a95" />
### Latihan 5 — Form GET
Data kata kunci dikirim melalui parameter URL sehingga URL berubah menjadi `...latihan5_form_get.php?kata=...` setelah form dikirim. Keluaran ditampilkan dengan `htmlspecialchars()`. Metode GET tidak digunakan untuk data sensitif seperti kata sandi karena datanya terlihat pada URL dan riwayat browser.

<img width="1919" height="821" alt="6  Latihan 5" src="https://github.com/user-attachments/assets/e6fe4cbc-db32-4b5d-ab29-c3e70bb3b965" />
### Latihan 6 — Form POST
Data nama dan program studi dikirim melalui *body* permintaan sehingga tidak tampil di URL. Server memeriksa bahwa kedua kolom terisi sebelum menampilkan data. Pengujian dengan karakter khusus seperti tanda kutip dan tag HTML menunjukkan bahwa keluaran ditampilkan sebagai teks biasa dan tidak dieksekusi sebagai HTML atau JavaScript.

<img width="1919" height="806" alt="7  Latihan 6" src="https://github.com/user-attachments/assets/ff04c8bc-a579-4259-8c52-d8a0d11b0408" />
<img width="1915" height="866" alt="7  Latihan 6 (tag html)" src="https://github.com/user-attachments/assets/281e04af-bb7d-430e-978b-0710f9480aca" />

### Latihan 7 — Pengolahan Data Sederhana
Form menerima nama barang, harga, dan jumlah, lalu PHP menghitung subtotal (harga × jumlah) dan menampilkannya dalam format Rupiah. Validasi server memeriksa bahwa nama barang tidak kosong, harga berupa angka tidak negatif, dan jumlah berupa bilangan bulat minimal 1. Input yang tidak sesuai menghasilkan pesan "Periksa kembali nama barang, harga, dan jumlah."

<img width="1916" height="1001" alt="8  Latihan 7" src="https://github.com/user-attachments/assets/e3be6f41-e29a-41b0-93f1-c22f49d01076" />

---

### Mini Project — Aplikasi Formulir Data Mahasiswa
Aplikasi menerima nama, NIM, program studi, semester, dan email melalui metode POST. Pemrosesan data dipisahkan dari bagian tampilan HTML. Validasi sisi server meliputi: kolom wajib diisi, semester berupa bilangan bulat 1–14, dan email berformat valid (`FILTER_VALIDATE_EMAIL`). Jika terdapat kesalahan, seluruh pesan error ditampilkan sekaligus dan isian form dipertahankan. Jika valid, ringkasan data ditampilkan dengan `htmlspecialchars()`.

**Kasus input valid dan tidak valid:**

<img width="1911" height="862" alt="1  tidak valid semester 15 " src="https://github.com/user-attachments/assets/ae514cad-d1ec-4793-9b92-d9c25225de5d" />
<img width="1916" height="1003" alt="2  tidak valid email " src="https://github.com/user-attachments/assets/9b65d1b5-78e7-4082-8da8-55af641ede84" />
<img width="956" height="727" alt="2  tidak valid Kosong " src="https://github.com/user-attachments/assets/552d6eb1-7401-45e7-923e-a393dd01806d" />
<img width="958" height="817" alt="2  valid" src="https://github.com/user-attachments/assets/d37ff7a4-ad9a-4a38-b63c-e71b9f25264a" />


---

### Eksperimen Mandiri

Seluruh eksperimen berada pada `eksperimen_mandiri.php`. Setiap hasil menampilkan input dan output agar mudah diverifikasi.

| No | Eksperimen | Penjelasan |
|---|---|---|
| 1 | Rata-rata nilai | Tiga nilai (0–100) dijumlahkan lalu dibagi tiga. Input non-angka atau di luar rentang ditolak. |
| 2 | Pencarian nama dengan GET | Kata kunci dicocokkan dengan array nama tanpa membedakan huruf besar-kecil, dan pencocokan sebagian kata diperbolehkan. |
| 3 | Function format Rupiah | `formatRupiah()` memformat angka menggunakan `number_format()` dengan pemisah ribuan titik. |
| 4 | Validasi NIM | NIM harus berisi angka saja (`ctype_digit`) dan panjangnya tepat *(isi, misal 10)* digit. |
| 5 | Tombol reset | Dijelaskan pada bagian di bawah. |

<img width="1014" height="532" alt="Eksperimen1" src="https://github.com/user-attachments/assets/e4c8a0a4-28e1-4661-9690-b419f4c87939" />
<img width="1029" height="433" alt="Eksperimen2" src="https://github.com/user-attachments/assets/45092d60-dc99-4900-8f41-2b4fa355b7df" />
<img width="641" height="327" alt="Eksperimen3" src="https://github.com/user-attachments/assets/6d7946c3-925c-47d9-8c36-8be025fd1ee0" />
<img width="637" height="326" alt="Eksperimen4" src="https://github.com/user-attachments/assets/2ba7cc95-196a-49b9-a3b5-aed8fa8acc9d" />
<img width="643" height="499" alt="Eksperimen5" src="https://github.com/user-attachments/assets/ba95298f-1370-400e-961e-f6322f256a24" />


**Perbedaan tombol reset dengan pemrosesan ulang di server (Eksperimen 5):**
Tombol `<button type="reset">` hanya mengosongkan isian form pada browser (*client-side*) tanpa mengirim *request* ke server, sehingga hasil yang sudah tampil tidak berubah. Sebaliknya, tombol *submit* mengirim *request* POST ke server, lalu PHP memproses ulang data dan menghasilkan halaman baru.

---

## 6. Kesimpulan

Praktikum ini menunjukkan bahwa PHP dijalankan di sisi server dan browser hanya menerima keluarannya. Data dari form dapat dikirim dengan GET (terlihat pada URL) maupun POST (pada *body* permintaan). Validasi di sisi server tetap wajib meskipun form sudah memiliki atribut `required`, dan keluaran dari input pengguna perlu diamankan dengan `htmlspecialchars()` untuk mengurangi risiko *Cross-Site Scripting* (XSS).
