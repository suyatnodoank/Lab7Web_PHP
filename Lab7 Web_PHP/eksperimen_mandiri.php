<?php
// ============================================================
// EKSPERIMEN MANDIRI - Praktikum 7 Pemrograman Web (PHP)
// ============================================================

// Ketentuan panjang NIM (ubah sesuai ketentuan kampus)
const PANJANG_NIM = 10;

// ---------- FUNCTION UMUM ----------
function e($teks) {
    return htmlspecialchars((string)$teks, ENT_QUOTES, "UTF-8");
}

// Eksperimen 3: format angka menjadi Rupiah
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

// ---------- EKSPERIMEN 1: Rata-rata nilai ----------
$hasil1 = null;
$error1 = "";
$n1 = $n2 = $n3 = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["aksi"] ?? "") === "rata") {
    $n1 = $_POST["nilai1"] ?? "";
    $n2 = $_POST["nilai2"] ?? "";
    $n3 = $_POST["nilai3"] ?? "";

    $valid = true;
    foreach ([$n1, $n2, $n3] as $n) {
        if (!is_numeric($n) || (float)$n < 0 || (float)$n > 100) {
            $valid = false;
        }
    }

    if ($valid) {
        $hasil1 = ((float)$n1 + (float)$n2 + (float)$n3) / 3;
    } else {
        $error1 = "Semua nilai harus berupa angka 0–100.";
    }
}

// ---------- EKSPERIMEN 2: Cari nama dari array (GET) ----------
$daftarNama = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fajar", "Gita", "Alif", "Citra Dewi"];
$kataCari   = null;
$hasil2     = [];
if (isset($_GET["cari"])) {
    $kataCari = trim($_GET["cari"]);
    if ($kataCari !== "") {
        foreach ($daftarNama as $nama) {
            if (mb_stripos($nama, $kataCari) !== false) {
                $hasil2[] = $nama;
            }
        }
    }
}

// ---------- EKSPERIMEN 3: Format Rupiah ----------
$hasil3 = null;
$error3 = "";
$hargaInput = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["aksi"] ?? "") === "rupiah") {
    $hargaInput = $_POST["harga"] ?? "";
    if (is_numeric($hargaInput) && (float)$hargaInput >= 0) {
        $hasil3 = formatRupiah((float)$hargaInput);
    } else {
        $error3 = "Harga harus berupa angka dan tidak boleh negatif.";
    }
}

// ---------- EKSPERIMEN 4: Validasi NIM ----------
$hasil4  = null;
$error4  = [];
$nimInput = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["aksi"] ?? "") === "nim") {
    $nimInput = trim($_POST["nim"] ?? "");
    if ($nimInput === "") {
        $error4[] = "NIM wajib diisi.";
    } else {
        if (!ctype_digit($nimInput)) {
            $error4[] = "NIM hanya boleh berisi angka.";
        }
        if (strlen($nimInput) !== PANJANG_NIM) {
            $error4[] = "NIM harus tepat " . PANJANG_NIM . " digit.";
        }
    }
    if (!$error4) {
        $hasil4 = $nimInput;
    }
}

