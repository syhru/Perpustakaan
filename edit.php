<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
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

    $isbn = $_GET['isbn'];
    $buku = mysqli_query($conn, "SELECT * FROM buku WHERE isbn = '$isbn'");

    while($buku_data = mysqli_fetch_array($buku)){

        $judul = $buku_data['judul'];
        $isbn = $buku_data['isbn'];
        $tahun = $buku_data['tahun'];
        $id_penerbit = $buku_data['id_penerbit'];
        $id_pengarang = $buku_data['id_pengarang'];
        $id_katalog = $buku_data['id_katalog'];
        $qty_stok = $buku_data['qty_stok'];
        $harga_pinjam = $buku_data['harga_pinjam'];

    }


    ?>
    
    <div class="container">

        <div class="row" style="margin: 50px;">
            <div class="col-md-12">
                <h4>EDIT BUKU </h4>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <form action="edit.php?isbn=<?php echo $isbn; ?>" method="POST" name="form1">
                    <table class="table table-bordered table-hover" width="100%" cellpadding="10" border="0">
                        <tr>
                            <td>ISBN</td>
                            <td><input type="text" readonly="" name="isbn" class="form-control" value="<?php echo "$isbn"; ?>"></td>
                        </tr>
                        <tr>
                            <td>JUDUL</td>
                            <td><input type="text" name="judul" class="form-control" value="<?php echo "$judul"; ?>"></td>
                        </tr>
                        <tr>
                            <td>TAHUN</td>
                            <td><input type="text" name="tahun" class="form-control" value="<?php echo "$tahun"; ?>"></td>
                        </tr>
                        <tr>
                            <td>PENERBIT</td>
                            <td>
                                <select name="id_penerbit" id="" class="form-control">
                                    <?php
                                        while ($penerbit = mysqli_fetch_array($array_penerbit)){
                                            echo "
                                            <option ".($penerbit['id_penerbit'] == $id_penerbit ? 'selected' : '')." value=".$penerbit['id_penerbit'].">".$penerbit['nama_penerbit']."</option>
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
                                            <option ".($pengarang['id_pengarang'] == $id_pengarang ? 'selected' : '')." value=".$pengarang['id_pengarang'].">".$pengarang['nama_pengarang']."</option>
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
                                            <option ".($katalog['id_katalog'] == $id_katalog ? 'selected' : '')." value=".$katalog['id_katalog'].">".$katalog['nama']."</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>QUANTITY STOCK</td>
                            <td><input type="text" name="qty_stok" class="form-control" value="<?php echo "$qty_stok"; ?>"></td>
                        </tr>
                        <tr>
                            <td>HARGA PINJAM</td>
                            <td><input type="text" name="harga_pinjam" class="form-control" value="<?php echo "$harga_pinjam"; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="Edit" class="form-control btn btn-primary" value="Add"></td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>
    </div>



</body>
</html>

<?php


   //update data
    if(isset($_POST['Edit'])){
        $isbn = $_GET['isbn'];
        $judul = $_POST['judul'];
        $tahun = $_POST['tahun'];
        $id_penerbit = $_POST['id_penerbit'];
        $id_pengarang = $_POST['id_pengarang'];
        $id_katalog = $_POST['id_katalog'];
        $qty_stok = $_POST['qty_stok'];
        $harga_pinjam = $_POST['harga_pinjam'];

        $result = mysqli_query($conn, "UPDATE buku SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn'");

        if($result){
            echo "<script>alert('Data Berhasil Diubah');</script>";
            echo "<script>location='index.php';</script>";
    }
    else {
        echo "<script>alert('Data Gagal Diubah');</script>";
        echo "<script>location='index.php';</script>";
    }
    }
?>
