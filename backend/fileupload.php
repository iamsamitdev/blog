<?php
include("config/common.php");
include("../config/connect_mysql.php");

// File config variable
$max_size = 1024*20000; // max file size (20MB)
$extensions = array('jpeg', 'jpg', 'png','zip','docx','pdf','xls','sql','pptx'); // Allow file type
$dir = 'uploads/'; // path to move file
$count = 0; // Percent upload start

// Check submit form
if($_POST['submit'] and isset($_FILES['files']))
{
    // loop all files
    foreach ($_FILES['files']['name'] as $i => $name) {
         // if file not uploaded then skip it
         if (!is_uploaded_file($_FILES['files']['tmp_name'][$i]))
         {
            continue;
         }

        // skip large files
        if ( $_FILES['files']['size'][$i] >= $max_size )
        {
            continue;
        }

        // skip unprotected files
        if(!in_array(pathinfo($name, PATHINFO_EXTENSION), $extensions))
        {
            continue;
        }

        // now we can move uploaded files
        if(move_uploaded_file($_FILES["files"]["tmp_name"][$i], $dir.$name))
        {
            $count++;
        }
           
    } // foreach loop

    echo json_encode(array('count' => $count));
    die();
}


/*********** READ ALL FILE FROM DIRECTORY*********/
function find_all_files($dir) 
{ 
    $files = array();
    foreach (glob($dir) as $file) {
        $files[] = $file;
    }
    return $files;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>File upload management | <?php echo $lang['SITE_NAME']; ?></title>

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
                        <h1 class="page-header">File upload management</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <form action="fileupload.php" method="POST" role="form" class="well" 
                enctype="multipart/form-data">
                    <div class="form-group">
                        <label>เลือกไฟล์ที่ต้องการ:</label>
                        <input type="file" name="files[]" id="files" class="form-control" multiple>
                    </div>  
                    <div class="form-group">
                        <input type="submit" name="submit" value="UPLOAD" class="btn btn-primary">
                    </div>

                    <div class="status"></div>

                </form>

                <!--Progress bar-->
                <div class="progress">
                    <div class="bar"></div >
                    <div class="percent">0%</div >
                </div>
        
        <table class="table table-bordered">
            <thead>
                <tr class="bg-primary">
                    <th>ID</th>
                    <th>File name</th>
                    <th>File type</th>
                    <th>File size</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $a=1;
                $allfile = find_all_files('uploads/*.*');
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                foreach ($allfile as $fw) {
                ?>

                <tr>
                    <td><?=$a;?></td>
                    <td><?=basename($fw);?></td>
                    <td><?=finfo_file($finfo,$fw);?></td>
                    <td><?=filesize($fw);?></td>
                    <td><a href="<?=$fw;?>" class="btn btn-success">Download</a></td>
                </tr>

            <?php
                 $a++;
            }
            ?>

            </tbody>
        </table>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


    </div>
    <!-- /#wrapper -->

   <?php include("include/page_script.php"); ?>
   <script src="js/jquery.form.js"></script>
   <script src="js/custom.js"></script>

</body>

</html>
