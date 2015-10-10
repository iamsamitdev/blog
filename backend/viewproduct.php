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

    <title>Procut Data | <?php echo $lang['SITE_NAME']; ?></title>

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

                     <div class="row page-header">
                            <div class="col-sm-6">
                                    <h1 class="">Product Data</h1>
                            </div>
                                
                            <div class="col-sm-6 text-right padding-top-20">
                                    <a href="export_excel.php" class="btn btn-success">Exoprt Excel</a>
                                    <a href="export_pdf.php" class="btn btn-danger">Exoprt PDF</a>
                            </div>
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
