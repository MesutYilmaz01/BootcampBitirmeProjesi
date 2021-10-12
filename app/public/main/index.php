<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Haber Sitesi</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">

</head>

<? $dir = __DIR__;?>

<!-- Navbar Begin  -->
<nav class="navbar navbar-expand-lg sticky-top navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="/main/index">Haber Sitesi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 170px;" id="categories">
      <!-- Kategoriler -->
      </ul>
      <form class="d-flex" id="buttons">
      <!-- Buttonlar -->
    </div>
  </div>
</nav>




<!-- Navbar End  -->

<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-8">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" id="inner">
            <!-- Slider -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Önceki</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sonraki</span>
        </button>
        </div>
        </div>
    </div>
    <div class="row mt-2 mb-5" id="news">
    <!-- Haberler çekiliyor -->
    </div>
</div>

<div class="fixed-bottom w-100 text-center p-2" style="background-color: #e3f2fd; height:40px;">
Copyright © Your Website 2020
</div>
<script src="/../assets/bootstrap/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="/../assets/js/navbar.js"></script>
<script type="text/javascript" src="/../assets/js/categories.js"></script>
<script type="text/javascript" src="/../assets/js/main.js"></script>

<script type="text/javascript" >newsFetchForMain()</script>

</body>
</html>