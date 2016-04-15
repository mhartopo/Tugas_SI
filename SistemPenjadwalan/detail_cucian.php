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
    <link rel="stylesheet" href="css/mighticon.css" type="text/css" />
</head>
<body>
    <?php
        include '../resources/functions/cucian_functions.php';
        $laundry = getCucianById($_GET['id']);
        $servis = getServisById($_GET['id']);
    ?>
    <div class="app">
        <!-- header -->
        <header id="header">
            <div class="row">
                <div class="title col-md-offset-9 col-md-3">
                    Detail Cucian
                </div>
            </div>
        </header>
        <!-- / header -->

        <!-- content -->
        <div id="content" class="content">
            <div class="row">
                <div class="col-sm-6">
                    <table class='table table-borderless'>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>: <?php echo $laundry[0]['nama_customer']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: <?php echo $laundry[0]['alamat_customer']; ?></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td>: <?php echo $laundry[0]['no_telp_customer']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Order</td>
                                <td>: <?php echo $laundry[0]['tanggal_masuk']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Selesai</td>
                                <td>: <?php echo $laundry[0]['tanggal_selesai']; ?></td>
                            </tr>
                            <tr>
                                <td>Total Biaya</td>
                                <td>: <?php echo $laundry[0]['harga']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table class='table table-borderless'>
                        <tbody>
                            <tr>
                                <td>Member</td>
                                <td>: </td>
                            </tr>
                            <tr>
                                <td>Kuota</td>
                                <td>: </td>
                            </tr>
                            <tr>
                                <td>Softener</td>
                                <td>: <?php echo $laundry[0]['softener'] ?></td>
                            </tr>
                            <tr>
                                <td>Parfum</td>
                                <td>: <?php echo $laundry[0]['parfum'] ?></td>
                            </tr>
                            <tr>
                                <td>Delivery</td>
                                <td>: <?php echo $laundry[0]['delivery'] ?></td>
                            </tr>
                            <tr>
                                <td>Pick-up</td>
                                <td>: <?php echo $laundry[0]['pick_up'] ?></td>
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
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (count($servis) > 0) {
                                        $i = 1;
                                        foreach ($servis as $row) {
                                            echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$row['jenis']."</td>";
                                            echo "<td>".$row['jumlah']."</td>";
                                            $i = $i + 1;
                                            echo "</tr>";
                                        }
                                    };
                                ?>
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-default btn-lg ">Kembali</button>
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