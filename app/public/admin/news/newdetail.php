<?php
require '../../../vendor/autoload.php';

use Project\Repositories\NewsRepository as NewsRepository;
use Project\Services\NewsService as NewsService;
$service = new NewsService();
use Project\Services\CategoriesService as CategoriesService;
$categoryService = new CategoriesService();
$data = $service->getNewsById();
if($data == false)
{
    header('Location: /public/404/404.php');
    die();
}
$category = $categoryService->getCategoryById($data->getCategory());
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Haber Detay</title>

    <!-- Custom fonts for this template-->
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <? include '../shared/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <? include '../shared/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center" >Haber Detay</h1>

                        <div class="d-flex justify-content-center text-center">
                            <div class="col-8 mt-3">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary text-center">Haber</h6>
                                    </div>
                                    <div class="card-body mb-2">
                                        <div>
                                            <img src="<?echo $data->getImg()?>" width="650px"/>
                                        </div>
                                        <div class="mt-3 text-gray-900">
                                            <h4><? echo $data->getTitle() ?></h4>
                                            <div class="mt-3">
                                                <? echo $data->getContent()?>
                                            </div>
                                            <div class="mt-3">
                                                <h4 class="text-gray-900">Kategori</h4>
                                                <div class="text-lg text-gray-600">
                                                    <?
                                                        echo $category->getCategory();
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <a href="updatenew.php?id=<?echo $data->getId()?>" class="btn btn-success">Güncelle</a>
                                                <a href="deletenew.php?id=<?echo $data->getId()?>" class="btn btn-danger">Sil</a>
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
            <? include '../shared/footer.php' ?>
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
    <? include '../shared/logoutmodel.php' ?>
    <!-- Logout Modal End -->

    <!-- Bootstrap core JavaScript-->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/js/sb-admin-2.min.js"></script>

</body>

</html>