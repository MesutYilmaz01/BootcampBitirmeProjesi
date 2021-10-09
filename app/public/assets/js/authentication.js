function authUser(){
    if (!localStorage.getItem("user-token"))
    {
        window.location.href = "/main/index"
    }
    token = localStorage.getItem("user-token");
    $.ajax({
        type: "GET",
        url: "http://localhost/api/user/getuserinfo?token="+token,
        dataType:"json",
        success: (res) => {
            console.log("data",res)
        },
        error: function (httpObj, statu){
            localStorage.removeItem("user-token");
            window.location.href = "/main/index"
        }
    });
    
}
