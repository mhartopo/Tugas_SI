<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8" />
    <title>Urban Laundry</title>
    <meta name="description" content="Urban Laundry Bandung" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="../resources/libs/assets/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="../resources/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="../resources/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="../resources/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    <div class="app">
        <!-- header -->
        <header id="header">
            <div class="row">
                <div class="title col-md-offset-9 col-md-3">
                    Cucian Baru
                </div>
            </div>
        </header>
        <!-- / header -->

        <!-- aside -->
        <aside id="aside">
            <div class="aside-wrap">
                <!-- nav -->
                <nav ui-nav class="navi clearfix">
                    <ul class="nav">
                        <li>
                            <span>1. Pelanggan</span>
                        </li>
                        <li>
                            <span>2. Cucian</span>             
                        </li>
                        <li class="active">
                            <span>3. Konfirmasi</span>
                        </li>
                    </ul>
                </nav>
                <!-- nav -->
            </div>
        </aside>
        <!-- / aside -->

        <!-- content -->
        <div id="content" class="content content-ul">
            <div class="row">
                <div class="col-sm-6">
                    <table class='table table-borderless'>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>: <?php session_start(); echo $_SESSION['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: <?php echo $_SESSION['alamat'] ?></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td>: <?php echo $_SESSION['telepon'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Order</td>
                                <td>: <?php echo $_SESSION['tanggalOrder'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Selesai</td>
                                <td>: <?php echo $_SESSION['tanggalSelesai'] ?></td>
                            </tr>
                            <tr>
                                <td>Bayar</td>
                                <td>: <?php if ($_SESSION['isMember']=="Bukan Member")
                                                if ($_SESSION['bayar']==0)
                                                    echo "Belum"; 
                                                else
                                                    echo "Sudah";
                                            else
                                                echo "Sudah";
                                      ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table class='table table-borderless'>
                        <tbody>
                            <tr>
                                <td>Member</td>
                                <td>: <?php echo $_SESSION['isMember'] ?></td>
                            </tr>
                            <tr>
                                <td>Kuota</td>
                                <td>: <?php if ($_SESSION['isMember']=="Member") echo $_SESSION['kuota'] ?></td>
                            </tr>
                            <tr>
                                <td>Softener</td>
                                <td>: <?php echo $_SESSION['softener'] ?></td>
                            </tr>
                            <tr>
                                <td>Parfum</td>
                                <td>: <?php echo $_SESSION['parfum'] ?></td>
                            </tr>
                            <tr>
                                <td>Delivery</td>
                                <td>: <?php echo $_SESSION['isDelivery'] ?></td>
                            </tr>
                            <tr>
                                <td>Pick-up</td>
                                <td>: <?php echo $_SESSION['isPickUp'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <table class='table table-striped m-b-none'>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Jenis Servis</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (count($_SESSION['jenisServis']) > 0) {
                                        $i = 1;
                                        foreach ($_SESSION['jenisServis'] as $row) {
                                            echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$row['jenis']."</td>";
                                            echo "<td>".$row['harga']."</td>";
                                            echo "<td>".$row['jumlah']."</td>";
                                            echo "<td>".$row['subtotal']."</td>";
                                            $i = $i + 1;
                                            echo "</tr>";
                                        }
                                    };
                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td><?php echo $_SESSION['total']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <button class="btn btn-default btn-lg " onClick="history.go(-1);return true;" >Kembali</button>
                </div>
                <div class="col-sm-3">
                    <form method="post" action="../resources/functions/cucian_functions.php" role="form">
                        <button type="submit" name="createCucian3" class="btn btn-lg btn-success">Cetak</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- / content -->

    </div>

    <script src="../resources/libs/jquery/jquery/dist/jquery.js"></script>
    <script src="../resources/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
    <script src="js/ui-load.js"></script>
    <script src="js/ui-jp.config.js"></script>
    <script src="js/ui-jp.js"></script>
    <script src="js/ui-nav.js"></script>
    <script src="js/ui-toggle.js"></script>
    <script src="js/ui-client.js"></script>

</body>
</html>