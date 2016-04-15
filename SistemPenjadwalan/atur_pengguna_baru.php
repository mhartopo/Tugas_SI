<?php include ("../resources/templates/header.html") ?>
    <div class="app">
        <!-- header -->
        <header id="header">
            <div class="row">
                <div class="title col-md-offset-9 col-md-3">
                    Pengguna Baru
                </div>
            </div>
        </header>
        <!-- / header -->

        <!-- content -->
        <div id="content" class="content">
            <div class="row">
                <div class="col-sm-6">
                    <form role="form" method="post" action="../resources/functions/penggunaBaru.php">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Peran</label>
                            <select name="peran" class="form-control m-b">
                                <option value="0">Petugas</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kata Kunci</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Kata Kunci</label>
                            <input type="password" class="form-control" name="password_c">
                        </div>
                        <button type="submit" class="btn btn-default btn-lg ">Batal</button>
                        <button type="submit" class="btn btn-lg btn-success">Selesai</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- / content -->

    </div>
<?php include ("../resources/templates/footer.html") ?>