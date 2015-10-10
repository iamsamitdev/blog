<?php 
    include('config/config.php');
    include('config/connect_mysql.php');

    // คำสั่ง sql ดึงรายชื่อบทความจากตาราง blog_content
    $sql = "SELECT * FROM blog_content ORDER BY id desc";
    $result = $connect->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $menu['home']." | ".SYSTEM_NAME?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php
        include("header.php");
    ?>

    <!-- Page Header -->
    <!-- Slide. -->
 
    <div class="flexslider">
      <ul class="slides">
        <li>
          <img src="img/slide1.jpg" />
        </li>
        <li>
          <img src="img/slide2.jpg" />
        </li>
        <li>
          <img src="img/slide3.jpg" />
        </li>   
      </ul>
    </div>

   

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                
                <?php
                    while ($data = $result->fetch(PDO::FETCH_ASSOC))
                    {
                ?>
                <div class="post-preview">
                     <a href="<?=$data['url'];?>">
                        <h2 class="post-title">
                            <?=$data['title'];?>
                        </h2>
                      </a>  
                        
                     <h3 class="post-subtitle">
                            <?=mb_substr($data['content'],0,250,"UTF8");?>...
                     </h3>

                    <p class="post-meta">Posted by <a href="#"><?=$data['author'];?></a> on <?=$data['datetimepost'];?></p>

                    <a href="<?=$data['url'];?>" class="btn btn-xs btn-default">อ่านต่อ</a>
                </div>
                <hr>
                <?php
                    }
                ?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr>

    <?php
        include("footer.php");
    ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

    <script src="js/jquery.flexslider.js"></script>

    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
          $('.flexslider').flexslider({
            animation: "slide",
            slideshowSpeed:3000,
            direction:"horizontal"
          });
        });
    </script>

</body>

</html>
