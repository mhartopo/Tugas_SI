<?php 
    include('includes/head.php');
    include '../resources/functions/cucian_functions.php'; 
    $file = realpath(dirname(__FILE__)."/../resources/log.txt");
    $i = 1;
    $content = file_get_contents($file);
    $content_arr = explode("\n", $content);

?>

<div class="app">
    <!-- header -->
    <header id="header">
        <div class="row">
            <div class="title col-md-offset-9 col-md-3">
                Log Aktivitas
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
					            <th>Waktu</th>
					            <th>Tipe</th>
					            <th>Pesan</th>
					          </tr>
					        </thead>
					        <tbody>
                                <?php
                                    foreach ($content_arr as $logs) {
                                        if(strlen($logs) > 10){ 
                                            echo "<tr data-expanded=\"true\">";
                                            echo "<td>".$i."</td>";
                                            $i++;
                                            $logs_arr = explode(" - ",$logs);
                                            foreach($logs_arr as $log_param) {

                                                echo"<td>".$log_param."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                    }
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