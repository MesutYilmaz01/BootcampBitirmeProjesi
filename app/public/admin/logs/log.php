<?php

use Project\Services\CategoriesService as CategoriesService;
use Project\Helper\Authorization;
use Project\Helper\Logging;

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
$logs = Logging::getLogs();
if(empty($logs[1])){
    $data = null;
    $keys = null;
}
else
{
    $keys = array_keys($logs[1]);
    $data = $logs[1][$keys[0]];
    if (isset($_POST["get"]))
    {
        $data = $logs[1][$keys[$_POST["log"]]];
    }
}

if ($pageNumber > ceil(count($data) / 20) + 1 || $pageNumber < 1)
{
    header('Location: /admin/logs/log');
    die();
}
$limit = 20;
$pageStarts = ($pageNumber*$limit) - $limit;
$data = array_reverse($data);
$finalData = array_slice($data,$pageStarts,20);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Loglar</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Loglar</h1>

                                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">Loglar</h6>
                        </div>
                        <form action="/admin/logs/log" method="POST">
                            <div class="card-body">
                                <div class="form-group d-flex justify-content-center">
                                    <div class="col-4 offset-1 mb-3 mb-sm-0">    
                                        <select class="form-control" name="log">
                                            <?
                                                $counter = 0;
                                                foreach ($keys as $key)
                                                {
                                                    if (isset($_POST["log"]))
                                                    {
                                                        $selected = $_POST["log"] == $counter ? 'selected' : '';
                                                        echo '<option '.$selected.' value='.$counter.'>'.$key.'</option>';
                                                        $counter++;
                                                    }
                                                    else
                                                    {
                                                        echo '<option value='.$counter.'>'.$key.'</option>';
                                                        $counter++;
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                <div class="col-3">
                                        <button type="submit" class="btn btn-success" name="get">Getir</button>
                                </div>
                            </div>
                        </form>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>İşlem Yapan</th>
                                            <th>Yetki</th>
                                            <th>Tarih</th>
                                            <th>Çeşit</th>
                                            <th>Log</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>İşlem Yapan</th>
                                            <th>Yetki</th>
                                            <th>Tarih</th>
                                            <th>Çeşit</th>
                                            <th>Log</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            foreach($finalData as $item)
                                            {
                                                $role = "";
                                                if ($item[2] == 1)
                                                {
                                                    $role = "Admin";
                                                }
                                                if ($item[2] == 2)
                                                {
                                                    $role = "Moderatör";
                                                }
                                                if ($item[2] == 3)
                                                {
                                                    $role = "Editör";
                                                }
                                                if ($item[2] == 4)
                                                {
                                                    $role = "Kullanıcı";
                                                }
                                                echo '<tr>
                                                        <td>
                                                        '.$item[1].'
                                                        </td>
                                                        <td>'.$role.'</td>
                                                        <td>'.$item[0].'</td>
                                                        <td>'.$item[3].'</td>
                                                        <td>'.$item[4].'</td>';
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
                                        else if ($pageNumber > 1 && $pageNumber <= ceil(count($data) / 20))
                                        {
                                            $page = $pageNumber - 1;
                                            echo '
                                                <li class="pagination_button page-item previous">
                                                    <a href="/admin/logs/log?page='.$page.'" class="page-link">Önceki</a>
                                                </li>
                                            ';
                                        }
                                        if ($pageNumber > 1 && $pageNumber >= ceil(count($data) / 20))
                                        {
                                            echo '
                                                <li class="pagination_button page-item next disabled">
                                                    <a href="#" class="page-link">Sonraki</a>
                                                </li>
                                            ';
                                        }
                                        else if ($pageNumber < ceil(count($data) / 20))
                                        {
                                            $page = $pageNumber + 1;
                                            echo '
                                                <li class="pagination_button page-item next">
                                                    <a href="/admin/logs/log?page='.$page.'" class="page-link">Sonraki</a>
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