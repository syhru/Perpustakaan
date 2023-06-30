<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


</head>
<body>

<?php
include_once ("connect.php");

$books = mysqli_query($conn, "SELECT  buku.* FROM buku");
?>
                    <table id="table">
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


                        <tbody>
                            <?php
                                while($book = mysqli_fetch_array($books)){
                                    echo "
                                    
                                        <tr>
                                            <td>".$book['isbn']."</td>
                                            <td>".$book['judul']."</td>
                                            <td>".$book['tahun']."</td>
                                            <td>".$book['id_penerbit']."</td>
                                            <td>".$book['id_pengarang']."</td>
                                            <td>".$book['id_katalog']."</td>
                                            <td>".$book['qty_stok']."</td>
                                            <td>".$book['harga_pinjam']."</td>
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
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#table').DataTable();
    });

</script>