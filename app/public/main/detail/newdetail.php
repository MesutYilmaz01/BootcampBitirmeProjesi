<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Haber Detayı</title>

    <!-- Custom fonts for this template-->
    <link href="/../../assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">

</head>

<? $dir = __DIR__;?>

<!-- Navbar Begin  -->
    <? include $dir.'/../shared/navbar.php' ?>
<!-- Navbar End  -->


<div class="container">
    <div class="row">
        <div class="col-6 offset-1">
            <div id="detail">
                <!-- New Detail -->
            </div>
            <div class="row mt-4">
                <h2>Yorumlar</h2>
                <div class="col mt-4">
                    <div class="card">
                        <div class="card-header">
                            Yorumunuzu aşşağıdaki alana bırakınız.
                        </div>
                        <div class="card-body">
                            <div id="error"><!-- Mesaj basılacak --></div>
                            <textarea class="form-control" placeholder="Yorumunuz" row=3 id="comment"></textarea>
                            <div class="form-check">
                                <input class="form-check-input mt-3" type="checkbox" value="" id="anonim">
                                <label class="form-check-label mt-2" for="anonim">
                                    Anonim Olarak Gönder
                                </label>
                                <span class="btn btn-primary mt-3" onclick=validateComment() style="float:right;">Gönder</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4" id="commentside">

            <!-- Yorumlar -->
                
            </div>
        </div>
        <div class="col-3 offset-1 mt-5" id="similar">
            <div>
                <h5>Benzer Haberler</h5>
            </div>
            <!-- Hberler -->
        </div>
    </div>
</div>


<!-- <div class="fixed-bottom w-100 text-center p-3" style="background-color: #e3f2fd; height:60px;">
Copyright © Your Website 2020
</div> -->
<script src="/../../assets/bootstrap/js/bootstrap.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="/../../assets/js/navbar.js"></script>
<script type="text/javascript" src="/../../assets/js/categories.js"></script>
<script type="text/javascript" src="/../../assets/js/newdetail.js"></script>
<script type="text/javascript" src="/../../assets/js/comment.js"></script>
<script type="text/javascript" src="/../../assets/js/getcomments.js"></script>



</body>
</html>