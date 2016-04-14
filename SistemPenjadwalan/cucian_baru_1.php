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

    <?php include '../resources/functions/cucian_functions.php'; ?>

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
                        <li class="active">
                            <span>1. Pelanggan</span>
                        </li>
                        <li>
                            <span>2. Cucian</span>             
                        </li>
                        <li>
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
            <form method="post" action="../resources/functions/cucian_functions.php" role="form">
                <div class="form-group">
                    <select name="isMember" class="form-control m-b">
                        <option>Bukan Member</option>
                        <option>Member</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="telepon" class="form-control" placeholder="Nomor Telepon">
                </div>
                <button class="btn btn-default btn-lg ">Kembali</button>
                <button type="submit" name="createCucian1" class="btn btn-lg btn-success">Lanjut</button>
            </form>
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