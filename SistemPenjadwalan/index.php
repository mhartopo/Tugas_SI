<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8" />
    <title>Urban Laundry</title>
    <meta name="description" content="Urban Laundry Bandung" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="../resources/libs/assets/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="../resources/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="../resources/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="../resources/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/style-bayu.css" type="text/css" />
</head>
<body>
    <div class="app">
        <!-- aside -->
        <div id="aside" class="background-ul col-md-2">
            <div><br></div>
            <div>
                <img src="img/logo-ul.png" class="icon-md"></img>
            </div>
            <div><br></div> 
        </div>
        <!-- / aside -->

        <!-- content -->
        <div id="content" class="content col-md-10">
            <form role="form" method="post" class="form-validation" action="../resources/functions/penggunaController.php">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <input type="submit" class="btn btn-lg btn-success" value="Masuk" name="login">
            </form>
        </div>
        <!-- / content -->
    </div>
<?php include ("../resources/templates/footer.html") ?>