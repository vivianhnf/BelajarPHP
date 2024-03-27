<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <style>
        /* CSS untuk styling */
        body {
            font-family: Arial, sans-serif; 
            background-color: khaki; /* Warna latar belakang */
            margin: 0; 
            padding: 20px; 
        }
        h2 {
            color: #333; 
        }
        form {
            background-color: pink; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            max-width: 400px; 
            margin: 0 auto; /* Pusatkan formulir di tengah halaman */
        }
        label {
            display: block; /* Membuat label menjadi blok */
            margin-bottom: 5px; 
            color: #555; 
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px; 
            margin-bottom: 10px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
            box-sizing: border-box; 
        }
        input[type="submit"] {
            background-color: #4caf50; /* Warna latar belakang hijau */
            color: white; 
            padding: 10px 20px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            background-color: white;
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            max-width: 400px; 
            margin: 20px auto; 
        }
        .result p {
            margin: 5px 0; 
        }
    </style>
</head>
<body>
    <h2 align="center">Form Belanja</h2>
    <form action="" method="post">
        <!-- Input untuk nama pelanggan -->
        <label for="nama">Nama Pelanggan:</label>
        <input type="text" id="nama" name="nama" required>
        
        <!-- Dropdown untuk memilih produk kosmetik -->
        <label for="produk">Produk Kosmetik:</label>
        <select name="produk" id="produk" required>
            <option value="">Pilih Produk</option>
            <option value="1">Lipstik</option>
            <option value="2">Bedak</option>
            <option value="3">Eyeliner</option>
        </select>
        
        <!-- Input untuk jumlah beli -->
        <label for="jumlah">Jumlah Beli:</label>
        <input type="number" id="jumlah" name="jumlah" min="1" required>

        <!-- Tombol untuk mengirim formulir -->
        <input type="submit" name="submit" value="Hitung">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Mengambil data dari formulir
        $nama = $_POST['nama'];
        $jumlah = $_POST['jumlah'];
        $harga_satuan = 0;
        $produk = $_POST['produk'] ?? '';

        // Menghitung harga satuan berdasarkan pilihan produk
        switch ($produk) {
            case '1':
                $produk_nama = 'Lipstik';
                $harga_satuan = 100000;
                break;
            case '2':
                $produk_nama = 'Bedak';
                $harga_satuan = 80000;
                break;
            case '3':
                $produk_nama = 'Eyeliner';
                $harga_satuan = 50000;
                break;
            default:
                $produk_nama = '';
                break;
        }

        // Menghitung total belanja, diskon, PPN, dan harga bersih
        $total_belanja = $jumlah * $harga_satuan;
        $diskon = 0.2 * $total_belanja;
        $ppn = 0.1 * ($total_belanja - $diskon);
        $harga_bersih = ($total_belanja - $diskon) + $ppn;
    ?>

    <!-- Menampilkan hasil belanja -->
    <div class="result">
        <h2>Detail Belanja</h2>
        <p>Nama Pelanggan: <?php echo $nama; ?></p>
        <p>Produk: <?php echo $produk_nama; ?></p>
        <p>Harga Satuan: Rp <?php echo number_format($harga_satuan, 2); ?></p>
        <p>Jumlah Beli: <?php echo $jumlah; ?></p>
        <p>Total Belanja: Rp <?php echo number_format($total_belanja, 2); ?></p>
        <p>Diskon (20%): Rp <?php echo number_format($diskon, 2); ?></p>
        <p>PPN (10%): Rp <?php echo number_format($ppn, 2); ?></p>
        <p>Harga Bersih: Rp <?php echo number_format($harga_bersih, 2); ?></p>
    </div>

    <?php
    }
    ?>
</body>
</html>
