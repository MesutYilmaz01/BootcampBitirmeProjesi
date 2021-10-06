<?php

use \Project\Repositories\UserRepository as UserRepository;
use \Project\Database\Database as Database;
use Project\Helper\Authentication;
use \Project\Models\User as User;
use \Project\Services\NewsService;
use \Project\Services\CategoriesService;
use \Project\Services\UserService;
use \Project\Helper\Authorization;
use Project\Helper\Logging;

if (Authorization::isUser() ||Authorization::isEditor())
{
    header('Location: /404/404');
    die();
}

$newsService = new NewsService();
$categoriesService = new CategoriesService();
$usersService= new UserService();
$news = $newsService->getAllFromDatabase();
$categories = $categoriesService->getCategories();
$users = $usersService->getUsers();
$paginated = $newsService->getForAdminIndex(5);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Paneli - Anasayfa</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    <? $dir = __DIR__;?>
        <!-- Sidebar -->
        <? include $dir.'/shared/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <? include $dir.'/shared/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Anasayfa</h1>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <h1>Sistemde Kayıtlı Olan</h1>
                    </div>
                    <div class="row">
                        <!-- News Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1 text-center">
                                                Haber Sayısı</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?echo count($news)?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Users Card  -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-success text-uppercase mb-1 text-center">
                                                Kullanıcı Sayısı</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?echo count($users)?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Categories Card  -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-info text-uppercase mb-1 text-center">
                                                Kategori Sayısı
                                            </div>
                                                <div class="col-auto text-center">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-center"><?echo count($categories)?></div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comments Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1 text-center">
                                                Yorum Sayısı</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">180</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                                <!-- Last News Card -->
                                <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">En Son Eklenen Haberler</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <?
                                            foreach ($paginated as $data)
                                            {
                                                echo '
                                                    <li class="list-group-item"><a href="/admin/news/newdetail?id='.$data->getId().'">'.$data->getTitle().'</a></li>
                                                ';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <? include $dir.'/shared/footer.php' ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <? include $dir.'/shared/logoutmodel.php' ?>
    <!-- Logout Modal End -->

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>

</body>

</html>