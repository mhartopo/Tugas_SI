<?php include("../includes/head.php"); ?>

    <div class="app">
        <!-- header -->
        <header id="header">
            <div class="row">
                <div class="title col-md-offset-9 col-md-3">
                    Lihat Semua Servis
                </div>
            </div>
        </header>
        <!-- / header -->

        <!-- content -->
        <div id="content" class="content">
        	<div class="row">
        		<div class="col-md-3">
    			  <button class="btn m-b-sm m-r-sm btn-success" onclick="location.href = 'tambah_servis.php';"><i class="m-r-xs fa fa-plus"></i>Tambahkan Servis</button>
    			</div>
        	<br><br><br>
        	<div>

        	<div class="panel panel-default">
			    <div class="panel-heading font-semibold">
                           <table class="table" ui-jq="footable" ui-options='{
						        "paging": {
						          "enabled": true
						        }}'>
						        <thead>
						          <tr>
						            <th data-breakpoints="xs">No</th>
						            <th>Jenis</th>
						            <th>Harga</th>
						            <th data-breakpoints="xs sm">Aksi</th>
						          </tr>
						        </thead>
						        <tbody>
						            <tr data-expanded="true">
						              <td></td>
						              <td></td>
						              <td></td>
						              <td>
						                <div class="btn-group dropdown">             
						                  <button class="btn m-b-sm m-r-sm btn-warning btn-sm" data-toggle="dropdown"><span class="caret"></span></button>
						                  <ul class="dropdown-menu">
						                    <li><a href="edit_servis.php">Edit</a></li>
						                    <li class="divider"></li>
						                    <li><a href="#">Hapus</a></li>
						                  </ul>
						                </div>
						              </td>
						            </tr>  
						        </tbody>
						      </table>
                        </div>
                    </div>
            <div class="row">
                <div class="col-md-12">
                    <a href = "#" class="btn btn-default btn-lg">Kembali</a>
                </div>
            </div>
        </div>
        <!-- / content -->
    </div>
<?php include("../includes/footer.php"); ?>