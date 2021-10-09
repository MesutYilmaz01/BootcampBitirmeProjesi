function updateUser() {
    const userData = {
        "name" : "Aykut",
        "surname" : "Yakan",
        "pass"  : "123123",
        "email" : "aykutyakan@gmail.com"
    };
    var token = localStorage.getItem("user-token");
    $.ajax({
        type: "POST",
        url: "http://localhost/api/user/updateuser?token="+token,
        dataType:"json",
        data: userData,
        //data: dataString,
        success: function (response) {
            if(response.result === true) 
            {  
                $("#ad").val(response.name);
                $("#soyad").val(response.surname);
                $("#email_sign").val(response.email);
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
                $("#email_sign").val(response.email);
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
    $(document).ready(function(){
        authUser();
        getUser();
        updateUser();
    })