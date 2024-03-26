<?php
// Informasi profil disimpan dalam variabel
$nama = "Viviana Hanifa";
$email = "vivianhnf@gmail.com";
$nomor_telepon = "081268941169";
$data_diri = "Mahasiswa Aktif Teknik Informatika Universitas Pamulang";

include 'header.php'; ?>

<section class="profile">
    <div class="profile-info">
        <h2>Nama: <?php echo $nama; ?></h2>
        <p>Email: <?php echo $email; ?></p>
        <p>Nomor Telepon: <?php echo $nomor_telepon; ?></p>
        <p>Data Diri: <?php echo $data_diri; ?></p>
    </div>
    <div class="profile-picture">
        <img src="vivi.jpg" width="200px" alt="Foto Profil">
    </div>
</section>

<?php include 'footer.php'; ?>

