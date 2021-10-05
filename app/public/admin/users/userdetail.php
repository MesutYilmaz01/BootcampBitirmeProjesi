<?php

use Project\Services\UserService as UserService;
use Project\Services\EditorCategoryService;
use Project\Helper\Authorization;

if (Authorization::isUser() || Authorization::isEditor())
{
    header('Location: /404/404');
    die();
}

$service = new UserService();
$data = $service->getUserById();
$categoriesService = new EditorCategoryService();
$userDetail = $categoriesService->getCategoriesById($data);
if ($userDetail == false)
{
    header('Location: /404/404');
    die();
}
$type = "";
if ($userDetail->getType() == 1)
{
    $type = "Admin";
}
if ($userDetail->getType() == 2)
{
    $type = "Moderatör";
}
if ($userDetail->getType() == 3)
{
    $type = "Editör";
}
if ($userDetail->getType() == 4)
{
    $type = "Kullanıcı";
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

    <title>Kullanıcı Detay</title>

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
                    <h1 class="h3 mb-4 text-gray-800 text-center" >Kullanıcı Detay</h1>

                        <div class="d-flex justify-content-center text-center">
                            <div class="col-8 mt-3">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary text-center">Kullanıcı</h6>
                                    </div>
                                    <div class="card-body mb-2">
                                        <div>
                                            <div>Adı Soyadı : <? echo $userDetail->getName()." ".$userDetail->getSurname()?></div>
                                        </div>
                                        <div>
                                            <div>Email : <? echo $userDetail->getEmail()?></div>
                                        </div>
                                        <div>
                                            <div>Kullanıcı Türü : <? echo $type?></div>
                                        </div>
                                        <div>
                                            <div>Hesap Oluşturulma : <? echo $userDetail->getCreatedAt()?></div>
                                        </div>
                                        <div>
                                            <div>Hesap Güncellenme : <? echo $userDetail->getUpdatedAt()?></div>
                                        </div>
                                        <div>
                                            <?
                                            if ($userDetail->getType() == $userDetail::EDITOR_ROLE)
                                            {
                                                echo "<div class='mt-5'>
                                                    <h5>Yetkili Olduğu Kategoriler</h5>
                                                </div>
                                                <div>
                                                    <div class='row'>";
                                                                if ($userDetail->getCategories() == null)
                                                                {
                                                                    echo "<div class='col'>Henüz kategori atanmamış.</div>";
                                                                }
                                                                else{
                                                                    foreach ($userDetail->getCategories() as $category)
                                                                    {
                                                                        echo '
                                                                            <div class="col-md-6 mt-3">
                                                                                '.$category->getCategory().'
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <a href="/admin/users/deletecategory?id='.$userDetail->getId().'&category='.$category->getId().'"
                                                                                 class="btn btn-danger">Sil</a>
                                                                            </div>
                                                                        ';
                                                                    }
                                                                }
                                                            
                                                echo "        
                                                    </div>
                                                </div>
                                                <div class='mt-3'>
                                                    <a href='/admin/users/addcategory?id=";
                                                    echo $userDetail->getId(); 
                                                    echo "' class='btn btn-warning'>Kategori Ekle</a>
                                                </div>";
                                            }
                                            ?>
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