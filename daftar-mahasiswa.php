<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Mahasiswa</title>
    <style>
        /* CSS */
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: pink;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: hotpink;
        }
        tr:nth-child(even) {
            background-color: lightblue;
        }
        tr:hover {
            background-color: yellow;
        }
        h3 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h3>Daftar Nilai Mahasiswa</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Nilai</th>
                <th>Keterangan</th>
                <th>Grade</th>
                <th>Predikat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Data Mahasiswa
            $mahasiswa = [
                ['nama' => 'viviana', 'nim' => '123456', 'nilai' => 75],
                ['nama' => 'khafifah', 'nim' => '234567', 'nilai' => 85],
                ['nama' => 'Chintia', 'nim' => '345678', 'nilai' => 60],
                ['nama' => 'Novianti', 'nim' => '456789', 'nilai' => 90],
                ['nama' => 'Iqlhima', 'nim' => '567890', 'nilai' => 55],
                ['nama' => 'tania', 'nim' => '678901', 'nilai' => 70],
                ['nama' => 'alnayla', 'nim' => '789012', 'nilai' => 80],
                ['nama' => 'alifia', 'nim' => '890123', 'nilai' => 95],
                ['nama' => 'Sila', 'nim' => '901234', 'nilai' => 50],
                ['nama' => 'Irelda', 'nim' => '012345', 'nilai' => 75],
                ['nama' => 'Indah', 'nim' => '324563', 'nilai' => 95],
                ['nama' => 'Juliana', 'nim' => '945398', 'nilai' => 85],
                ['nama' => 'mella', 'nim' => '675408', 'nilai' => 75]
            ];

            // Inisialisasi variabel agregat
            $nilai_array = [];
            $jumlah_nilai = 0;

            // Menampilkan data mahasiswa
            foreach ($mahasiswa as $key => $mhs) {
                // code menentukan keterangan lulus atau tidak
                $keterangan = ($mhs['nilai'] >= 65) ? 'Lulus' : 'Tidak Lulus';
                
                // code menentukan grade
                if ($mhs['nilai'] >= 85) {
                    $grade = 'A';
                } elseif ($mhs['nilai'] >= 75) {
                    $grade = 'B';
                } elseif ($mhs['nilai'] >= 65) {
                    $grade = 'C';
                } elseif ($mhs['nilai'] >= 50) {
                    $grade = 'D';
                } else {
                    $grade = 'E';
                }

                // code menentukan predikat
                switch ($grade) {
                    case 'A':
                        $predikat = 'Memuaskan';
                        break;
                    case 'B':
                        $predikat = 'Bagus';
                        break;
                    case 'C':
                        $predikat = 'Cukup';
                        break;
                    case 'D':
                        $predikat = 'Kurang';
                        break;
                    case 'E':
                        $predikat = 'Buruk';
                        break;
                    default:
                        $predikat = 'Tidak Diketahui';
                        break;
                }

                // untuk menambahkan nilai ke dalam array untuk agregat
                $nilai_array[] = $mhs['nilai'];
                $jumlah_nilai += $mhs['nilai'];
            ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $mhs['nama'] ?></td>
                <td><?= $mhs['nim'] ?></td>
                <td><?= $mhs['nilai'] ?></td>
                <td><?= $keterangan ?></td>
                <td><?= $grade ?></td>
                <td><?= $predikat ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Nilai Tertinggi</th>
                <th colspan="4"><?= max($nilai_array) ?></th>
            </tr>
            <tr>
                <th colspan="3">Nilai Terendah</th>
                <th colspan="4"><?= min($nilai_array) ?></th>
            </tr>
            <tr>
                <th colspan="3">Nilai Rata-rata</th>
                <th colspan="4"><?= round($jumlah_nilai / count($mahasiswa), 2) ?></th>
            </tr>
            <tr>
                <th colspan="3">Jumlah Mahasiswa</th>
                <th colspan="4"><?= count($mahasiswa) ?></th>
            </tr>
            <tr>
                <th colspan="3">Jumlah Keseluruhan Nilai</th>
                <th colspan="4"><?= array_sum($nilai_array) ?></th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
