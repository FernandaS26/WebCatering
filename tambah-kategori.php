<?php
	session_start();
    include 'db.php';
	 if($_SESSION['status_login'] != true){
	 	echo '<script>window.location="login.php"</script>';
	 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title> tambah kategori </title>
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1> <a href="Dashboard.php">Catering Barokah</a></h1>
	        <ul>
		        <li><a href="dashboard.php">Dashboard</a></li>
		        <li><a href="profil.php">Profil</a></li>
		        <li><a href="data_kategori.php">Data Kategori</a></li>
		        <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
	        </ul>   
        </div>
    </header>

    <!-- content -->

    <div class="section">
        <div class="container">
	    	<h3>Tambah Data Kategori</h3>
		    <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']);

                        $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
                                            null, '".$nama."')");
                        if($insert){
                            echo '<script>alert("Tambah Data Berhasil")</script>';
                            echo '<script>window.location="data_kategori.php"</script>';
                        }else{
                            echo 'gagal' .mysqli_error($conn);
                        }

                    } 
                ?>
		    </div>
	    </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - Catering Barokah.</small>
        </div>
    </footer>
</body>
</html>