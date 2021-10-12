<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Yorum Listem</title>

    <!-- Custom fonts for this template-->
    <link href="/../../assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">

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
    <div class="d-flex justify-content-center">
        <div class="mt-3">
            <h2>
                Yaptığım Yorumlar
            </h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-9 mt-5">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Yorum</th>
                    <th scope="col">Tarih</th>
                    </tr>
                </thead>
                <tbody id="comments">
                <!-- Yorumlar Burada -->
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="/../../assets/bootstrap/js/bootstrap.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="/../../assets/js/authentication.js"></script>
<script type="text/javascript" src="/../../assets/js/navbar.js"></script>
<script type="text/javascript" src="/../../assets/js/categories.js"></script>
<script type="text/javascript" src="/../../assets/js/commenthistory.js"></script>

</body>
</html>