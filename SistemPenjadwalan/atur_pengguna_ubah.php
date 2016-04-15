<?php include ("../resources/templates/header.html") ?>
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
                <div class="col-sm-6">
                    <form role="form">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Peran</label>
                            <select name="peran" class="form-control m-b">
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kata Kunci</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Kata Kunci</label>
                            <input type="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default btn-lg ">Batal</button>
                        <button type="submit" class="btn btn-lg btn-success">Selesai</button>
                    </form>
                </div>
                <div class="col-sm-offset-1 col-sm-5">
                    <button type="submit" class="btn btn-lg btn-danger">Hapus</button>
                </div>
            </div>

        </div>
        <!-- / content -->

    </div>
<?php include ("../resources/templates/footer.html") ?>