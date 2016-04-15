<?php include ("../resources/templates/header.html") ?>
    <div class="app">
        <!-- aside -->
        <div id="aside" class="background-ul col-md-2">
            <div><br></div>
            <div>
                <img src="img/logo-ul.png" class="icon-md"></img>
            </div>
            <div><br></div> 
            <!--<div class="aside-wrap">-->
                <!-- nav -->
                <!--<nav ui-nav class="navi clearfix">
                    <ul class="nav">
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span><img src="img/logo-ul.png" class="icon-md"></img></span>             
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </nav>-->
                <!-- nav -->
            <!--</div>-->
        </div>
        <!-- / aside -->

        <!-- content -->
        <div id="content" class="content col-md-10">
            <form role="form">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-lg btn-success">Masuk</button>
            </form>
        </div>
        <!-- / content -->
    </div>
<?php include ("../resources/templates/footer.html") ?>