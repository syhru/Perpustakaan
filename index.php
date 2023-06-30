<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data buku</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#table_buku').DataTable();
        });

    </script>


</head>
<body>
    
<?php

    include_once ("connect.php");
    $books = mysqli_query($conn, "SELECT  buku.* , katalog.nama as nama_katalog, penerbit.nama_penerbit as nama_penerbit, pengarang.nama_pengarang as nama_pengarang FROM buku
                                  LEFT JOIN katalog ON katalog.id_katalog = buku.id_katalog
                                  LEFT JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit
                                  LEFT JOIN pengarang ON pengarang.id_pengarang = buku.id_pengarang");



?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16" style="margin-left: 15px">
        <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
        </svg>
        <div style="margin-left: 15px;">
            <a class="navbar-brand" href="#">Perpustakaan</a>
        </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul id="navigasi" class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="penerbit.php">Penerbit</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" aria-current="page" href="katalog.php">katalog</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="pengarang.php" aria-current="page">Pengarang</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

        <main>
        <div class="row">
            <div class="col-md-12">
                <a href="add.php" id="tambah-buku" class="btn btn-primary">Tambahkan Buku</a>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="table_buku">
                        <thead>
                            <tr>
                                <td class="text-center">ISBN</td>
                                <td class="text-center">JUDUL</td>
                                <td class="text-center">TAHUN</td>
                                <td class="text-center">PENERBIT</td>
                                <td class="text-center">PENGARANG</td>
                                <td class="text-center">KATALOG</td>
                                <td class="text-center">QUANTITY STOCK</td>
                                <td class="text-center">HARGA PINJAM</td>
                                <td class="text-center">Action</td>
                            </tr>
                        </thead>
</center>

                        <tbody>
                            <?php
                                while($book = mysqli_fetch_array($books)){
                                    echo "
                                    
                                        <tr>
                                            <td><center>".$book['isbn']."</center></td>
                                            <td><center>".$book['judul']."</center></td>
                                            <td><center>".$book['tahun']."</center></td>
                                            <td><center>".$book['nama_penerbit']."</center></td>
                                            <td><center>".$book['nama_pengarang']."</center></td>
                                            <td><center>".$book['nama_katalog']."</center></td>
                                            <td><center>".$book['qty_stok']."</center></td>
                                            <td><center>".$book['harga_pinjam']."</center></td>
                                            <td class = 'text-center'>
                                                <a href='edit.php?isbn=".$book['isbn']."' class= 'btn btn-warning'>Edit</a>
                                                <a href='delete.php?isbn=".$book['isbn']." 'class= 'btn btn-danger' value='hapus' onClick='confirmation()'>Delete</a>  
                                            </td>
                                        </tr>
                                    
                                    ";
                                }
                            ?>

                        </tbody>
                       
                    </table>
                </div>
            </div>
        </div>
    </div>
    </main>

    
</body>
</html>

<script type="text/javascript">
    function confirmation(isbn){
        if(confirm('Apakah anda yakin ingin menghapus data buku ini?')){
            window.location.href = 'delete.php?isbn'+isbn;
        }
        
    }
</script>