<?php
include("config/common.php");
include("../config/connect_mysql.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blank Page | <?php echo $lang['SITE_NAME']; ?></title>

    <?php include("include/page_style.php"); ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("include/header.php"); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $lang['PAGE_BLOGMANAGE_TITLE']; ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include("include/page_script.php"); ?>

</body>

</html>
