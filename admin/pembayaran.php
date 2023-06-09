<?php 
include 'sidenav.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div id="main">
        <div class="head">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; color: black;" class="nav"  >☰ Product</span>
            </div>

            <div class="col-div-6">
                <div class="profile">
                    <img src="../asset/user.png" class="pro-img" />
                    <p>Ilham Zamzami <span>Admin</span></p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="tambah">
            <a href="productAdd.php" class="tambah__button flex">
                <i class="ri-add-box-fill"></i>
                <p>Tambahkan Produk</p>
            </a>
        </div>

        <div class="table">
            <table class="table__produk" id="produkTable">
                <thead class="table__head">
                    <tr>
                        <th>NOMER</th>
                        <th>NAMA</th>
                        <th>JUMLAH</th>
                        <th>HARGA</th>
                        <th>GAMBAR</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        <script>
    $(document).ready(function() {
        // Mengambil data produk dari API "read.php"
        $.ajax({
            url: "http://localhost/JWT_PAA/api/UserBuktiRead.php",
            type: "GET",
            success: function(response) {
                var data = JSON.parse(response);

                // Memasukkan data produk ke dalam tabel HTML
                var tableBody = $("#produkTable tbody");
                tableBody.empty();

                for (var i = 0; i < data.length; i++) {
                    var row = "<tr>";
                    row += "<td>" + (i+1)+ "</td>";
                    row += "<td>" + data[i].nama_user + "</td>";
                    row += "<td>" + data[i].quantity + "</td>";
                    row += "<td>" + data[i].total_price + "</td>";
                    row += "<td>";
                    row += "<a href='pembayaranDetail.php?id=" + data[i].id + "'>Lihat</a>";
                    row += "</td>"; 
                    row += "</tr>";

                    tableBody.append(row);
                }
            }
        });
    });
    </script>    
</body>
</html>
