<?php

use Project\Services\UserService as UserService;
use Project\Helper\Authorization;
use Project\Helper\Authentication;

if (Authentication::check() == false || Authorization::isUser() || Authorization::isEditor())
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
$service = new UserService();
$data = $service->getUsers();

if ($pageNumber > ceil(count($data) / 5) + 1 || $pageNumber < 1)
{
    header('Location: /admin/users/users');
    die();
}
$paginated = $service->getPaginatedUsers($pageNumber);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kullanıcı Listesi</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Kullanıcılar</h1>

                                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">Kullanıcı Listesi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Adı</th>
                                            <th>Email</th>
                                            <th>Yetki</th>
                                            <th>O. Tarih</th>
                                            <th>Sil</th>
                                            <th>Güncelle</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Adı</th>
                                            <th>Email</th>
                                            <th>Yetki</th>
                                            <th>O. Tarih</th>
                                            <th>Sil</th>
                                            <th>Güncelle</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            foreach($paginated as $item)
                                            {
                                                $type = "";
                                                if ($item->getType() == 1)
                                                {
                                                    $type = "Admin";
                                                }
                                                if ($item->getType() == 2)
                                                {
                                                    $type = "Moderatör";
                                                }
                                                if ($item->getType() == 3)
                                                {
                                                    $type = "Editör";
                                                }
                                                if ($item->getType() == 4)
                                                {
                                                    $type = "Kullanıcı";
                                                }
                                                echo '<tr>
                                                        <td>
                                                        <a href="userdetail?id='.$item->getId().'">
                                                        '.$item->getName().'  '.$item->getSurname().'
                                                        </a>
                                                        </td>
                                                        <td>'.$item->getEmail().'</td>
                                                        <td>'.$type.'</td>
                                                        <td>'.$item->getCreatedAt().'</td>
                                                        <td><a href="deleteuser?id='.$item->getId().'" class="btn btn-danger btn-block">Sil</a></td>
                                                        <td><a href="updateuser?id='.$item->getId().'" class="btn btn-warning btn-block">Güncelle</a></td>';
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
                                                    <a href="/admin/users/users?page='.$page.'" class="page-link">Önceki</a>
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
                                                    <a href="/admin/users/users?page='.$page.'" class="page-link">Sonraki</a>
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