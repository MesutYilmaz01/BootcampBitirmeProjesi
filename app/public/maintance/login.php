<?php

use Project\Helper\Authentication;
use Project\Helper\Authorization;
use Project\Services\LoginService;
use Project\Helper\Maintenance;

$login = new LoginService();
$message = '';
if(isset($_POST["login"])){
    $result = $login->login();
    if($result[0] == 0)
    {
        $message =  '<div class="alert alert-danger" role="alert">'.$result[1].'</div>';
    }
    else
    {        
        if(Authorization::isAdmin())
        {
            Maintenance::endMaintenance();
            Authentication::logOut();
            $message =  '<div class="alert alert-success" role="alert">Bakım modundan çıkıldı. Login sayfasına yönlendiriliyorsunuz</div>';
            header('refresh:5;url=/login/login');
        }
        else
        {
            Authentication::logOut();
            $message =  '<div class="alert alert-danger" role="alert">Sadece adminler bu sayfaya giriş yapabilir</div>';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bakım Bitirme Login</title>

    <!-- Custom fonts for this template-->
    <link href="/../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bakım Modunu Bitirmek İçin Bu Sayfadan Giriş Yapmanız Gerekmektedir</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <? 
                                                if($message != '')
                                                {
                                                    echo $message;
                                                }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                name="email" placeholder="E-mail Adresiniz...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" id="exampleInputPassword" placeholder="Şifre">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="login">
                                            Giriş Yap
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/../assets/vendor/jquery/jquery.min.js"></script>
    <script src="/../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/../assets/js/sb-admin-2.min.js"></script>

</body>

</html>