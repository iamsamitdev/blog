<!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">

        <div class="container-fluid">
                    <div class="text-right swlang">
                        <a href="index.php?lang=en">EN</a> | <a href="index.php?lang=th">TH</a>
                    </div>
        </div>

        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php echo SYSTEM_NAME;?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php"><?php echo $menu['home'];?></a>
                    </li>
                    <li>
                        <a href="about.php"><?php echo $menu['about'];?></a>
                    </li>
                    <!-- <li>
                        <a href="blog_detail.php"><?php echo $menu['sample_post'];?></a>
                    </li> -->
                    <li>
                        <a href="contact.php"><?php echo $menu['contact'];?></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>