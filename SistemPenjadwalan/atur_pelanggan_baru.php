<?php
    include '../resources/functions/pengguna_functions.php';
     if (isAdmin())
       include ("../resources/templates/header_admin.html");
    else if (isPetugas())
        include ("../resources/templates/header.html");
 ?>
    <div class="app">
        <!-- header -->
        <header id="header">
            <div class="row">
                <div class="title col-md-offset-9 col-md-3">
                    Atur Pengguna
                </div>
            </div>
        </header>
        <!-- / header -->

        <!-- content -->
        <div id="content" class="content">
            <div class="row">
                <div class="col-sm-12">
                    <form role="form" method="post" action="../resources/functions/pelangganController.php">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label>No. Telpon</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <a type="button" class="btn btn-default btn-lg" href="atur_pelanggan.php">Batal</a>
                            <input type="submit" class="btn btn-lg btn-success" name="pelanggan_baru" value="Selesai"></input>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- / content -->

    </div>
<?php include ("../resources/templates/footer.html") ?>