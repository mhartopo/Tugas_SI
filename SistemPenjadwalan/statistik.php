<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <title>Bandung Web Kit | BDGWEBKIT</title>
  <meta name="description" content="Bandung Web Kit" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="../resources/libs/assets/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../resources/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../resources/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="../resources/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/style-muhtar.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />

</head>
<body>
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
        <div id="content" class="content">
            
       <div class="row">
              <div class="col-lg-4">
                <div class="panel panel-default">
                  <div class="panel-heading font-regular">
                    New Visitors
                  </div>
                  <div class="panel-body text-center no-padder">
                    <h4 class="text-warning">120.000</h4>
                    <small class="text-light-grey block">Updated at 1 minutes ago</small>
                    <div class="inline">
                      <div ui-jq="easyPieChart" ui-options="{
                                percent: 75,
                                lineWidth: 10,
                                trackColor: '#e5e6ec',
                                barColor: '#ff7e00',
                                scaleColor: '#fff',
                                size: 188,
                                lineCap: 'butt'
                              }">
                        <div>
                          <span class="h2">75%</span>
                          <div class="text">Yesterday</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer"><small>% of avarage rate of the Conversion</small></div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="panel panel-default">
                  <div class="panel-heading font-regular">
                    Today Visitors
                  </div>
                  <div class="panel-body text-center no-padder">
                    <h4 class="text-success">40.000</h4>
                    <small class="text-light-grey block">Updated at 3 minutes ago</small>
                    <div class="inline">
                      <div ui-jq="easyPieChart"  ui-options="{
                                percent: 25,
                                lineWidth: 10,
                                trackColor: '#e5e6ec',
                                barColor: '#8dc80e',
                                scaleColor: '#ffffff',
                                size: 188,
                                lineCap: 'butt',
                                animate: 1000
                              }">
                        <div>
                          <span class="h2 m-l-sm step">25</span>%
                          <div class="text">today</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer"><small>% of change</small></div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="panel panel-default">
                  <div class="panel-heading font-regular">
                    Daily Visitors
                  </div>
                  <div class="panel-body text-center no-padder">
                    <h4 class="text-info">430.000</h4>
                    <small class="text-light-grey block">All Domestic Visitors</small>
                    <div class="inline">
                      <div ui-jq="easyPieChart"  ui-options="{
                                percent: 97,
                                lineWidth: 10,
                                trackColor: '#e5e6ec',
                                barColor: '#00b0ff',
                                scaleColor: '#ffffff',
                                size: 188,
                                lineCap: 'butt',
                                animate: 1000
                              }">
                        <div>
                          <span class="h2 m-l-sm step">97</span>%
                          <div class="text">All Visitors</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer"><small>% of change</small></div>
                </div>
              </div>
   
          </div>
                
        <!-- / content -->
    </div>




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