function deleteaccount() {
    const token = localStorage.getItem("user-token")
    $.ajax({
        type: "GET",
        url: "http://localhost/api/user/deleteaccount?token="+token,
        dataType:"json",
        // data: data,
        success: function (response) {
            if(response.result === true) 
            {
                logoutUser();
                if (document.getElementById("alert") != null)
                {
                    document.getElementById("alert").remove();
                }
                message =  `<div class="alert alert-success" role="alert" id="alert">Hesabınızı silme işlemi onay sürecine girmiştir..</div>`;
                $("#error").append(message);
            } 
            else if(response.result === false) { 
                if (document.getElementById("alert") != null)
                {
                    document.getElementById("alert").remove();
                }
                message =  `<div class="alert alert-danger" role="alert" id="alert">Hesap silme isteği başarısız. <br/> Daha önce onay için göndermiş olabilirsiniz..</div>`;
                $("#error").append(message);
            }
        }
    })
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