// ---------- EKSPERIMEN 5: Tombol reset ----------
$hasil5 = null;
$error5 = "";
$nama5 = $kota5 = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["aksi"] ?? "") === "reset") {
    $nama5 = trim($_POST["nama5"] ?? "");
    $kota5 = trim($_POST["kota5"] ?? "");
    if ($nama5 === "" || $kota5 === "") {
        $error5 = "Nama dan kota wajib diisi.";
    } else {
        $hasil5 = ["nama" => $nama5, "kota" => $kota5];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eksperimen Mandiri - Praktikum 7 PHP</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 640px; margin: 30px auto; padding: 0 16px; line-height: 1.5; }
        section { border: 1px solid #ccc; border-radius: 6px; padding: 12px 18px; margin-bottom: 24px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type=text], input[type=number] { width: 100%; padding: 7px; box-sizing: border-box; margin-top: 4px; }
        button { margin-top: 14px; padding: 7px 14px; }
        .error  { background: #fdecea; border: 1px solid #f5c2c0; padding: 8px 12px; margin-top: 12px; }
        .sukses { background: #eaf6ec; border: 1px solid #b7dfbd; padding: 8px 12px; margin-top: 12px; }
        .catatan { font-size: 0.92em; color: #444; }
    </style>
</head>
<body>
    <h1>Eksperimen Mandiri</h1>

    <!-- ============ EKSPERIMEN 1 ============ -->
    <section id="eks1">
        <h2>Eksperimen 1: Rata-rata Tiga Komponen Nilai</h2>
        <form method="POST" action="#eks1">
            <input type="hidden" name="aksi" value="rata">
            <label for="nilai1">Nilai Tugas</label>
            <input type="number" id="nilai1" name="nilai1" min="0" max="100" step="0.01" value="<?= e($n1) ?>" required>
            <label for="nilai2">Nilai UTS</label>
            <input type="number" id="nilai2" name="nilai2" min="0" max="100" step="0.01" value="<?= e($n2) ?>" required>
            <label for="nilai3">Nilai UAS</label>
            <input type="number" id="nilai3" name="nilai3" min="0" max="100" step="0.01" value="<?= e($n3) ?>" required>
            <button type="submit">Hitung Rata-rata</button>
        </form>
        <?php if ($error1 !== ""): ?>
            <div class="error">
                <div><strong>Input:</strong> Tugas = <?= e($n1) ?>, UTS = <?= e($n2) ?>, UAS = <?= e($n3) ?></div>
                <div><strong>Output:</strong> <?= e($error1) ?></div>
            </div>
        <?php elseif ($hasil1 !== null): ?>
            <div class="sukses">
                <div><strong>Input:</strong> Tugas = <?= e($n1) ?>, UTS = <?= e($n2) ?>, UAS = <?= e($n3) ?></div>
                <div><strong>Output:</strong> Nilai rata-rata = <strong><?= number_format($hasil1, 2) ?></strong></div>
            </div>
        <?php endif; ?>
    </section>

    <!-- ============ EKSPERIMEN 2 ============ -->
    <section id="eks2">
        <h2>Eksperimen 2: Cari Nama dari Array (GET)</h2>
        <p class="catatan">Data: <?= e(implode(", ", $daftarNama)) ?></p>
        <form method="GET" action="#eks2">
            <label for="cari">Kata kunci nama</label>
            <input type="text" id="cari" name="cari" value="<?= e($kataCari ?? "") ?>">
            <button type="submit">Cari</button>
        </form>
        <?php if ($kataCari !== null): ?>
            <?php if ($kataCari === ""): ?>
                <div class="error">
                    <div><strong>Input:</strong> (kosong)</div>
                    <div><strong>Output:</strong> Kata kunci tidak boleh kosong.</div>
                </div>
            <?php elseif ($hasil2): ?>
                <div class="sukses">
                    <div><strong>Input:</strong> kata kunci = "<?= e($kataCari) ?>"</div>
                    <div><strong>Output:</strong> ditemukan <?= count($hasil2) ?> nama:</div>
                    <ul>
                        <?php foreach ($hasil2 as $nama): ?>
                            <li><?= e($nama) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php else: ?>
                <div class="error">
                    <div><strong>Input:</strong> kata kunci = "<?= e($kataCari) ?>"</div>
                    <div><strong>Output:</strong> tidak ada nama yang cocok.</div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </section>

    <!-- ============ EKSPERIMEN 3 ============ -->
    <section id="eks3">
        <h2>Eksperimen 3: Function Format Rupiah</h2>
        <p class="catatan">
            Contoh: <?= formatRupiah(1500) ?>, <?= formatRupiah(150000) ?>, <?= formatRupiah(2750000) ?>
        </p>
        <form method="POST" action="#eks3">
            <input type="hidden" name="aksi" value="rupiah">
            <label for="harga">Masukkan angka</label>
            <input type="number" id="harga" name="harga" min="0" step="1" value="<?= e($hargaInput) ?>" required>
            <button type="submit">Ubah ke Rupiah</button>
        </form>
        <?php if ($error3 !== ""): ?>
            <div class="error">
                <div><strong>Input:</strong> <?= e($hargaInput) ?></div>
                <div><strong>Output:</strong> <?= e($error3) ?></div>
            </div>
        <?php elseif ($hasil3 !== null): ?>
            <div class="sukses">
                <div><strong>Input:</strong> <?= e($hargaInput) ?></div>
                <div><strong>Output:</strong> <strong><?= e($hasil3) ?></strong></div>
            </div>
        <?php endif; ?>
    </section>

    <!-- ============ EKSPERIMEN 4 ============ -->
    <section id="eks4">
        <h2>Eksperimen 4: Validasi NIM</h2>
        <p class="catatan">Ketentuan: hanya angka, panjang tepat <?= PANJANG_NIM ?> digit.</p>
        <form method="POST" action="#eks4">
            <input type="hidden" name="aksi" value="nim">
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" value="<?= e($nimInput) ?>">
            <button type="submit">Validasi</button>
        </form>
        <?php if ($error4): ?>
            <div class="error">
                <div><strong>Input:</strong> NIM = "<?= e($nimInput) ?>"</div>
                <div><strong>Output:</strong></div>
                <ul>
                    <?php foreach ($error4 as $pesan): ?>
                        <li><?= e($pesan) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif ($hasil4 !== null): ?>
            <div class="sukses">
                <div><strong>Input:</strong> NIM = "<?= e($hasil4) ?>"</div>
                <div><strong>Output:</strong> NIM valid.</div>
            </div>
        <?php endif; ?>
    </section>

    <!-- ============ EKSPERIMEN 5 ============ -->
    <section id="eks5">
        <h2>Eksperimen 5: Tombol Reset vs Pemrosesan Ulang di Server</h2>
        <form method="POST" action="#eks5">
            <input type="hidden" name="aksi" value="reset">
            <label for="nama5">Nama</label>
            <input type="text" id="nama5" name="nama5">
            <label for="kota5">Kota</label>
            <input type="text" id="kota5" name="kota5">
            <button type="submit">Kirim</button>
            <button type="reset">Reset</button>
        </form>
        <?php if ($error5 !== ""): ?>
            <div class="error">
                <div><strong>Input:</strong> Nama = "<?= e($nama5) ?>", Kota = "<?= e($kota5) ?>"</div>
                <div><strong>Output:</strong> <?= e($error5) ?></div>
            </div>
        <?php elseif ($hasil5 !== null): ?>
            <div class="sukses">
                <div><strong>Input:</strong> Nama = "<?= e($hasil5["nama"]) ?>", Kota = "<?= e($hasil5["kota"]) ?>"</div>
                <div><strong>Output:</strong> Data diterima dari <strong><?= e($hasil5["nama"]) ?></strong> (<?= e($hasil5["kota"]) ?>).</div>
            </div>
        <?php endif; ?>
        <p class="catatan">
            <strong>Reset</strong> hanya mengosongkan isian form di browser (client-side), tanpa mengirim request ke server,
            sehingga hasil di atas tidak berubah. <strong>Kirim</strong> membuat browser mengirim request POST ke server,
            lalu PHP memproses ulang data dan membuat halaman baru.
        </p>
    </section>
</body>
</html>
