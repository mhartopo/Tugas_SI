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
                    <form role="form" method="post" action="../resources/functions/pelangganController.php"  class="pull-right">
                        <input type="hidden" class="form-control" name="id" value=<?php echo $_GET['id'];?>>
                        <input type="submit" class="btn btn-lg btn-danger" name="pelanggan_hapus" value="Hapus">
                    </form>
                    <form role="form" method="post" action="../resources/functions/pelangganController.php">
                    <?php
                        require_once(realpath(dirname(__FILE__) . "/../resources/functions/pelanggan_functions.php"));
                        $member = getDataPelanggan($_GET['id']);
                    ?>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value=<?php echo $member['nama']; ?>>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat"><?php echo $member['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>No. Telpon</label>
                                <input type="text" class="form-control" name="phone" value=<?php echo $member['no_telp']; ?>>
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="col-md-1">Kuota</label>
                                <p class="col-md-5">: <?php echo $member['kuota'];?></p>
                                <div class="form-group col-md-4">
                                    <label class="hidden">Tambah Kuota</label>
                                    <input type="number" class="form-control" name="kuota" min="0">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-md btn-success" name="kuota_tambah" value="Tambah Kuota">
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="id" value=<?php echo $_GET['id'];?>>
                            <a type="button" class="btn btn-default btn-lg" href="atur_pelanggan.php">Batal</a>
                            <input type="submit" class="btn btn-lg btn-success" name="pelanggan_ubah" value="Selesai">
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- / content -->

    </div>
<?php include ("../resources/templates/footer.html") ?>