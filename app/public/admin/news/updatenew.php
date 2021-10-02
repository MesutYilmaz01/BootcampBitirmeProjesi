<?php

require '../../../vendor/autoload.php';

use Project\Repositories\NewsRepository as NewsRepository;
use Project\Services\NewsService as NewsService;
$service = new NewsService();
use Project\Services\CategoriesService as CategoriesService;
$categoryService = new CategoriesService();
$categories = $categoryService->getCategories();
$data = $service->getNewsById();
if($data == false)
{
    header('Location: /public/404/404.php');
    die();
}
$message = '';
//after post
if (isset($_POST["update"]))
{
    $result = $service->updateNews($data);
    //Validationlar Henüz Yapılmadı !
    if ($result[0] == 1)
    {
         $message =  '<div class="alert alert-success" role="alert">
                      '.$result[1].'   
                     </div>';
    }
    else
    {
        $message =  '<div class="alert alert-danger" role="alert">
                     '.$result[1].'   
                     </div>';
    }
    $data = $service->getNewsById();
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

    <title>Haber Ekle</title>

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
                    <div class="text-center">
                        <h1 class="h3 mb-4 text-gray-800">Haber Güncelle</h1>
                        <? if($message != '') echo $message;?>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col-10">
                                <!-- Last News Card -->
                                <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">Haber Güncelleme Formu</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <form method="POST" action="updatenew.php?id=<?echo $data->getId()?>" enctype="multipart/form-data">
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="col-10 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control" name="title"
                                                            placeholder="Haber Başlığı" value="<?echo $data->getTitle()?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="col-10 mb-3 mb-sm-0">
                                                        <textarea class="form-control" name="content" placeholder="Haber İçeriği" rows="7"><?echo $data->getContent()?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="col-10 mb-3 mb-sm-0">
                                                        <label>Kategoriler</label>    
                                                        <select class="form-control" name="category">
                                                            <?
                                                                foreach ($categories as $category)
                                                                {   
                                                                    if ($category->getId() == $data->getCategory())
                                                                    {
                                                                        echo '<option value='.$category->getId().' selected>'.$category->getCategory().'</option>';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo '<option value='.$category->getId().'>'.$category->getCategory().'</option>';
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="col-10 mb-3 mb-sm-0">
                                                        <div class="mb-3">
                                                            <label class="form-label">Not : Resim güncellenmesini istemiyorsanız resim seçmeyiniz.</label></br>
                                                            <label for="formFile" class="form-label">Resim Seçiniz</label>
                                                            <input class="form-control" type="file" id="formFile" name="img">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="col-3 mb-3 mb-sm-0">
                                                        <button type="submit" name="update" class="btn btn-block btn-primary">
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