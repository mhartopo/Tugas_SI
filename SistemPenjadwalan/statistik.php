<?php 
  include ("../resources/functions/statistic_count.php"); 

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
            Statistik
        </div>
    </div>
</header>
<!-- / header -->

<!-- content -->

   <div class="row content" id="content">
      <div class = "col-md-1"></div>
      <form role="form" action = "statistik-search.php" method = "GET">
          <div class="col-md-10">
              <div class="form-group">
                <div class "row">
                <label class="col-sm-1">Kategori</label>
                <div class="col-md-3">
                  <select name="category" class="form-control m-b">
                    <option>Permintaan</option>
                    <option>Pendapatan</option>
                  </select>
                </div>
                <label class="col-sm-1">Bulan</label>
                <div class="col-md-2">
                  <select name="bulan" class="form-control m-b">
                    <?php
                      for($i = 1; $i <= 12; $i++) {
                        echo "<option>".$i."</option>\n";
                      }
                    ?>
                  </select>
                </div>
                <label class="col-sm-1">Tahun</label>
                <div class="col-md-2">
                  <select name="tahun" class="form-control m-b">
                    <?php
                      $currYear = date('Y');
                      for($i = 0; $i <= 5; $i++) {
                        $y = $currYear - $i;
                        echo "<option>".$y."</option>\n";
                      }
                    ?>
                  </select>
                </div>
                <div class "col-md-4">
                  <button type="submit" class="btn btn-lg btn-default">GO!</button>
                </div>
              </div>
              </div>
      </form>
      <br></br>
  </div>

<div id="content" class="content">
  <h3>Permintaan Sepekan Terakhir</h3>
  <div class = "row">
  <div class = "col-md-12">    
    <div class="panel panel-default">
      <div class="panel-heading font-regular">Tabel Permintaan Sepekan Terakhir</div>
      <div class="panel-body no-padder">
        <div class="wrapper">
          <div ui-jq="plot" ui-options="
            [
              { data: [ <?php echo getNdayStat(7)?> ], label: ' Unique Visits', points: { show: true, radius: 3, fill:true,fillColor : '#00b0ff' }, lines: { show: true, fill: true, fillColor: { colors: [{ opacity: 0.1 }, { opacity: 0.1}] } } },                 
            ],
            {
              colors: [ '#00b0ff','#8dc80e' ],
              series: { shadowSize: 2 },
              xaxis:{ font: { color: '#ccc' } },
              yaxis:{ font: { color: '#ccc' } },
              grid: { hoverable: true, clickable: true, borderWidth: 0, color: '#ccc' },
              tooltip: true,
              legend : false,
              tooltipOpts: { content: '%s of %x.1 is %y.4',  defaultTheme: false, shifts: { x: 0, y: 20 } }
            }
          " style="height: 240px; padding: 0px; position: relative;"><canvas class="flot-base" width="501" height="240" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 501px; height: 240px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 22px; text-align: center;">0</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 74px; text-align: center;">1</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 126px; text-align: center;">2</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 178px; text-align: center;">3</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 230px; text-align: center;">4</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 282px; text-align: center;">5</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 334px; text-align: center;">6</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 386px; text-align: center;">7</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 438px; text-align: center;">8</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 490px; text-align: center;">9</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 217px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 6px; text-align: right;">0.0</div><div style="position: absolute; top: 181px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 6px; text-align: right;">2.5</div><div style="position: absolute; top: 145px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 6px; text-align: right;">5.0</div><div style="position: absolute; top: 110px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 6px; text-align: right;">7.5</div><div style="position: absolute; top: 74px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 0px; text-align: right;">10.0</div><div style="position: absolute; top: 38px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 0px; text-align: right;">12.5</div><div style="position: absolute; top: 2px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 0px; text-align: right;">15.0</div></div></div><canvas class="flot-overlay" width="501" height="240" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 501px; height: 240px;"></canvas></div>

           <div class="panel-info">
            <span class="pull-left text-info"> <i class="fa fa-circle"></i>Jumlah Permintaan</span>
          </div> 
        </div>              
      </div>   
   </div>
 </div>
</div>


<h3>Permintaan Sebulan Terakhir</h3>
  <div class = "row">
  <div class = "col-md-12">    
    <div class="panel panel-default">
      <div class="panel-heading font-regular">Tabel Permintaan Sebulan Terakhir</div>
      <div class="panel-body no-padder">
        <div class="wrapper">
          <div ui-jq="plot" ui-options="
            [
              { data: [ <?php echo getNdayStat(30) ?> ], label: ' Unique Visits', points: { show: true, radius: 3, fill:true,fillColor : '#00b0ff' }, lines: { show: true, fill: true, fillColor: { colors: [{ opacity: 0.1 }, { opacity: 0.1}] } } },                 
            ],
            {
              colors: [ '#00b0ff','#8dc80e' ],
              series: { shadowSize: 2 },
              xaxis:{ font: { color: '#ccc' } },
              yaxis:{ font: { color: '#ccc' } },
              grid: { hoverable: true, clickable: true, borderWidth: 0, color: '#ccc' },
              tooltip: true,
              legend : false,
              tooltipOpts: { content: '%s of %x.1 is %y.4',  defaultTheme: false, shifts: { x: 0, y: 20 } }
            }
          " style="height: 240px; padding: 0px; position: relative;"><canvas class="flot-base" width="501" height="240" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 501px; height: 240px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 22px; text-align: center;">0</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 74px; text-align: center;">1</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 126px; text-align: center;">2</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 178px; text-align: center;">3</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 230px; text-align: center;">4</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 282px; text-align: center;">5</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 334px; text-align: center;">6</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 386px; text-align: center;">7</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 438px; text-align: center;">8</div><div style="position: absolute; max-width: 50px; top: 228px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 490px; text-align: center;">9</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 217px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 6px; text-align: right;">0.0</div><div style="position: absolute; top: 181px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 6px; text-align: right;">2.5</div><div style="position: absolute; top: 145px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 6px; text-align: right;">5.0</div><div style="position: absolute; top: 110px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 6px; text-align: right;">7.5</div><div style="position: absolute; top: 74px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 0px; text-align: right;">10.0</div><div style="position: absolute; top: 38px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 0px; text-align: right;">12.5</div><div style="position: absolute; top: 2px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 12px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(204, 204, 204); left: 0px; text-align: right;">15.0</div></div></div><canvas class="flot-overlay" width="501" height="240" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 501px; height: 240px;"></canvas></div>

           <div class="panel-info">
            <span class="pull-left text-info"> <i class="fa fa-circle"></i>Jumlah Permintaan</span>
          </div> 
        </div>              
      </div>  
   </div>
   <div class="row">
            <div class="col-md-12">
                <a href = "menu_admin.php" class="btn btn-default btn-lg">Kembali</a>
            </div>
        </div> 
 </div>
</div>
</div>      
<!-- / content -->
</div>

<?php include("includes/footer.php"); ?>