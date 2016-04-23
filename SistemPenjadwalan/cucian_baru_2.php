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
                    Cucian Baru
                </div>
            </div>
        </header>
        <!-- / header -->

        <!-- aside -->
        <aside id="aside">
            <div class="aside-wrap">
                <!-- nav -->
                <nav ui-nav class="navi clearfix">
                    <ul class="nav">
                        <li>
                            <span>1. Pelanggan</span>
                        </li>
                        <li class="active">
                            <span>2. Cucian</span>             
                        </li>
                        <li>
                            <span>3. Konfirmasi</span>
                        </li>
                    </ul>
                </nav>
                <!-- nav -->
            </div>
        </aside>
        <!-- / aside -->

        <!-- content -->
        <div id="content" class="content content-ul">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="../resources/functions/cucian_functions.php" role="form">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row wrapper-sm">
                                    <div class="col-sm-12">
                                        <label>Cucian</label>      
                                    </div>
                                </div>
                                <div class="row wrapper-sm">
                                    <div class="col-sm-4">
                                        <select id="jenisServis" class="input-sm form-control w-sm inline v-middle">
                                            <option value="0">Ekonomis (kg)</option>
                                            <option value="1">Bedcover Single</option>
                                            <option value="2">Bedcover Double</option>
                                            <option value="3">Selimut Tipis</option>
                                            <option value="4">Selimut Tebal</option>
                                            <option value="5">Sprei Single</option>
                                            <option value="6">Sprei Double</option>
                                            <option value="7">Cuci Satuan</option>
                                            <option value="8">Sepatu</option>
                                            <option value="9">Tas/Ransel</option>
                                            <option value="10">Blazer/Jas/Gaun</option>
                                            <option value="11">Stelan Jas</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input id="jumlah" type="number" class="input-sm form-control" placeholder="Jumlah">           
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="btn btn-sm btn-success" type="button" onclick="tambahCucian()">Tambah Cucian</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="tabelServis" class="table table-striped b-t b-light">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Jenis Servis</th>
                                            <th>Jumlah</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Total Jumlah Cucian</label>
                                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
                                </div>
                                <div class="col-sm-6">
                                    <label>Tanggal Selesai</label>
                                    <input type="text" name="tanggalSelesai" class="form-control" placeholder="YYYY-MM-DD">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Softener</label>
                                    <input type="text" name="softener" class="form-control m-b" placeholder="Softener">
                                </div>
                                <div class="col-sm-6">
                                    <label>Parfum</label>
                                    <input type="text" name="parfum" class="form-control m-b" placeholder="Parfum">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Antar ke Rumah?</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="isDelivery" id="optionsRadios1" value="Ya"> Ya
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="isDelivery" id="optionsRadios2" value="Tidak">Tidak
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Ambil dari Rumah?</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="isPickUp" id="optionsRadios1" value="Ya"> Ya
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="isPickUp" id="optionsRadios2" value="Tidak">Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>
                                        <input type="checkbox" name="bayar"> Sudah bayar
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button onClick="history.go(-1);return true;" class="btn btn-default btn-lg ">Kembali</button>
                                <button type="submit" name="createCucian2" class="btn btn-lg btn-success">Lanjut</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- / content -->

    </div>

    <script>
        function tambahCucian() {
            // insert row to table
            var table = document.getElementById("tabelServis");
            var tableSize = document.getElementById("tabelServis").rows.length;
            var row = table.insertRow(tableSize);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);

            // get jenis servis
            var jenisServis = document.getElementById("jenisServis");
            var jenisServisSelected = jenisServis.options[jenisServis.selectedIndex].text;
            var jumlah = document.getElementById('jumlah').value;

            cell1.innerHTML = tableSize;
            cell2.innerHTML = jenisServisSelected + "<input type=\"hidden\" name=\"jenisServis[" + tableSize + "][jenis]\" value=\"" + jenisServisSelected + "\" />";
            cell3.innerHTML = jumlah + "<input type=\"hidden\" name=\"jenisServis[" + tableSize + "][jumlah]\" value=" + jumlah + " />";
            cell4.innerHTML = 
                "<button class=\"btn btn-sm btn-danger\" type=\"button\" onclick=\"deleteRow(this)\">Hapus</button>" +
                "<input type=\"hidden\" name=\"jenisServis[" + tableSize + "][harga]\" value=\"huft\" />" + 
                "<input type=\"hidden\" name=\"jenisServis[" + tableSize + "][subtotal]\" />";
        }
        function deleteRow(row) {
            var p = row.parentNode.parentNode;
            p.parentNode.removeChild(p);

            // change row numbers
            var tableSize = document.getElementById("tabelServis").rows.length;
            var i = 0;
            for (i=0; i<tableSize; i++) {
                var x = document.getElementById("tabelServis").rows[i].cells;
                if (x[0].innerHTML != i && x[0].innerHTML != "No.")
                    x[0].innerHTML--;
            }
        }
    </script>

    <script src="../resources/libs/jquery/jquery/dist/jquery.js"></script>
    <script src="../resources/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
    <script src="js/ui-load.js"></script>
    <script src="js/ui-jp.config.js"></script>
    <script src="js/ui-jp.js"></script>
    <script src="js/ui-nav.js"></script>
    <script src="js/ui-toggle.js"></script>
    <script src="js/ui-client.js"></script>

</body>
</html>