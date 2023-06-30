<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA PENERBIT</title>

    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>
<body>

    <?php
        include_once("connect.php");
        $table_penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
    ?>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="text-center">ID PENERBIT</td>
                                <td class="text-center">nama penerbit</td>
                                <td class="text-center">EMAIL</td>
                                <td class="text-center">NOMER TELEPON</td>
                                <td class="text-center">ALAMAT</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                while($penerbit = mysqli_fetch_array($table_penerbit)){

                                    echo "
                                    
                                    <tr>
                                        <td><center>".$penerbit['id_penerbit']."</center></td>
                                        <td><center>".$penerbit['nama_penerbit']."</center></td>
                                        <td><center>".$penerbit['email']."</center></td>
                                        <td><center>".$penerbit['telp']."</center></td>
                                        <td><center>".$penerbit['alamat']."</center></td>
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
</body>
</html>