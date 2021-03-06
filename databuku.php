<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library | UKK RPL</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
    <!--loader-->
    <div class="bg-loader">
        <div class="loader"></div>
    </div>

    <!--header-->
    <header>
        <div class="container">
        <h1><a href="home.php">LIBRARY</a></h1>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="profile.php">Profil Admin</a></li>
            <li><a href="kategori.php">Kategori</a></li>
            <li><a href="databuku.php">Data Buku</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
        </div>
    </header>

    <!-- Content -->
    <div class="section">
        <div class="container">
            <h3>Buku</h3>
            <div class="box">
                <p><a href="tambah-buku.php" class="klik">Tambah Buku</a></p>
                <br></br>
                <table border="1" cellspacing="0" class="tabel">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th>Judul Buku</th>
                            <th>Nama Penulis</th>
                            <th>Penerbit</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $num = 1;
                            $buku = mysqli_query($conn, "SELECT * FROM tb_book LEFT JOIN tb_category USING (category_id) ORDER BY book_id DESC");
                            if(mysqli_num_rows($buku) > 0) {
                            while($row = mysqli_fetch_array($buku)){
                        ?>
                        <tr>
                            <td><?php echo $num++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['judul_buku'] ?></td>
                            <td>Ditulis oleh : <?php echo $row['pengarang_buku'] ?></td>
                            <td>Diterbitkan oleh : <?php echo $row['penerbit_buku'] ?></td>
                            <td><a href="book/<?php echo $row['gambar_buku'] ?>" target="_blank"><img src="book/<?php echo $row['gambar_buku'] ?>" width="100px"></a></td>
                            <td><?php echo ($row['status_buku'] == 0)? 'Buku Tidak Tersedia':'Buku Tersedia'; ?></td>
                            <td>
                                <a href="edit-buku.php?id=<?php echo $row['book_id'] ?>">Edit</a> || <a href="hapus-buku.php?idp=<?php echo $row['book_id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php } }else { ?>
                            <tr>
                                <td colspan="8">Tidak ada data</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2021 - Lucy. All Rights Reserved</small>
        </div>
    </footer>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".bg-loader").hide();
        })
    </script>
</body>
</html>