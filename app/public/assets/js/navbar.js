function renderUser(){
    $("#buttons").append(`
    <div class="btn-group dropstart">
    <a class="btn btn-success mr-5 dropdown-toggle" style="margin-right: 15px;" data-bs-toggle="dropdown" aria-expanded="false">
        Profilim
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/main/user/userprofile.php">Profilim</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><button class="dropdown-item" onclick="return logoutUser()">Çıkış Yap</button></li>
    </ul>
    </div>
    `)
}

function logoutUser(e){
    localStorage.removeItem("user-token");
    window.location.reload();
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