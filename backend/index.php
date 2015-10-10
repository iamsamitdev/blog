<?php
include("config/common.php");
include("../config/connect_mysql.php");

// ------------------------------------------- Login ผ่านระบบ -----------------------------------
// ตรวจสอบการ submit form
if($_POST['submit'])
{
    // รับค่าจากฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบว่าป้อนค่าในฟอร์มครบหรือไม่
    if(!empty($username) and !empty($password))
    {
        // ชุดคำสั่ง sql เพื่อทำการ query ดูข้อมูล user
        $sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
        $result = $connect->query($sql);

            // กำหนดเงื่นไขเมื่อ login ผ่าน
            if($result->rowCount())
            {
                    // สร้าง ตัวแปรแบบ session ไว้เช็คสถานะการ loged in
                    $_SESSION['login_session'] = $username;
                    // ส่งไปหน้า dashboard.php
                    header("location:dashboard.php"); // redirect with php
            }else{
                    $errmsg = "<div class='alert alert-danger text-center'>ข้อมูลเข้าระบบไม่ถูกต้อง !!!</div>";
            }

    }else{
        $errmsg = "<div class='alert alert-danger text-center'>ป้อนข้อมูลให้ครบก่อน</div>";
    }
}

// ----------------------------- Login ผ่าน Facebook -----------------------------

require_once( 'Facebook/FacebookSession.php' );
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php' );
require_once( 'Facebook/FacebookRequestException.php' );
require_once( 'Facebook/FacebookAuthorizationException.php' );
require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/GraphUser.php' );
require_once( 'Facebook/GraphSessionInfo.php' );

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;

$id = '157721960944322'; // App ID
$secret = '12646bdaeec9a5537a57ed41b15adf3c'; // Secret ID

FacebookSession::setDefaultApplication($id, $secret);
// Redirect when login success
$helper = new FacebookRedirectLoginHelper('http://localhost/blog/backend/index.php');

try {
    $session = $helper->getSessionFromRedirect();    
} catch( FacebookRequestException $ex ) {
    // When Facebook returns an error
} catch( Exception $ex ) {
    // When validation fails or other local issues
}

if(isset($_SESSION['token'])){
    $session = new FacebookSession($_SESSION['token']);
    try{
        $session->Validate($id, $secret);
    }catch(FacebookAuthorizationException $e){
        $session = '';
    }
}


if(isset($session)){

    $_SESSION['token'] = $session->getToken();
    $request = new FacebookRequest($session, 'GET', '/me');
    $response = $request->execute();
   
    $graphObject = $response->getGraphObject();

    $fbid = $graphObject->getProperty('id');                        // To Get Facebook ID
    $fbfullname = $graphObject->getProperty('name');     // To Get Facebook full name

    $_SESSION['FBID'] = $fbid;
    $_SESSION['FULLNAME'] = $fbfullname;

    // echo "<pre>";
    // print_r($graphObject);
    // echo "</pre>";

    // Redirect to dashboard
    header("location:dashboard.php");
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

    <title><?php echo $lang['PAGE_LOGIN_TITLE']; ?> | <?php echo $lang['SITE_NAME']; ?></title>

    <?php include("include/page_style.php"); ?>

</head>

<body>

    <div class="container-fluid swlang">
            <ul class="chlang">
                <li><a href="?lang=en">EN</a></li>
                <li><a href="?lang=th">TH</a></li>
                <li><a href="?lang=jp">JP</a></li>
                <li><a href="?lang=ch">CH</a></li>
                <li><a href="?lang=de">DE</a></li>
            </ul>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $lang['PAGE_LOGIN_TITLE']; ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $errmsg;?>
                        <form role="form" action="index.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me"><?php echo $lang['PAGE_LOGIN_REMEMBER']; ?>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" value="<?php echo $lang['PAGE_LOGIN_TITLE']; ?>" class="btn btn-block btn-success">
                            </fieldset>
                        </form>

                        
                                <hr>
                          
                                <div class="rows text-center">OR</div><p>&nbsp;</p>
                                <div class="rows">
                                <div class="col-md-6 btn-offet">
                                    <a href="<?=$helper->getLoginUrl();?>" class="btn btn-block btn-primary btn-facebook">
                                    <i class="fa fa-facebook fa-fw"></i>
                                    Facebook Login</a>
                                </div>
                                <div class="col-md-6 btn-offet">
                                    <a href="#" class="btn btn-block btn-primary btn-google">
                                    <i class="fa fa-google-plus fa-fw"></i>
                                    Google Login</a>
                                </div>
                                </div>
                           
                       

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("include/page_script.php"); ?>

</body>

</html>
