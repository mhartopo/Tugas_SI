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
                <div class="col-sm-12">
                    <form role="form">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-lg btn-danger">Hapus</button>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="peran" class="form-control">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>No. Telpon</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <p class="col-md-1">Kuota</p>
                                <p class="col-md-5">: Rp. 10000</p>
                                <div class="form-group col-md-4">
                                    <label class="hidden">Tambah Kuota</label>
                                    <input type="number" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-md btn-success">Tambah Kuota</button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default btn-lg ">Batal</button>
                            <button type="submit" class="btn btn-lg btn-success">Selesai</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- / content -->

    </div>
<?php include ("../resources/templates/footer.html") ?>