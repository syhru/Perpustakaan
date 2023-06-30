<?php

include_once("connect.php");

    if(isset($_GET['isbn'])){

        mysqli_query($conn, "DELETE FROM buku WHERE isbn = '".$_GET['isbn']."'");
        header("location: index.php");
    }
   
?>