function renderUser(){
    $("#buttons").append(`
    <div class="btn-group dropstart">
    <a class="btn btn-success mr-5 dropdown-toggle" style="margin-right: 15px;" data-bs-toggle="dropdown" aria-expanded="false">
        Profilim
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/main/user/userprofile">Profilim</a></li>
        <li><a class="dropdown-item" href="/main/user/categorychoice">Kategorilerim</a></li>
        <li><a class="dropdown-item" href="/main/user/commentlist">Yorumlarım</a></li>
        <li><a class="dropdown-item" href="/main/user/newslist">Okuduğum Haberler</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><span class="dropdown-item" onclick="return logoutUser()">Çıkış Yap</span></li>
    </ul>
    </div>
    `)
}

function logoutUser(){
    //logout
    $.ajax({
        type: "GET",
        url: "http://localhost/api/user/logout",
        dataType:"json",
        //data: dataString,
        success: function (response) {
            if(response.result === true) { 
                localStorage.removeItem("user-token");
                window.location.href = "/main/index" 
            } else if(response.result === false) {
                //Hata durumu
            }
        }
    })
}


function renderNonUser(){
    $("#buttons").append(`
    <a class="btn btn-success mr-5" style="margin-right: 15px;">
    Üye Ol
    </button>
    <a class="btn btn-success mr-5" href="/login/login" style="margin-right: 15px;">
    Giriş Yap
    </a>
    `)
}

function getNavbarButtons(){
    if (localStorage.getItem("user-token"))
    {
        renderUser();
    }
    else    
    {
        renderNonUser();
    }
}

getNavbarButtons();