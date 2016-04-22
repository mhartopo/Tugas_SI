<?php include ("../resources/templates/header_admin.html") ?>
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
                    <form role="form" method="post" action="../resources/functions/penggunaController.php" class="pull-right">
                        <input type="hidden" class="form-control" name="id" value=<?php echo $_GET['id'];?>>
                        <input type="submit" class="btn btn-lg btn-danger" name="pengguna_hapus" value="Hapus">
                    </form>
                    <form role="form" method="post" action="../resources/functions/penggunaController.php">
                    <?php
                        require_once(realpath(dirname(__FILE__) . "/../resources/functions/pengguna_functions.php"));
                        $user = getDataPengguna($_GET['id']);
                    ?>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="username" value=<?php echo $user['nama']; ?>>
                            </div>
                            <div class="form-group">
                                <label>Peran</label>
                                <select name="peran" class="form-control m-b">
                                    <option value="0" <?php if ($user['peran'] == 0) echo 'selected'; ?>>Petugas</option>
                                    <option value="1" <?php if ($user['peran'] == 1) echo 'selected'; ?>>Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kata Kunci</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Kata Kunci</label>
                                <input type="password" class="form-control" name="password_c">
                                <input type="hidden" class="form-control" name="id" value=<?php echo $_GET['id'];?>>
                            </div>
                            <a type="button" class="btn btn-default btn-lg" href="atur_pengguna.php">Batal</a>
                            <input type="submit" class="btn btn-lg btn-success" name="pengguna_ubah" value="Selesai">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- / content -->

    </div>
<?php include ("../resources/templates/footer.html") ?>