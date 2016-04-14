<?php 
    include("includes/head.php"); 
    include('../../resources/functions/servis/servis.php');
    if(!isset($_GET['jenis'])) {
        header('Location: lihat_servis.php');   
    }
        
    $jenis = $_GET['jenis'];
    $result = getServis_jenis($jenis);
    $result = $result[0];
?>
       <div class="app">
        <!-- header -->
        <header id="header">
            <div class="row">
                <div class="title col-md-offset-9 col-md-3">
                   Edit Servis
                </div>
            </div>
        </header>
        <!-- / header -->

        <!-- content -->
        <div id="content" class="content">
            <div class="row">
                <div class="col-sm-12">
                    <form role="form" method = "POST" action = "update_servis_action.php">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" name = "jenis" class="form-control" value = "<?php echo $result['jenis'] ?>" readonly></input>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name = "harga" class="form-control" value = "<?php echo $result['harga'] ?>"></input>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- / content -->
    </div>
<?php include('includes/footer.php') ?>