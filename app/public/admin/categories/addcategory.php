<?php

use Project\Helper\Authentication;
use Project\Services\CategoriesService as CategoriesService;
use Project\Helper\Authorization;

if (Authentication::check() == false || Authorization::isUser() || Authorization::isEditor())
{
    header('Location: /404/404');
    die();
}

$message = '';
if (isset($_POST["save"]))
{
    $service = new CategoriesService();
    $result = $service->addToDatabase();
    if ($result[0] == 1)
    {
        $message =  '<div class="alert alert-success" role="alert">'.$result[1].'</div>';
    }
    else
    {
        $message =  '<div class="alert alert-danger" role="alert">'.$result[1].'</div>';
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

    <title>Kategori Ekle</title>

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
        <? include $dir.'/../shared/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <? include $dir.'/../shared/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="text-center">
                        <h1 class="h3 mb-4 text-gray-800">Kategori Ekle</h1>
                        <? if($message != '') echo $message;?>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col-10">
                                <!-- Last News Card -->
                                <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">Kategori Ekleme Formu</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="col-10 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control" name="category"
                                                            placeholder="Kategori Adı">
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="col-3 mb-3 mb-sm-0">
                                                        <button type="submit" class="btn btn-block btn-primary"  name="save">
                                                            Kaydet
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <? include $dir.'/../shared/footer.php' ?>
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
    <? include $dir.'/../shared/logoutmodel.php' ?>
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