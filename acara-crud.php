<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Harus Login'); window.location.href='index.php';</script>";
    exit();
}
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #444;
            padding: 10px 0;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 0 15px;
            cursor: pointer;
        }
        nav a:hover {
            text-decoration: underline;
        }
        main {
            padding: 20px;
            max-width: 1000px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            margin-top: 40px;
        }
        form {
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin: 10px 0 5px;
        }
        form input[type="text"],
        form textarea,
        form input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
        }
        form button:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th,
        table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        table img {
            max-width: 100px;
            height: auto;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .section {
            display: none; /* Semua section disembunyikan awalnya */
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Home</a>
            <a href="index.php">Logout</a>
        </nav>
    </header>
    <nav>
        <a onclick="showSection('acara')">Acara</a>
        <!--<a onclick="showSection('pendaftar')">Pendaftar</a>-->
        <a onclick="showSection('guru')">Guru</a>
        <a onclick="showSection('pelajaran')">Pelajaran</a>
        <a onclick="showSection('kelas123')">Kelas</a>
        <a onclick="showSection('siswa')">Siswa</a>
    </nav>
    <main>
        <!-- Acara -->
        <section id="acara" class="section">
            <h1>Data Acara</h1>
            <form action="acara-add.php" method="POST" enctype="multipart/form-data">
                <label for="namaAcara">Judul</label>
                <input type="text" id="namaAcara" name="namaAcara" required>
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
                <label for="image">Image</label>
                <input type="file" id="image" name="image" accept="image/*" required>
                <button type="submit">Tambah Acara</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Image</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM acara");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['namaAcara']}</td>
                            <td>{$row['deskripsi']}</td>
                            <td><img src='images/{$row['image']}' loading='lazy'></td>
                            <td>
                                <a href='acara-edit.php?id={$row['id']}'>Edit</a>
                                <a href='acara-delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Hapus</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Pendaftar -->
        <section id="pendaftar" class="section">
            <h1>Daftar Pendaftar</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telpon</th>
                        <th>Kelas</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM pendaftaran");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['namaPendaftar']}</td>
                            <td>{$row['alamat']}</td>
                            <td>{$row['nomorTelp']}</td>
                            <td>{$row['kelas']}</td>
                            <td>
                                <a href='daftar-delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Hapus</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Guru -->
        <section id="guru" class="section">
            <h1>Data Guru</h1>
            <form action="guru-add.php" method="POST" enctype="multipart/form-data">
                <label for="namaGuru">Nama</label>
                <input type="text" id="namaGuru" name="namaGuru" required>
                <label for="kelas">Kelas</label>
                <input type="text" id="kelas" name="kelas" required>
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
                <button type="submit">Tambah Guru</button>
            </form>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Deskripsi</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM guru");
                    while ($row = $result->fetch_assoc()) {
                        echo "  <tr>
                                <td>{$row['id']}</td>
                                <td>{$row['namaGuru']}</td>
                                <td>{$row['kelas']}</td>
                                <td>{$row['deskripsi']}</td>
                                <td>
                                    <a href='guru-edit.php?id={$row['id']}'>Edit</a>
                                    <a href='guru-delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Hapus</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Pelajaran -->
        <section id="pelajaran" class="section">
            <h1>Data Pelajaran</h1>
            <form action="pelajaran-add.php" method="POST" enctype="multipart/form-data">
                <label for="namaPelajaran">Nama</label>
                <input type="text" id="namaPelajaran" name="namaPelajaran" required>
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
                <label for="image">Image</label>
                <input type="file" id="image" name="image" accept="image/*" required>
                <button type="submit">Tambah Pelajaran</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Image</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM pelajaran");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['namaPelajaran']}</td>
                            <td>{$row['deskripsi']}</td>
                            <td><img src='images/{$row['image']}' loading='lazy'></td>
                            <td>
                                <a href='pelajaran-edit.php?id={$row['id']}'>Edit</a>
                                <a href='pelajaran-delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Hapus</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Kelas -->
        <section id="kelas123" class="section">
            <h1>Data Kelas</h1>
            <form action="kelas-add.php" method="POST" enctype="multipart/form-data">
                <label for="namaKelas">Nama</label>
                <input type="text" id="namaKelas" name="namaKelas" required>
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
                <label for="image">Image</label>
                <input type="file" id="image" name="image" accept="image/*" required>
                <button type="submit">Tambah Kelas</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Image</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $result = $conn->query("SELECT * FROM kelas");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['namaKelas']}</td>
                        <td>{$row['deskripsi']}</td>
                        <td><img src='images/{$row['image']}'loading='lazy' alt=''></td>
                        <td>
                            <a href='kelas-edit.php?id={$row['id']}'>Edit</a>
                            <a href='kelas-delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Hapus</a>
                        </td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </section>
        
        <!-- Siswa -->
        <section id="siswa" class="section">
            <h1>Data Siswa</h1>
            <form action="siswa-crud.php" method="POST">
    <input type="hidden" name="id" value="">
    Kelas: <input type="text" name="kelas" required><br>
    Nama: <input type="text" name="nama" required><br>
    Tempat Lahir: <input type="text" name="tempat_lahir" required><br>
    Tanggal Lahir: <input type="date" name="tanggal_lahir" required><br>
    Anak Ke: <input type="number" name="anak_ke" required><br>
    Dari: <input type="number" name="dari" required><br>
    Bahasa Daerah: <input type="text" name="bahasa_daerah" required><br>
    Minat/Kecenderungan: <input type="text" name="minat_kecenderungan" required><br>
    Berat: <input type="number" step="0.01" name="berat" required><br>
    Tinggi: <input type="number" step="0.01" name="tinggi" required><br>
    Penyakit: <input type="text" name="penyakit" required><br>
    <button type="submit">Tambah Data</button>
</form>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
            <th>Kelas</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Anak Ke</th>
            <th>Dari</th>
            <th>Bahasa Daerah</th>
            <th>Minat/Kecenderungan</th>
            <th>Berat</th>
            <th>Tinggi</th>
            <th>Penyakit</th>
            <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        $result = $conn->query("SELECT * FROM DataSiswa");
        while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['kelas']}</td>
            <td>{$row['nama']}</td>
            <td>{$row['tempat_lahir']}</td>
            <td>{$row['tanggal_lahir']}</td>
            <td>{$row['anak_ke']}</td>
            <td>{$row['dari']}</td>
            <td>{$row['bahasa_daerah']}</td>
            <td>{$row['minat_kecenderungan']}</td>
            <td>{$row['berat']} </td>
            <td>{$row['tinggi']}</td>
            <td>{$row['penyakit']}</td>
            <td>
                                <a href='siswa-edit.php?id={$row['id']}'>Edit</a>
                                <a href='siswa-crud.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Hapus</a>
            </td>
        </tr>";
        }
        ?>
    </tbody>
            </table>
        </section>
        
    </main>

    <script>
        // Fungsi untuk menampilkan section berdasarkan ID
        function showSection(id) {
            // Sembunyikan semua section
            var sections = document.querySelectorAll('.section');
            sections.forEach(function(section) {
                section.style.display = 'none';
            });

            // Tampilkan section yang sesuai ID
            document.getElementById(id).style.display = 'block';
        }

        // Menampilkan section pertama (Acara) saat halaman pertama kali dimuat
        document.addEventListener('DOMContentLoaded', function() {
            showSection('acara');
        });
    </script>
    
    
</body>
</html>
