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
                    Atur Pelanggan
                </div>
            </div>
        </header>
        <!-- / header -->

        <!-- content -->
        <div id="content" class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row wrapper-sm">
                                <div class="col-sm-7">
                                    <select class="input-sm form-control w-sm inline v-middle">
                                        <option value="0">Urut berdasarkan...</option>
                                        <option value="1">Delete selected</option>
                                        <option value="2">Bulk edit</option>
                                        <option value="3">Export</option>
                                    </select>            
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <input type="text" class="input-sm form-control" placeholder="Pencarian...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm btn-default" type="button"><i class="icon-bdg_search text14"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Kuota</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                  require_once(realpath(dirname(__FILE__) . "/../resources/functions/pelanggan_functions.php"));
                                  if (empty($_GET))
                                    $search = '';
                                  else
                                    $search = $_GET['search'];
                                  $rows = getDataPelangganBySearch($search);
                                  foreach ($rows as $row) {
                                    echo '
                                      <tr>
                                        <td>'. $row['id_member'] .'</td>
                                        <td>'. $row['nama'] .'</td>
                                        <td>'. $row['kuota'] .'</td>
                                        <td><a class="btn btn-sm btn-success" type="button" href="atur_pelanggan_ubah.php?id='. $row['id_member'] .'">Ubah</a></td>
                                      </tr>
                                    ';
                                  }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row wrapper-sm">
                                <div class="col-sm-12">
                                    <a class="btn btn-sm btn-success" type="button" href="atur_pelanggan_baru.php">Member Baru</a>       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a type="button" class="btn btn-default btn-lg " href="menu_admin.php">Kembali</a>
                </div>
            </div>
        </div>
        <!-- / content -->

    </div>
<?php include ("../resources/templates/footer.html") ?>