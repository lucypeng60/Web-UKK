<?php
    error_reporting(0);
    include 'db.php';
    $mimin = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($mimin);

    $buku = mysqli_query($conn, "SELECT * FROM tb_book WHERE book_id = '".$_GET['id']."' ");
    $b = mysqli_fetch_object($buku);
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
        <h1><a href="index.php">LIBRARY</a></h1>
        <ul>
            <li><a href="buku.php">BUKU</a></li>
        </ul>
        </div>
    </header>

    <!--banner-->
    <section class="banner">
        <h2>Welcome to Library</h2>
    </section>

    <!--Search-->
    <div class="cari">
        <div class="container">
            <form action="buku.php">
                <input type="text" name="cari" placeholder="Cari Buku" value="<?php echo $_GET['cari'] ?>">
                <input type="hidden" name="kat" value=<?php echo $_GET['kat'] ?>>
                <input type="submit" name="search" value="Cari Buku">
            </form>
        </div>
    </div>

    <!--Detail Buku-->
    <div class="section">
        <div class="container">
        <h3>Detail Buku</he>
            <div class="box">
                <div class="col-2">
                    <img src="book/<?php echo $b->gambar_buku ?>" width="100%">
                </div>
                <div class="col-2">
                    <h3><?php echo $b->judul_buku ?></h3>
                    <h4>Ditulis oleh : <?php echo $b->pengarang_buku ?></h4>
                    <p>Deskripsi :<br>
                        <?php echo $b->deskripsi_buku ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!--about-->
    <section class="about">
        <div class="container">
            <h3>ABOUT</h3>
            <p><b>Halo, selamat datang di website PERPUSTAKAAN! Kami di sini menyediakan berbagai macam buku, 
                READERS sekalian bisa menemukan buku mana saja yang sedang dalam peminjaman atau pun yang tersedia!
                Jadi jangan bingung, yaa! Kalian juga bisa cek apakah buku yang kalian cari ada di perpustakaan kami 
                melalui website ini. Selalu semangat mencari wawasan dan selalu rajin membaca ya, READERS! Happy Reading!</b></p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>

            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>

            <h4>Telepon</h4>
            <p><?php echo $a->admin_telp ?></p>

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