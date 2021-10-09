function updateUser(user) {
    $.ajax({
        type: "POST",
        url: "http://localhost/api/user/updateuser?token="+token,
        dataType:"json",
        data: user,
        success: function (response) {
            if(response.result === true) 
            {
                if (document.getElementById("alert") != null)
                {
                    document.getElementById("alert").remove();
                }
                message =  `<div class="alert alert-success" role="alert" id="alert">${response.message}</div>`;
                $("#errMessage").append(message);
            } 
            else if(response.result === false) { 
                if (document.getElementById("alert") != null)
                {
                    document.getElementById("alert").remove();
                }
                message =  `<div class="alert alert-danger" role="alert" id="alert">${response.message}</div>`;
                $("#errMessage").append(message);
            }
        },
        error: function (httpObj, statu){
            if (httpObj.status == 401)
            {
                window.location.href = "/main/index"
            }
        }
        })
}
function getUser() {
    token = localStorage.getItem("user-token");
    $.ajax({
        type: "GET",
        url: "http://localhost/api/user/getuserinfo?token="+token,
        dataType:"json",
        //data: dataString,
        success: function (response) {
            if(response.result === true) 
            {  
                $("#ad").val(response.name);
                $("#soyad").val(response.surname);
                $("#email").val(response.email);
            } 
            else if(response.result === false) { 
            }
        },
        error: function (httpObj, statu){
            if (httpObj.status == 401)
            {
                window.location.href = "/main/index"
            }
        }
        })
    }

    function validation(){
        let errMessage = "";
        let ad          = $("#ad").val();
        let soyad       = $("#soyad").val();
        let email       = $("#email").val();
        let password    = $("#password").val();
        let password2   = $("#password2").val();

        checkedValue = document.querySelector("#deleteUser:checked") == null ? false : true

        if (checkedValue)
        {
            console.log("silinme olayı")
        }
        else
        {
            if (ad.length > 0)
        {
            if (soyad.length > 0)
            {
                if (validateEmail(email))
                {
                    if ((password.length > 7 && password2.length > 7 ||(password.length == 0 && password2.length == 0)))
                    {
                        if (password == password2)
                        {
                            const user = 
                                {
                                    "name"      :   ad,
                                    "surname"   :   soyad,
                                    "email"     :   email,
                                    "password"  :   password,
                                    "token"     :   localStorage.getItem("user-token") 
                                };
                            updateUser(user);
                        }
                        else
                        {
                            errMessage = "Şifreler örtüşmüyor"
                        }
                    }
                    else
                    {
                        errMessage = "Şifreniz en az 8 karakterli olmalıdır"
                    }
                }
                else
                {
                    errMessage = "Email alanını kontrol ediniz.";
                }
            }
            else
            {
                errMessage = "Soyad alanı zorunludur.";
            }
        }
        else
        {
            errMessage = "Ad alanı zorunludur.";
        }

        if (errMessage != "")
        {
            if (document.getElementById("alert") == null)
            {    
                message =  `<div class="alert alert-danger" role="alert" id="alert">${errMessage}</div>`;
                $("#errMessage").append(message);
            }
            else
            {
                document.getElementById("alert").remove();
                message =  `<div class="alert alert-danger" role="alert" id="alert">${errMessage}</div>`;
                $("#errMessage").append(message);
            }
            
        }
        }

        
    }

    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    $(document).ready(function(){
        getUser();
    })