<?php include('includes/head.php'); ?>
<?php include '../resources/functions/cucian_functions.php'; ?>

<div class="app">
    <!-- header -->
    <header id="header">
        <div class="row">
            <div class="title col-md-offset-9 col-md-3">
                Jadwal Laundry
            </div>
        </div>
    </header>
    <!-- / header -->

    <!-- content -->
    <div id="content" class="content">
    	<div class="panel panel-default">
            <div class="panel-heading font-semibold">
                <div class="row">
		    		<div class="col-sm-12">
                       	<table class="table" ui-jq="footable" ui-options='{
					        "paging": {
					          "enabled": true
					        }}'>
					        <thead>
					          <tr>
					            <th data-breakpoints="xs">No</th>
					            <th>Tanggal Selesai</th>
					            <th>ID Laundry</th>
					            <th>Nama Pemilik</th>
					            <th>Parfum</th>
					            <th>Softener</th>
					            <th></th>
					          </tr>
					        </thead>
					        <tbody>
					        	<?php
					        		$laundry = getJadwalCucian();
					        		if (count($laundry > 0)) {
                                        $i = 1;
                                        foreach ($laundry as $key => $field) {
                                            echo "<tr data-expanded=\"true\">";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$laundry[$key]['tanggal_selesai']."</td>";
                                            echo "<td>".$laundry[$key]['id_laundry']."</td>";
                                            echo "<td>".$laundry[$key]['nama_customer']."</td>";
                                            echo "<td>".$laundry[$key]['parfum']."</td>";
                                            echo "<td>".$laundry[$key]['softener']."</td>";
                                            echo "<td>
                                                <input type=button class=\"btn btn-sm btn-success\" onClick=\"parent.location='detail_cucian.php?id=".$laundry[$key]['id_laundry']."'\" value='Lihat Cucian'>
                                            	</td>";
                                            $i = $i + 1;
                                            echo "</tr>";
                                        }
                                    };
					        	?>
					            
					        </tbody>
					    </table>
					</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href = "#" class="btn btn-success btn-lg">Kembali</a>
            </div>
        </div>
    </div>
    <!-- / content -->
</div>

<?php include('includes/head.php'); ?>