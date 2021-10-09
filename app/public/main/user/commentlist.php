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
    <? include $dir.'/../shared/navbar.php' ?>
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
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td><a href="#">Otto lorem ipsum semi duraq sdar cisotne kafre</a></td>
                    <td>11.08.2021</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td><a href="#">Otto lorem ipsum semi duraq sdar cisotne kafre</a></td>
                    <td>11.08.2021</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td><a href="#">Otto lorem ipsum semi duraq sdar cisotne kafre</a></td>
                    <td>11.08.2021</td>
                    </tr>
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

</body>
</html>