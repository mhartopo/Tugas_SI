<?php include("../includes/head.php"); ?>

       <div class="app">
        <!-- header -->
        <header id="header">
            <div class="row">
                <div class="title col-md-offset-9 col-md-3">
                    Tambah Servis
                </div>
            </div>
        </header>
        <!-- / header -->

        <!-- content -->
        <div id="content" class="content">
            <div class="row">
                <div class="col-sm-12">
                    <form role="form" action = "#" method = "POST">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" name = "jenis" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name = "harga" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success">Tambah</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- / content -->
    </div>


    
<?php include('../includes/footer.php') ?>