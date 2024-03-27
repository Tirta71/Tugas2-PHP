<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
        <h2 class="mt-4 text-center">Form Belanja</h2>
        <hr>
    <div class="row" >
        <div class="col-md-6" >
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="card-title">Harga Satuan</h4>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <span class="badge badge-primary badge-pill">Rp 50.000</span>
                            Kaos
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <span class="badge badge-primary badge-pill">Rp 100.000</span>
                            Celana
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <span class="badge badge-primary badge-pill">Rp 150.000</span>
                            Jaket
                        </a>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-md-6" >
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama Pelanggan:</label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan">
                    </div>
                    
                    <div class="form-group">
                        <label for="produk">Produk:</label>
                        <select class="form-control" id="produk" name="produk">
                            <option value="Kaos">Kaos</option>
                            <option value="Celana">Celana</option>
                            <option value="Jaket">Jaket</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="jumlah_beli">Jumlah Beli:</label>
                        <input type="number" class="form-control" id="jumlah_beli" name="jumlah_beli" min="1">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Hitung Total</button>
                    <a href="?" class="btn btn-secondary">Clear</a>
                </form>
            </div>
        </div>
       

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_pelanggan = $_POST['nama_pelanggan'];
            $produk = $_POST['produk'];
            $jumlah_beli = $_POST['jumlah_beli'];

            switch ($produk) {
                case 'Kaos':
                    $harga_satuan = 50000;
                    break;
                case 'Celana':
                    $harga_satuan = 100000;
                    break;
                case 'Jaket':
                    $harga_satuan = 150000;
                    break;
                default:
                    $harga_satuan = 0;
                    break;
            }

            $total_belanja = $jumlah_beli * $harga_satuan;
            $diskon = 0.2 * $total_belanja;
            $ppn = 0.1 * ($total_belanja - $diskon);
            $harga_bersih = ($total_belanja - $diskon) + $ppn;

            // Format Rupiah
            $harga_satuan_format = "Rp " . number_format($harga_satuan, 0, ',', '.');
            $total_belanja_format = "Rp " . number_format($total_belanja, 0, ',', '.');
            $diskon_format = "Rp " . number_format($diskon, 0, ',', '.');
            $ppn_format = "Rp " . number_format($ppn, 0, ',', '.');
            $harga_bersih_format = "Rp " . number_format($harga_bersih, 0, ',', '.');

            echo "<h3 class='mt-4'>Hasil Perhitungan:</h3>";
            echo "<div class='table-responsive'>";
            echo "<table class='table'>";
            echo "<tbody>";
            echo "<tr><th>Nama Pelanggan</th><td>$nama_pelanggan</td></tr>";
            echo "<tr><th>Produk</th><td>$produk</td></tr>";
            echo "<tr><th>Harga Satuan</th><td>$harga_satuan_format</td></tr>";
            echo "<tr><th>Jumlah Beli</th><td>$jumlah_beli</td></tr>";
            echo "<tr><th>Total Belanja</th><td>$total_belanja_format</td></tr>";
            echo "<tr><th>Diskon</th><td>$diskon_format</td></tr>";
            echo "<tr><th>PPN</th><td>$ppn_format</td></tr>";
            echo "<tr><th>Harga Bersih</th><td>$harga_bersih_format</td></tr>";
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
