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
                                        <th>Peran</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                  require_once(realpath(dirname(__FILE__) . "/../resources/functions/pengguna_functions.php"));
                                  if (empty($_GET))
                                    $search = '';
                                  else
                                    $search = $_GET['search'];
                                  $rows = getDataPenggunaBySearch($search);
                                  foreach ($rows as $row) {
                                    echo '
                                      <tr>
                                        <td>'. $row['id_pengguna'] .'</td>
                                        <td>'. $row['nama'] .'</td>
                                        <td>';
                                        if($row['peran'] == 1)
                                          echo "Admin";
                                        else
                                          echo "Petugas";
                                    echo '
                                        </td>
                                        <td><button class="btn btn-sm btn-success" type="button" href="atur_pengguna_ubah.php?id='. $row['id_pengguna'] .'">Ubah</button></td>
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
                                    <button class="btn btn-sm btn-success" type="button">Pengguna Baru</button>       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-default btn-lg ">Kembali</button>
                </div>
            </div>
        </div>
        <!-- / content -->

    </div>
<?php include ("../resources/templates/footer.html") ?>