<?php

use Project\Services\NewsService as NewsService;
use Project\Helper\Authorization;

if (Authorization::isUser() || Authorization::isEditor())
{
    header('Location: /404/404');
    die();
}

$pageNumber = "";
$isExist = isset($_GET["page"]);
if ($isExist == true) 
{
    $pageNumber = $_GET["page"];
}
else
{
    $pageNumber = 1;
}
$service = new NewsService();
$data = $service->getAllFromDatabase();
if ($pageNumber > ceil(count($data) / 5) + 1 || $pageNumber < 1)
{
    header('Location: /admin/news/news');
    die();
}
$paginated = $service->getByLimit($pageNumber);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Haber Listesi</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                    <h1 class="h3 mb-4 text-gray-800">Haberler</h1>

                                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">Haber Listesi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Haber Başlığı</th>
                                            <th>Onaylayan</th>
                                            <th>Tarih</th>
                                            <th>Yorumlar</th>
                                            <th>Sil</th>
                                            <th>Güncelle</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Haber Başlığı</th>
                                            <th>Onaylayan</th>
                                            <th>Tarih</th>
                                            <th>Yorumlar</th>
                                            <th>Sil</th>
                                            <th>Güncelle</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            foreach($paginated as $item)
                                            {
                                                echo '<tr>
                                                        <td>
                                                        <a href="newdetail?id='.$item->getId().'">
                                                        '.substr($item->getTitle(),0,45).'...
                                                        </a>
                                                        </td>
                                                        <td>Düzenleyen</td>
                                                        <td>'.$item->getUpdatedAt().'</td>
                                                        <td><a href="#" class="btn btn-success btn-block">Yorumlar</a></td>
                                                        <td><a href="deletenew?id='.$item->getId().'" class="btn btn-danger btn-block">Sil</a></td>
                                                        <td><a href="updatenew?id='.$item->getId().'" class="btn btn-warning btn-block">Güncelle</a></td>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end">
                                <ul class="pagination">
                                    <?
                                        if ($pageNumber == 1)
                                        {
                                            echo '
                                                <li class="pagination_button page-item previous disabled">
                                                    <a href="#" class="page-link">Önceki</a>
                                                </li>
                                            ';
                                        }
                                        else if ($pageNumber > 1 && $pageNumber <= ceil(count($data) / 5))
                                        {
                                            $page = $pageNumber - 1;
                                            echo '
                                                <li class="pagination_button page-item previous">
                                                    <a href="/admin/news/news?page='.$page.'" class="page-link">Önceki</a>
                                                </li>
                                            ';
                                        }
                                        if ($pageNumber > 1 && $pageNumber >= ceil(count($data) / 5))
                                        {
                                            echo '
                                                <li class="pagination_button page-item next disabled">
                                                    <a href="#" class="page-link">Sonraki</a>
                                                </li>
                                            ';
                                        }
                                        else if ($pageNumber < ceil(count($data) / 5))
                                        {
                                            $page = $pageNumber + 1;
                                            echo '
                                                <li class="pagination_button page-item next">
                                                    <a href="/admin/news/news?page='.$page.'" class="page-link">Sonraki</a>
                                                </li>
                                            ';
                                        }
                                    ?>
                                </ul>
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

    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
</body>

</html>