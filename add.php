<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menambahkan Buku Baru</title>

    <link rel="stylesheet" href="css/Add.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
</head>
<body>

    <?php

    include_once ("connect.php");
    $array_penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
    $array_pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
    $array_katalog = mysqli_query($conn, "SELECT * FROM katalog");
    ?>
    
    <div class="container">

            <div class="judul">
                <h4>Tambah Buku Baru</h4>
            </div>
        <div class="row">

            <div class="col-md-12">
                <form action="add.php" method="POST" name="form1">
                    <table class="table table-bordered table-hover" width="100%" cellpadding="10" border="0">
                        <tr>
                            <td>ISBN</td>
                            <td><input type="text" name="isbn" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>JUDUL</td>
                            <td><input type="text" name="judul" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>TAHUN</td>
                            <td><input type="text" name="tahun" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>PENERBIT</td>
                            <td>
                                <select name="id_penerbit" id="" class="form-control">
                                    <?php
                                        while ($penerbit = mysqli_fetch_array($array_penerbit)){
                                            echo "
                                            <option value=".$penerbit['id_penerbit'].">".$penerbit['nama_penerbit']."</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>PENGARANG</td>
                            <td>
                                <select name="id_pengarang" id="" class="form-control">
                                <?php
                                        while ($pengarang = mysqli_fetch_array($array_pengarang)){
                                            echo "
                                            <option value=".$pengarang['id_pengarang'].">".$pengarang['nama_pengarang']."</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>KATALOG</td>
                            <td>
                                <select name="id_katalog" id="" class="form-control">
                                <?php
                                        while ($katalog = mysqli_fetch_array($array_katalog)){
                                            echo "
                                            <option value=".$katalog['id_katalog'].">".$katalog['nama']."</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>QUANTITY STOCK</td>
                            <td><input type="text" name="qty_stok" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>HARGA PINJAM</td>
                            <td><input type="text" name="harga_pinjam" class="form-control"></td>
                        </tr>
                    </table>
                    
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <input type="submit" name="Submit" class="form-control btn btn-primary" value="Tambah buku">
                    </div>
                </form>
            </div>
        </div>
    </div>                

</body>
</html>


<?php

    //insert data
    if(isset($_POST['Submit'])){
        $isbn = $_POST['isbn'];
        $judul = $_POST['judul'];
        $tahun = $_POST['tahun'];
        $id_penerbit = $_POST['id_penerbit'];
        $id_pengarang = $_POST['id_pengarang'];
        $id_katalog = $_POST['id_katalog'];
        $qty_stok = $_POST['qty_stok'];
        $harga_pinjam = $_POST['harga_pinjam'];

        $sql = "INSERT INTO buku (isbn, judul, tahun, id_penerbit, id_pengarang, id_katalog, qty_stok, harga_pinjam) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam')";

        if(mysqli_query($conn, $sql)){
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan');
                    window.location.href='index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data Gagal Ditambahkan');
                    window.location.href='add.php';
                </script>
            ";
        }
    }


?>